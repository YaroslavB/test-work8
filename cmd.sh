wait-for-it db:3306 -t 60 -- echo "db started"
composer install
artisan migrate
php -S app:8080 -t public
