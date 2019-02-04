# OMEKA

This container uses the official PHP with Apache docker build.

It has the 2.6.1 version of Omeka. If you'd like to use your own Omeka build just inherit this container and delete the folder and replace it. Alternatively, use a volume to overwrite the folder.

You'll also need a mysql server. Pass these environment variables when running the Omeka docker, or they'll default too:
- ENV OMEKA_DB_HOST mysql
- ENV OMEKA_DB_PORT 3306
- ENV OMEKA_DB_USER omeka
- ENV OMEKA_DB_PASSWORD omeka
- ENV OMEKA_DB_NAME omeka
- ENV OMEKA_DB_PREFIX omeka_

 
e.g. Use the Omeka build inside
    
    docker run --name my-omeka --link mysql:mysql -e "OMEKA_DB_PASSWORD=mysouperparsleyword" bdlss/omeka

or Use your own Omeka files

    docker run --name my-omeka --link mysql:mysql -e "OMEKA_DB_PASSWORD=mysouperparsleyword" -v /my-omkea-files:/var/www/html/ bdlss/omeka

You should at least store the Omeka "files" directory in a volume so anything your users add persists beyond the life of the container.

## debugging
To turn on debugging in Omeka, inside the container do this:
    
     echo SetEnv APPLICATION_ENV development >> .htaccess
     
