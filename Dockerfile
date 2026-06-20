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
RUN composer install --no-dev --optimize-autoloader --no-interaction

# إعداد المفاتيح والكاش
RUN php artisan key:generate
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# إعداد NGINX بسيط
RUN echo "server { listen 80; root /var/www/html/public; index index.php; location / { try_files \$uri \$uri/ /index.php?\$query_string; } location ~ \.php$ { fastcgi_pass 127.0.0.1:9000; fastcgi_index index.php; include fastcgi_params; fastcgi_param SCRIPT_FILENAME \$document_root\$fastcgi_script_name; } }" > /etc/nginx/sites-enabled/default

# صلاحيات
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
