FROM mediawiki:1.35.0

COPY /extensions /var/www/html/extensions

# Various dependencies for composer
RUN apt update && apt install zip unzip

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv composer.phar /usr/local/bin/composer

RUN cd /var/www/html/extensions/MW-OAuth2Client-Gamma/vendors/oauth2-client && composer install

COPY ./LocalSettings.php /var/www/html/