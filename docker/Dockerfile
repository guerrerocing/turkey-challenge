FROM serversideup/php:8.3-cli as base
USER root
RUN install-php-extensions exif gd intl protobuf
FROM base
ENV AUTORUN_ENABLED=true
ENV AUTORUN_LARAVEL_MIGRATION_ISOLATION=true
ENV AUTORUN_LARAVEL_STORAGE_LINK=true
ENV HEALTHCHECK_PATH="/up"
ENV PHP_OPCACHE_ENABLE=1
COPY . $APP_BASE_DIR
RUN composer install --no-dev --no-scripts --optimize-autoloader
EXPOSE 3000
