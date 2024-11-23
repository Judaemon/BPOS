docker-compose up --build -d

docker exec -it BPOS bash
    
run: npm run dev

http://localhost:100

php artisan migrate

php artisan db:seed --class=ProductSeeder

php artisan migrate:fresh --seed

php artisan db:seed --class=Database\\Seeders\\SalesTableSeeder
