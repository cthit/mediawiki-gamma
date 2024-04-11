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
RUN git checkout 89da9b3
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
RUN git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/TitleKey

# Install ParserFunctions for MediaWiki 1.35
WORKDIR /tmp
RUN curl -L https://extdist.wmflabs.org/dist/extensions/ParserFunctions-REL1_35-ee8b933.tar.gz -o ParserFunctions.tar.gz
RUN tar -xzf ParserFunctions.tar.gz -C /var/www/html/extensions
WORKDIR /var/www/html