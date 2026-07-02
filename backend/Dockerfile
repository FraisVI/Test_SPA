FROM php:8.2-fpm-alpine

WORKDIR /var/www/backend

RUN apk add --no-cache \
    bash \
    icu-dev \
    libzip-dev \
    oniguruma-dev \
    unzip \
  && docker-php-ext-install \
    bcmath \
    intl \
    mbstring \
    pdo_mysql \
    zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-dev --prefer-dist --no-interaction --no-progress --no-scripts

COPY . .

RUN composer dump-autoload --optimize \
  && mkdir -p storage/logs bootstrap/cache \
  && chown -R www-data:www-data storage bootstrap/cache

CMD ["php-fpm"]
