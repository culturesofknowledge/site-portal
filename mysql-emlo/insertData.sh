#!/usr/bin/env bash
zcat omeka.2017-05-24_12-00.baxter.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD omeka
zcat omeka.2017-05-24_12-00.sw.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD omeka
zcat omeka.2017-05-24_12-00.wemlo.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD omeka

zcat wordpress.2017-05-24_12-00.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD wordpress


