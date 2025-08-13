# Base PHP 8.2 + Apache
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
        libpq-dev \
        build-essential \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_mysql pdo_sqlite pdo_pgsql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Cài Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy source code Laravel
COPY . /var/www/html
WORKDIR /var/www/html

# Xóa cache provider đã build từ môi trường local (tránh lỗi thiếu dev provider như Pail)
RUN rm -f bootstrap/cache/packages.php bootstrap/cache/services.php || true

# Cài dependencies Laravel cho production, bỏ qua scripts để không chạy Artisan trong lúc build
# (tránh lỗi "Laravel\\Pail\\PailServiceProvider not found" do dev không được cài)
RUN composer install --no-dev --no-scripts --optimize-autoloader

# Phân quyền cho storage và bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache

# Enable mod_rewrite cho Laravel
RUN a2enmod rewrite

# Copy file cấu hình Apache
COPY ./docker/apache.conf /etc/apache2/sites-available/000-default.conf

# Expose port 80
EXPOSE 80

# Command mặc định
CMD ["apache2-foreground"]
