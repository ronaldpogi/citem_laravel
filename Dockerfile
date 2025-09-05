FROM public.ecr.aws/docker/library/php:8.3.10
RUN apt-get update -y && apt-get install -y openssl zip unzip git \
    && rm -rf /var/lib/apt/lists/*
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Enable PDO MySQL for connection to MySQL container
RUN docker-php-ext-install pdo pdo_mysql

RUN php -m | grep mbstring
WORKDIR /app
COPY . /app
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000
