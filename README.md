<img src="https://zupimages.net/up/22/46/ufwn.png" width="300" height="300" align="center" alt="Goldfish">

## What is Goldfish ?

Goldfish is a web application that will help you remember each of your favorites artists concerts... and be informed when they plan a new date !!

With Goldfish you can save your artists and concerts in our database to create a personalized agenda page.

## Project status

We are <a href="https://www.linkedin.com/in/jonas-jallet/">Jonas</a>, <a href="https://www.linkedin.com/in/nina-iacoponelli/">Nina</a>, <a href="https://www.linkedin.com/in/amaury-beurrier/">Amaury</a>, <a href="https://www.linkedin.com/in/s%C3%A9bastien-papet/">Sébastien</a> and <a href="https://www.linkedin.com/in/hugo-tapia-77037224a/">Hugo</a>, students at the Lyon Wild Code School and specialized in PHP / Symfony. This is the second projet we had to realize, during 5 weeks, after a little more than one month of formation. We chose this subject because we love music and going to concerts...and we all had the sad experience of missing a loved artist because we didn't know they were on tour !

## Steps Install

1. Clone the repo from Github.
2. Run `composer install`.
3. Create *config/db.php* from *config/db.php.dist* file and add your DB parameters. Don't delete the *.dist* file, it must be kept.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'your_db_name');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PASSWORD', 'your_db_password');
```
4. Import *database.sql* in your SQL server, you can do it manually or use the *migration.php* script which will import a *database.sql* file.
5. Run the internal PHP webserver with `php -S localhost:8000 -t public/`. The option `-t` with `public` as parameter means your localhost will target the `/public` folder.
6. Go to `localhost:8000` with your favorite browser.

## Requirements

Please make sure you have the "extension=php_intl.dll" installed and running. If not, you can enter the command "composer require twig/intl-extra" in your CLI and check your PHP files if necessary.

### Windows Users

If you develop on Windows, you should edit you git configuration to change your end of line rules with this command :

`git config --global core.autocrlf true`



