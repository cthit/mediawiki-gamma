FROM nginx:1.19.10

COPY nginx.conf.template /nginx.conf.template
COPY run-nginx.sh /run-nginx.sh
RUN chmod +x /run-nginx.sh

CMD /run-nginx.sh
