## Pictrip

### How to install:
- git clone repo
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate
- php artisan migrate --env=testing
- php artisan passport:client --password --env=testing -q
