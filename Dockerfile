FROM php:8.2-apache

#Install mysqli (for mysql conn)
RUN docker-php-ext-install mysqli

#Copy app code into Apache root
COPY app/ /var/www/html/

#Set proper permission
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
