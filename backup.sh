#!/bin/bash

cd /data/emlo-portal-compose

# First include the backup script
backup_helper=backup-script/backup-helper.sh
if [ ! -f ${backup_helper} ]; then
    echo "The backup-helper.sh file is required. Not found at ${backup_helper}. clone from https://bitbucket.org/akademy/backup-script"
        exit 1
fi
. ${backup_helper}

DEST=/data/backups

# Get a list of databases. | Remove warnings | Remove carriage returns.
DATABASES=`docker exec emloportalcompose_mysql_1 sh -c 'exec mysql -uroot -p$MYSQL_ROOT_PASSWORD -e"show databases;" -Bs 2>&1'|grep -v "Warning"|tr -d '\r'`


for DATABASE in $DATABASES; do

        if [ "$DATABASE" != "information_schema" ] && [ "$DATABASE" != "mysql" ]; then
                echo "Database " $DATABASE " saving to: " $DEST/$DATABASE".gz"

                docker exec emloportalcompose_mysql_1 sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" '$DATABASE | gzip --best > $DEST/$DATABASE.gz
                sleep 5

                backup_rotate_store $DEST $DATABASE.gz
        fi

done
