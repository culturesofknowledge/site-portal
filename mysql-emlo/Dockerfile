# https://hub.docker.com/_/mysql/
#
# Copy data with commands on machine:
# mysql -u 'root' -p -e 'create database wordpress'
# zcat /path/to/file.sql.gz | mysql -u 'root' -p your_database
# zcat /path/to/file.sql.gz | mysql -u 'root' -p $MYSQL_ROOT_PASSWORD your_database

FROM mysql:5.7.18

ADD /data /data
ADD insertData.sh /data/

RUN chmod +x /data/insertData.sh