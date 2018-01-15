FROM nginx:latest
ADD default.conf /etc/nginx/conf.d
RUN ["mkdir", "-p", "/var/www/html"]
ADD index.html /var/www/html
