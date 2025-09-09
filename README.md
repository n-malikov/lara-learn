# lara-learn

### Installation

~~~
cp .env.example .env
composer install
# composer install --no-dev

sudo chown -R ${USER}:www-data storage
sudo chown -R ${USER}:www-data bootstrap/cache
# chmod -R 775 storage bootstrap/cache

php artisan key:generate
php artisan migrate
php artisan storage:link
~~~


### Nginx

~~~
sudo nano /etc/nginx/sites-available/lara-learn
~~~

~~~
server {
    listen 80;
    server_name lara-learn.test;
    root /var/www/lara/lara-learn/public;
    index index.php;
    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
    }
    location ~ /\.ht {
        deny all;
    }
}
~~~

~~~
sudo ln -s /etc/nginx/sites-available/lara-learn /etc/nginx/sites-enabled/
~~~

~~~
sudo systemctl reload nginx
~~~


### Apache 2

~~~
sudo nano /etc/apache2/sites-available/lara-learn.conf
~~~

~~~
<VirtualHost *:80>
    ServerAdmin webmaster@localhost
    ServerName lara-learn.test
    DocumentRoot /var/www/lara/lara-learn/public
    
    <Directory /var/www/lara/lara-learn/public/>
        Options +FollowSymlinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
~~~

~~~
sudo a2ensite lara-learn.conf
~~~

~~~
sudo systemctl restart apache2
~~~
