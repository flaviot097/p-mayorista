FROM php:7.4-apache

# Copia los archivos desde el directorio html del proyecto al contenedor
COPY html/ /var/www/html/

# Establece los permisos correctos para el directorio
RUN chown -R www-data:www-data /var/www/html/

# Expon el puerto 80
EXPOSE 80
