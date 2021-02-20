FROM mediawiki:latest

RUN git clone --depth 1 https://github.com/Swexbe/MW-OAuth2Client.git /var/www/html/extensions/MW-OAuth2Client
RUN cd /var/www/html/extensions/MW-OAuth2Client && git submodule update --init

# Various dependencies for composer
RUN apt update && apt install zip unzip

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv composer.phar /usr/local/bin/composer

RUN cd /var/www/html/extensions/MW-OAuth2Client/vendors/oauth2-client && composer install

COPY ./LocalSettings.php /var/www/html/