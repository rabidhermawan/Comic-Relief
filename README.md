# Comic Relief

Project for Framework Programming class. Built for reading and uploading comics

```
# Ensure Laravel is installed
composer install
composer global require laravel/installer
composer require zanysoft/laravel-zip

npm install && npm run build

cp .env.example .env
# Connect your database 

php artisan key:generate
php artisan migrate:fresh --seed
php artisan storage:link

# Running the server
composer run dev
```

```
\c comicrelief_db;
ALTER SCHEMA public OWNER TO comicrelief_user;
GRANT ALL PRIVILEGES ON DATABASE comicrelief_db TO comicrelief_user;

```
