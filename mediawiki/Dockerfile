FROM mediawiki:1.35.0

COPY /extensions /var/www/html/extensions

# Various dependencies for composer
RUN apt update && apt install zip unzip

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv composer.phar /usr/local/bin/composer

RUN cd /var/www/html/extensions/MW-OAuth2Client-Gamma/vendors/oauth2-client && composer install

COPY ./LocalSettings.php /var/www/html/

# Install GetUserName 2.0
RUN curl https://github.com/Wikimedica/mediawiki-extensions-GetUserName/archive/refs/tags/v2.0.tar.gz -L -o /tmp/GetUserName.tar.gz
RUN tar -xzf /tmp/GetUserName.tar.gz -C /tmp
RUN mkdir -p extensions/GetUserName
RUN cp -r /tmp/mediawiki-extensions-GetUserName-2.0/* extensions/GetUserName
RUN rm -rf /tmp/*
