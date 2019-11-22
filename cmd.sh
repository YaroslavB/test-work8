wait-for-it db:3306 -t 60 -- echo "db started"
composer install
artisan migrate
artisan ide-helper:generate -n
artisan ide-helper:meta -n
artisan ide-helper:models -n
artisan ide-helper:eloquent -n
php -S app:8080 -t public
