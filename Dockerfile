FROM php:8.2-cli

# Instala extensões necessárias para Laravel e MySQL
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libpq-dev \
    libzip-dev \
    zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www

# Expondo porta para php artisan serve
EXPOSE 8000

CMD ["php", "-a"]