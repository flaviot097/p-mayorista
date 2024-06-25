FROM php:7.4-apache

# Copia los archivos de tu proyecto al contenedor
COPY . /

# Expon el puerto 80
EXPOSE 80
