dev:
	wait-for-it db:3306 -t 60
	composer install
	artisan migrate
	make ide-helper
	php -S backend:8080 -t public
ide-helper:
	artisan ide-helper:generate -n
	artisan ide-helper:meta -n
	artisan ide-helper:models -n
	artisan ide-helper:eloquent -n
