FROM serversideup/php:8.3-fpm-nginx

USER root

RUN install-php-extensions exif gd intl protobuf

USER www-data
