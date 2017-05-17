FROM omeka:1.1.3
MAINTAINER matthew

# Put this at the end so if we change it, it won't wipe out the cache and have to rebuild everything!
LABEL version="0.1.0"
LABEL omeka-version="2.5"

RUN rm -rf /var/www/html

ENV OMEKA_WEB_ROOT "/sw/"
ENV OMEKA_DB_PREFIX omeka_sw_