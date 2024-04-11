FROM mediawiki:1.35

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
RUN git checkout 5f553cc
RUN git submodule update --init --recursive
WORKDIR /var/www/html/extensions/MW-OAuth2Client-Gamma/vendors/oauth2-client
RUN composer install

# Install GetUserName
WORKDIR /var/www/html/extensions
RUN git clone https://github.com/Wikimedica/mediawiki-extensions-GetUserName GetUserName
WORKDIR /var/www/html/extensions/GetUserName
RUN git checkout 4306000

# Install TitleKey
WORKDIR /var/www/html/extensions
RUN git clone https://github.com/wikimedia/mediawiki-extensions-TitleKey TitleKey
WORKDIR /var/www/html/extensions/TitleKey
RUN git checkout cf26918

# Install ParserFunctions for MediaWiki 1.39
WORKDIR /tmp
RUN curl -L https://extdist.wmflabs.org/dist/extensions/ParserFunctions-REL1_35-47229c6.tar.gz -o ParserFunctions.tar.gz
RUN tar -xzf ParserFunctions.tar.gz -C /var/www/html/extensions
WORKDIR /var/www/html