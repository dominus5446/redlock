FROM php:8.1-apache AS apache


COPY index.php /var/www/html/

RUN chown -R www-data:www-data /var/www/html && chmod -R u+r,g+r,o-r,o-x /var/www/html

RUN apt-get update -y && apt-get upgrade -y
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

EXPOSE 80
ENV APACHE_PORT 7077

FROM mysql:latest AS sql

COPY redlock-db.sql /docker-entrypoint-initdb.d/
