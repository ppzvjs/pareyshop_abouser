FROM nginx:stable-alpine
WORKDIR /etc/nginx/conf.d
COPY ./nginx/conf/nginx.conf .
RUN mv nginx.conf default.conf
COPY ./nginx/ssl/localhost.crt  /etc/nginx/ssl/certs/wildcard.ppzv.de.cert
COPY ./nginx/ssl/localhost.key  /etc/nginx/ssl/private/wildcard.ppzv.de.key
#RUN ln -s /opt/wpthemes/om /var/www/html/wp-content/themes/MB-Template
WORKDIR /var/www/html
#COPY ../src .