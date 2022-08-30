# Bedrock + Sage

### Требования

- PHP >= 8.1
- Composer >= 2.0
- Node.js `16.14.2` - строго эта версия! `nvm use 16.14.2`
- Yarn 1.22.5


### Установка

1. `cp .env.example .env` Отредачить .env
2. `composer install` или `composer install --ignore-platform-reqs`
3. `chmod 777 web/app/cache`
4. `cd web/app/themes/sage/`
5. `composer install`
6. `@ sage/bud.config.js` Сменить на локальных хост
7. `nvm use 16.14.2` - только если другая версия сейчас
8. `yarn`
9. `yarn build`


### Дополнительно

- `yarn dev` – запустить dev-проект [http://0.0.0.0:3000](http://0.0.0.0:3000)
- `yarn build` – запустить production сборку


### Установка плагинов WP

Ищем плагины тут: [wpackagist.org](https://wpackagist.org/search?q=&type=plugin)
пример:
```
composer require "wpackagist-plugin/wordpress-seo":"18.5.1"
```


### Сниппет nginx

```
server {
    listen 80;
    server_name wp-sage.test;

    root /var/www/wp-sage/web;
    index index.php index.html index.htm;

    location / {
        try_files $uri $uri/ =404;
        if (!-e $request_filename) {
            rewrite ^.+/?(/wp-.*) $1 last;
            rewrite ^.+/?(/.*\.php)$ $1 last;
            rewrite ^(.+)$ /index.php?q=$1 last;
        }
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.1-fpm.sock;
    }
    
    # Prevent PHP scripts from being executed inside the uploads folder.
    location ~* /app/uploads/.*.php$ {
        deny all;
    }

    location ~ /\.ht {
        deny all;
    }
}
```

```
sudo ln -s /etc/nginx/sites-available/wp-sage /etc/nginx/sites-enabled/
sudo systemctl reload nginx
```


### Сниппет apache

ссылаемся на корень, тк .htaccess все сделают

```
<VirtualHost *:80>
    ServerName wp-sage.test
    DocumentRoot /var/www/wp-sage
    ErrorLog /var/www/_logs/wp-sage/error.log
    CustomLog /var/www/_logs/wp-sage/access.log combined
    <Directory /var/www/wp-sage/>
        Options +FollowSymlinks
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

```
sudo a2ensite wp-sage.conf
sudo systemctl restart apache2
```


### Такой же проект с нуля

1. ```sh
   $ composer create-project roots/bedrock .
   ```
2. ```sh
   $ cd web/app/themes/
   $ composer create-project roots/sage your-theme-name
   ```

## Installation

1. Create a new project:
   ```sh
   $ composer create-project roots/bedrock
   ```
2. Update environment variables in the `.env` file. Wrap values that may contain non-alphanumeric characters with quotes, or they may be incorrectly parsed.

- Database variables
  - `DB_NAME` - Database name
  - `DB_USER` - Database user
  - `DB_PASSWORD` - Database password
  - `DB_HOST` - Database host
  - Optionally, you can define `DATABASE_URL` for using a DSN instead of using the variables above (e.g. `mysql://user:password@127.0.0.1:3306/db_name`)
- `WP_ENV` - Set to environment (`development`, `staging`, `production`)
- `WP_HOME` - Full URL to WordPress home (https://example.com)
- `WP_SITEURL` - Full URL to WordPress including subdirectory (https://example.com/wp)
- `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT`
  - Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command)
  - Generate with [our WordPress salts generator](https://roots.io/salts.html)

3. Add theme(s) in `web/app/themes/` as you would for a normal WordPress site
4. Set the document root on your webserver to Bedrock's `web` folder: `/path/to/site/web/`
5. Access WordPress admin at `https://example.com/wp/wp-admin/`
