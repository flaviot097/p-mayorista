FROM php:7.4-apache

# Copia todos los archivos y carpetas desde el directorio raíz del proyecto al contenedor
COPY . /var/www/html/

# Establece los permisos correctos para el directorio
RUN chown -R www-data:www-data /var/www/html/

# Expon el puerto 80
EXPOSE 80
