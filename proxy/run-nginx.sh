#!/usr/bin/env bash

# https://serverfault.com/questions/577370/how-can-i-use-environment-variables-in-nginx-conf
envsubst '$WIKI_DOMAIN $WIKI_PATH $WIKI_HOST' < /nginx.conf.template > /etc/nginx/nginx.conf
nginx -g 'daemon off;'
