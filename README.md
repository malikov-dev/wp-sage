# Bedrock + Sage

### Требования

- PHP >= 8.1
- Composer >= 2.0
- Node.js `16.14.2` - строго эта версия!
- Yarn 1.22.5
- 
### Установка

1. `@ sage/bud.config.js` Сменить на локальных хост

### Дополнительно

- `yarn dev` – запустить dev-проект [http://0.0.0.0:3000](http://0.0.0.0:3000)
- `yarn build` – запустить production сборку


### Установка плагинов WP

Ищем плагины тут: [wpackagist.org](https://wpackagist.org/search?q=&type=plugin)
пример:
composer require "wpackagist-plugin/wordpress-seo":"18.5.1"
```sh
$ composer require "wpackagist-plugin/wordpress-seo":"18.5.1"
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

## Community

Keep track of development and community news.

- Join us on Roots Slack by becoming a [GitHub sponsor](https://github.com/sponsors/roots) or [patron](https://www.patreon.com/rootsdev)
- Participate on the [Roots Discourse](https://discourse.roots.io/)
- Follow [@rootswp on Twitter](https://twitter.com/rootswp)
- Read and subscribe to the [Roots Blog](https://roots.io/blog/)
- Subscribe to the [Roots Newsletter](https://roots.io/subscribe/)
