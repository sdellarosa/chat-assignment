composer install
echo > database/database.sqlite
php artisan migrate
php artisan db:seed
mv .env.example .env
php artisan key:generate
sed -i -e 's|DB_DATABASE=|DB_DATABASE=$PWD/database/database.sqlite|g' .env