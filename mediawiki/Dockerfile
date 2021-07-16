FROM mediawiki:1.35.0

# Various dependencies for composer
RUN apt update && apt install zip unzip

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv composer.phar /usr/local/bin/composer

COPY ./LocalSettings.php /var/www/html/

# Install MW-OAuth2Client-Gamma
WORKDIR /var/www/html/extensions
RUN git clone https://github.com/cthit/MW-OAuth2Client-Gamma
WORKDIR /var/www/html/extensions/MW-OAuth2Client-Gamma
RUN git checkout acafedf
RUN git submodule update --init --recursive
WORKDIR /var/www/html/extensions/MW-OAuth2Client-Gamma/vendors/oauth2-client
RUN composer install

# Install GetUserName
WORKDIR /var/www/html/extensions
RUN git clone https://github.com/Wikimedica/mediawiki-extensions-GetUserName GetUserName
WORKDIR /var/www/html/extensions/GetUserName
RUN git checkout 4306000
WORKDIR /var/www/html
