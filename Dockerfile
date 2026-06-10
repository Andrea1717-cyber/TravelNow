FROM php:8.2-apache

# Instalar dependencias del sistema y extensiones de PHP requeridas por Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && apt-get install -y libpq-dev \
&& docker-php-ext-install gd pdo pdo_mysql pdo_pgsql pgsql

# Habilitar mod_rewrite de Apache para Laravel
RUN a2enmod rewrite

# Cambiar el documento raíz de Apache a la carpeta public de Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copiar los archivos del proyecto
WORKDIR /var/www/html
COPY . .

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Dar permisos correctos a las carpetas de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Limpiar cachés viejos, ejecutar migraciones y arrancar Apache en vivo
CMD php artisan config:clear && php artisan cache:clear && php artisan migrate --force && apache2-foreground

EXPOSE 80