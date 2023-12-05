FROM php:8.3.0-apache

RUN docker-php-ext-install pdo pdo_mysql  #install necessary PHP extensions
RUN DEBIAN_FRONTEND=noninteractive apt-get -y update && apt-get -y install npm #install needed software

RUN a2enmod rewrite #allow mod rewrite for Apache

#install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php \
    && rm composer-setup.php \
    && mv composer.phar /usr/local/bin/composer

CMD /usr/sbin/apache2ctl -D FOREGROUND
