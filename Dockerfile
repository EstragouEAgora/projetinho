FROM trafex/php-nginx

# Copie o projeto Laravel para o diretório de trabalho no container
COPY . /var/www/html

# Copie o script para o diretório /scripts no container
COPY /scripts/00-laravel-deploy.sh /scripts/

# Configuração da imagem
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Configuração do Laravel
ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

# Permitir que o composer seja executado como root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/scripts/00-laravel-deploy.sh"]
