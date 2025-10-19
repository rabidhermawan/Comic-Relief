# Comic Relief

Project for Framework Programming class. Built for reading and uploading comics

## Comic ZIP format

```
.
└── {comic-zip}
    ├── cover.jpg
    ├── cover-small.jpg
    └── pages
        ├── 1.jpg
        ├── 2.jpg
        ├── ...
        ├── 10.jpg
        ├── ...
        └── n.jpg
```

## Command to run this on Linux
```bash
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
