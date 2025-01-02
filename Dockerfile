# Usa la imagen oficial de PHP con soporte para FPM
FROM php:8.1-fpm

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www

# Copia todos los archivos del proyecto al contenedor
COPY . .

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-install pdo pdo_mysql \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd

# Instala Composer y las dependencias
RUN composer install --no-dev --optimize-autoloader

# Da permisos a la carpeta storage y bootstrap/cache
RUN chmod -R 777 storage bootstrap/cache

# Expone el puerto 9000 para PHP-FPM
EXPOSE 9000

# Lanza el servidor PHP
CMD ["php-fpm"]
