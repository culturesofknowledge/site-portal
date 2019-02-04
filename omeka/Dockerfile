FROM php:7.3-apache
MAINTAINER matthew

# Following the instructions at
# https://omeka.org/codex/Install_on_Ubuntu_using_Terminal

# Install imagemagick and mysqli
RUN DEBIAN_FRONTEND=noninteractive apt-get update \
     && apt-get -y --force-yes install imagemagick gettext-base
RUN docker-php-ext-install mysqli exif

# Copy over the omeka files (from : http://omeka.org/files/omeka-2.6.1.zip )
# You'll want to edit the db.ini with your own settings
ADD /omeka-2.6.1/ /var/www/html/

# Set up file and directory permissions
RUN chown -R www-data:www-data /var/www/html

# Add config files
ADD /configs/ /omeka/

RUN ln -s /omeka/docker-entrypoint.sh /usr/local/bin/
RUN chmod u+x /usr/local/bin/docker-entrypoint.sh

# Set some defaults (change them at run time if you like)
ENV OMEKA_WEB_ROOT ""
ENV OMEKA_DB_HOST mysql
ENV OMEKA_DB_PORT 3306
ENV OMEKA_DB_USER omeka
ENV OMEKA_DB_PASSWORD omeka
ENV OMEKA_DB_NAME omeka
ENV OMEKA_DB_PREFIX omeka_

# Turn on rewrite
RUN a2enmod rewrite

LABEL version="1.2.0"
LABEL omeka-version="2.6.1"

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]