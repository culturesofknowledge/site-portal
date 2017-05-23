# omeka-exhibit
Omeka based virtual exhibitions for EMLO

## Database load
If the database is completely empty you might want to add some data in. Get on the container, and import it (this assumes the data is already on the container in sql.gz type):
    zcat /path/to/file.sql.gz | mysql -u 'root' -p your_database
    
 