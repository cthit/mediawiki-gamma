FROM mediawiki:1.39

# Various dependencies for composer
RUN apt update && apt install zip unzip

# Install composer
RUN php -r "readfile('https://getcomposer.org/installer');" | php
RUN mv composer.phar /usr/local/bin/composer

# Install PluggableAuth
WORKDIR /var/www/html/extensions
RUN git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/PluggableAuth

# Install OpenIDConnect
WORKDIR /var/www/html/extensions
RUN git clone https://gerrit.wikimedia.org/r/mediawiki/extensions/OpenIDConnect
WORKDIR /var/www/html/extensions/OpenIDConnect
RUN composer install

# Install GetUserName
WORKDIR /var/www/html/extensions
RUN git clone https://github.com/Wikimedica/mediawiki-extensions-GetUserName GetUserName
WORKDIR /var/www/html/extensions/GetUserName
RUN git checkout 1f08a13

# Install TitleKey
WORKDIR /var/www/html/extensions
RUN git clone https://github.com/wikimedia/mediawiki-extensions-TitleKey TitleKey
WORKDIR /var/www/html/extensions/TitleKey
RUN git checkout 4ff9d24

# Install ParserFunctions for MediaWiki 1.39
WORKDIR /tmp
RUN curl -L https://extdist.wmflabs.org/dist/extensions/ParserFunctions-REL1_39-7fa883d.tar.gz -o ParserFunctions.tar.gz
RUN tar -xzf ParserFunctions.tar.gz -C /var/www/html/extensions
WORKDIR /var/www/html

# Install Citizen skin
WORKDIR /var/www/html/skins
RUN git clone https://github.com/StarCitizenTools/mediawiki-skins-Citizen Citizen
WORKDIR /var/www/html/skins/Citizen
RUN git checkout 9caf91a

COPY ./LocalSettings.php /var/www/html/
WORKDIR /var/www/html
