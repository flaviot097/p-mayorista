FROM php:7.4-apache

# Copia todos los archivos y carpetas desde el directorio raíz del proyecto al contenedor
COPY . /var/www/html/

# Establece los permisos correctos para el directorio
RUN chown -R www-data:www-data /var/www/html/

# Asegura que la carpeta 'uploads' exista y tenga los permisos adecuados
RUN mkdir -p /var/www/html/uploads && \
    chown -R www-data:www-data /var/www/html/uploads && \
    chmod -R 755 /var/www/html/uploads

# Expon el puerto 80
EXPOSE 80