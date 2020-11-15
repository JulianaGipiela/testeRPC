FROM ubuntu:16.04


ENV NGINX_VERSION 1.9.3-1~jessie

RUN apt-get update && apt-get install -y nginx php7.0-fpm curl git && apt-get clean

# NGINX
RUN ln -sf /dev/stdout /var/log/nginx/access.log
RUN ln -sf /dev/stderr /var/log/nginx/error.log
VOLUME ["/var/cache/nginx"]
RUN rm /etc/nginx/sites-available/default
ADD ./config/default /etc/nginx/sites-available/default

CMD service php7.0-fpm start && nginx -g "daemon off;"

COPY . /var/www/html

WORKDIR /var/www/html

EXPOSE 80 
