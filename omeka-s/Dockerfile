FROM php:7.4-apache
MAINTAINER john

# Turn on apache rewrite
# RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/
RUN a2enmod rewrite

# Install dependencies
RUN DEBIAN_FRONTEND=noninteractive apt-get update \
     && apt-get -y --force-yes install libgd-dev gettext-base msmtp-mta
RUN docker-php-ext-install pdo_mysql gd mysqli

#ADD --chown=www-data:www-data omeka-s/ /var/www/html/

# Add config files
ADD /config/ /omeka/
ADD msmtprc /etc/

RUN ln -s /omeka/docker-entrypoint.sh /usr/local/bin/
RUN chmod u+x /usr/local/bin/docker-entrypoint.sh

# Set some defaults (change them at run time if you like)
ENV OMEKA_WEB_ROOT "omeka-s"
ENV OMEKA_DB_HOST mysql
ENV OMEKA_DB_PORT 3306
ENV OMEKA_DB_USER omeka
ENV OMEKA_DB_PASSWORD omeka
ENV OMEKA_DB_NAME omeka_s

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
