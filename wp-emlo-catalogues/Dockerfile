# https://hub.docker.com/_/wordpress/
#
# Edit the wordpress site settings by editing the database or updating a file:
# echo "<?php update_option('siteurl','http://localhost');update_option('home','http://localhost');?>" > functions.php.edit
# cat functions.php >> functions.php.edit
# mv functions.php functions.php.bak
# mv functions.php.edit functions.php
# Once you've gone to the website, remove these values.

# FROM php:7.1.4-fpm
FROM wordpress:4.7.4-apache

ADD /wp-catalogues/ /var/www/html/

