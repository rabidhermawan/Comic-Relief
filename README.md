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

# Running the server
composer run dev
```
