# Namestitev spletne strani

## Zahteve
* PHP >= 5.6.4
* Razširitve PHP:
    * Open SSL
    * PDO
    * Mbstring
    * Tokenizer
    * XML PHP
* Program [Composer](https://getcomposer.php/download)

 
## Postopek namestitve
 
V našem priljubljenem CLI se navigiramo v mapo projekta. Zaženemo sledeče ukaze:
 
```shell
composer install # Bo trajal malce dlje
cp .env.example .env
php artisan key:generate
```
 
Zatem v našem IDE-ju po izbiri uredimo to datoteko `.env` in sicer najpomembnejši del je povezava z bazo.

```text
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
 
Ko to uredimo pa vpišemo še sledeče ukaze:
 
```shell
php artisan migrate
php artisan serve
```
 
 Tako stran že lahko obiščemo na povezavi http://localhost:8000