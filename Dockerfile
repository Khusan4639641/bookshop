# Используем базовый образ Ubuntu
FROM ubuntu:latest

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
    apache2 \
    php \
    php-mysql \
    libapache2-mod-php \
    php-xml \
    php-curl \
    mc \
    openssh-server \
    curl \
    unzip \
    mysql-server

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Копируем файлы проекта в контейнер
COPY . /var/www/html/bookshop

# Настраиваем виртуальный хост для Apache
COPY docker/bookshop_vhost.conf /etc/apache2/sites-available/bookshop.conf
RUN a2ensite bookshop && a2enmod rewrite

# Добавляем директиву ServerName в основную конфигурацию Apache
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Создаем пользователя для SSH
RUN useradd -m admin && echo "admin:trust" | chpasswd && mkdir /var/run/sshd

# Устанавливаем зависимости Laravel
WORKDIR /var/www/html/bookshop
RUN composer install --no-interaction --no-plugins --no-scripts

# Копируем инициализационные скрипты MySQL
COPY docker-entrypoint-initdb.d /docker-entrypoint-initdb.d

# Устанавливаем права доступа
RUN chown -R www-data:www-data /var/www/html/bookshop/storage /var/www/html/bookshop/bootstrap/cache
RUN chmod -R 775 /var/www/html/bookshop/storage /var/www/html/bookshop/bootstrap/cache

# Открываем порты для Apache, SSH и MySQL
EXPOSE 80 22 3306

# Запускаем MySQL, Apache и SSH серверы
CMD service mysql start && sleep 10 && service apache2 start && /usr/sbin/sshd -D
