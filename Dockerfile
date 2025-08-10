# Dockerfile cho Laravel (PHP 8.2, Composer, SQLite)
FROM php:8.2-apache

# Cài đặt các extension cần thiết
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        libzip-dev \
        unzip \
        sqlite3 \
        libsqlite3-dev \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zlib1g-dev \
        build-essential \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy source code
COPY . /var/www/html

WORKDIR /var/www/html

# Phân quyền cho storage và bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy file cấu hình Apache
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Expose port
EXPOSE 80

# Chạy migrate và serve (sửa cảnh báo CMD)
CMD ["apache2-foreground"]
