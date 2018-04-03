#!/bin/bash

cd /data/emlo-portal-compose
. backup-helper.sh

DEST=/data/backups


# Get a list of databases. | Remove warnings | Remove carriage returns.
DATABASES=`docker-compose exec mysql sh -c 'exec mysql -uroot -p$MYSQL_ROOT_PASSWORD -e"show databases;" -Bs 2>&1'|grep -v "Warning"|tr -d '\r'`


for DATABASE in $DATABASES; do

        if [ "$DATABASE" != "information_schema" ] && [ "$DATABASE" != "mysql" ]; then
                #echo "Database found: " $DATABASE
                #echo "Saving to: " $DEST/$DATABASE".gz"

                docker-compose exec mysql sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" '$DATABASE | gzip --best > $DEST/$DATABASE.gz
                sleep 5

                backup_rotate_store $DEST $DATABASE.gz
        fi

done
