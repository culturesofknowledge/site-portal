#!/usr/bin/env bash
zcat omeka.baxter.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD omeka
zcat omeka.sw.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD omeka
zcat omeka.wemlo.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD omeka

zcat wordpress.sql.dump.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD wordpress


