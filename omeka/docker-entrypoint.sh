#!/bin/sh
# Create the stuff omeka needs
# ============================

# Take the environment variables and produce a db.ini
envsubst < /omeka/db-template.ini > /var/www/html/${OMEKA_WEB_ROOT}/db.ini

find /var/www/html/${OMEKA_WEB_ROOT}/ -mindepth 1 -type d -print0 | xargs --null chmod 775
find /var/www/html/${OMEKA_WEB_ROOT}/ -type f -print0 | xargs --null chmod 664
find /var/www/html/${OMEKA_WEB_ROOT}/files -type d -print0 | xargs --null chmod 777
find /var/www/html/${OMEKA_WEB_ROOT}/files -type f -print0 | xargs --null chmod 666

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