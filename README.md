# omeka-exhibit
Omeka based virtual exhibitions for EMLO


## Instructions
Choose "docker-compose.yaml" or "docker-compose-dev.yaml"

- export won't work with sudo, so if you need to use sudo with docker change into root first, then:
export MYSQL_ROOT_PASSWORD="PASSWORD-HERE"
- docker-compose build 
- docker-compose up
- Load the database if you have old data
- Copy any added files to omkea/files and wordpress/wp-content/uploads

## Database load
If the database is completely empty you might want to add some data in. Get on the container, and import it (this assumes the data is already on the container in sql.gz type):
    zcat /path/to/file.sql.gz | mysql --user='root' --password=$MYSQL_ROOT_PASSWORD your_database
    
 