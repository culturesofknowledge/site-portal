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
