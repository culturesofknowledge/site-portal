#!/bin/bash

# Backup Omeka DB hourly to ensure that USPG Omeka exhibit is protected
# while being edited as omeka doesn't keep undo info
#
# Run from crontab:
# 10 * * * * /data/emlo-portal-compose/backup-omeka.sh > /data/emlo-portal-compose/logs/backup-omeka.log

cd /data/emlo-portal-compose

# First include the backup script
backup_helper=backup-script/backup-helper.sh
if [ ! -f ${backup_helper} ]; then
    echo "The backup-helper.sh file is required. Not found at ${backup_helper}. clone from https://bitbucket.org/akademy/backup-script"
        exit 1
fi
. ${backup_helper}

DEST=/data/backups/omeka

DATABASE="omeka"

echo "Database " $DATABASE " saving to: " $DEST/$DATABASE".gz"

docker exec emloportalcompose_mysql_1 sh -c 'exec mysqldump -uroot -p"$MYSQL_ROOT_PASSWORD" '$DATABASE | gzip --best > $DEST/$DATABASE.gz
sleep 5

backup_rotate_hourly $DEST $DATABASE.gz
