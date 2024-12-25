# Imagen base
FROM php:8.2-apache

# Paquetes PHP
RUN docker-php-ext-install mysqli
RUN docker-php-ext-enable mysqli


#########################
#arrancar: sudo docker-compose up -d

#apagar: sudo docker-compose down

#remover imagen creada: sudo docker rmi nombre_imagen