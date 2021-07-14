FROM php:fpm
RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl libonig-dev git-all
RUN docker-php-ext-install pdo  mbstring
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo  mbstring
WORKDIR /app
COPY . /app
RUN composer install

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 80