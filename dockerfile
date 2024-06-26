FROM php:7.4-apache

# Instala dependencias adicionales si es necesario
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Copia los archivos desde el directorio html del proyecto al contenedor
COPY html/ /var/www/html/

# Establece los permisos correctos para el directorio
RUN chown -R www-data:www-data /var/www/html/

# Expon el puerto 80
EXPOSE 80
