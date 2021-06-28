composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link
chmod -R 777 storage/
composer dump-autoload
php artisan passport:install