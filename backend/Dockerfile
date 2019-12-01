FROM php:7.2-cli as developer
ARG DOCKER_HOST_IP=172.17.0.1
ARG IDE_KEY=app
ARG SERVER_NAME=app
ENV XDEBUG_CONFIG="idekey=${IDE_KEY} remote_enable=1 remote_host=${DOCKER_HOST_IP}"
ENV PHP_IDE_CONFIG="serverName=${SERVER_NAME}"
RUN apt-get update \
    && apt-get install -y git unzip wait-for-it libgd-dev \
    && pecl install xdebug-2.7.1 \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-configure gd \
       --with-freetype-dir=/usr/include/ \
       --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install pdo_mysql gd \
    && curl -s https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet \
    && ln -s /app/artisan /usr/local/bin/artisan
WORKDIR /app
CMD make dev
EXPOSE 8080
