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
php -f /omeka/createDatabase.php

# Start using the Docker CMD setting
exec "$@"