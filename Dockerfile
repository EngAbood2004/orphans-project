FROM php:8.2-fpm

# تثبيت الحزم الأساسية
RUN apt-get update && apt-get install -y \
    nginx \
    curl \
    git \
    zip \
    unzip \
    libpq-dev \
    && docker-php-ext-install pdo_pgsql

# تثبيت Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# نسخ المشروع
COPY . /var/www/html
WORKDIR /var/www/html

# تثبيت التبعيات
RUN composer install --no-dev --optimize-autoloader

# إعداد المفاتيح والكاش
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# إعداد NGINX
COPY conf/nginx-site.conf /etc/nginx/sites-enabled/default

# صلاحيات
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
