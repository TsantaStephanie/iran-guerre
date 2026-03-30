cd "d:\S6\Mr Rojo\Projet Web Design\Iran-war\iran-guerre"
docker compose down
docker compose up -d --build
docker compose exec laravel.test composer install
docker compose exec laravel.test php artisan key:generate
docker compose exec laravel.test chmod -R 775 storage bootstrap/cache

[cmd]
docker compose exec pgsql psql -U sail -d postgres -c "CREATE DATABASE iran_war;"
docker compose exec -T pgsql psql -U sail -d iran_war < script.sql

# Pour compiler vos fichiers CSS/JS (Vite)
docker compose exec laravel.test npm install
docker compose exec laravel.test npm run build
