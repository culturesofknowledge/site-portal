#!/bin/sh
# Create the stuff omeka needs
# ============================

# Take the environment variables and produce a db.ini
envsubst < /var/www/html/db-template.ini > /var/www/html/db.ini

# Attempt to create the database OMEKA will use, borrowed from: https://github.com/docker-library/wordpress/blob/716fe2fabb0be1bcd46626fad83d8c345946d343/php5.6/apache/docker-entrypoint.sh
php -- <<'EOPHP'
<?php
$stderr = fopen('php://stderr', 'w');

$host   = getenv('OMEKA_DB_HOST');
$port   = getenv('OMEKA_DB_PORT');
$user   = getenv('OMEKA_DB_USER');
$pass   = getenv('OMEKA_DB_PASSWORD');
$dbName = getenv('OMEKA_DB_NAME');

if (is_numeric($port)) {
	$port = (int) $port;
} else {
    $port = 0;
}

$maxTries = 10;
do {
	$mysql = new mysqli($host, $user, $pass, '', $port);
	if ($mysql->connect_error) {
		fwrite($stderr, "\n" . 'MySQL Connection Error: (' . $mysql->connect_errno . ') ' . $mysql->connect_error . "\n");
		--$maxTries;
		if ($maxTries <= 0) {
			exit(1);
		}
		sleep(3);
	}
} while ($mysql->connect_error);
if (!$mysql->query('CREATE DATABASE IF NOT EXISTS `' . $mysql->real_escape_string($dbName) . '`')) {
	fwrite($stderr, "\n" . 'MySQL "CREATE DATABASE" Error: ' . $mysql->error . "\n");
	$mysql->close();
	exit(1);
}
$mysql->close();
EOPHP

# Start using the Docker CMD setting
exec "$@"