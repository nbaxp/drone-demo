FROM  composer:2.3 AS build

WORKDIR /source
COPY php .
RUN composer config repo.packagist composer https://mirrors.aliyun.com/composer/ && composer update

FROM php:8.1-fpm-alpine

WORKDIR /var/www/html
EXPOSE 80
COPY --from=build /source .
RUN sed -i 's!https://dl-cdn.alpinelinux.org/!https://mirrors.ustc.edu.cn/!g' /etc/apk/repositories
RUN apk update && apk add nginx && cp nginx.conf /etc/nginx/http.d/default.conf
CMD nginx & php-fpm