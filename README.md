1. Clone to your directory
2. Go to your directory
3. Run in terminale next commands
4. `docker-compose up -d --build`
5. `docker exec -it cinema_php /bin/sh`
6. In php container run next commands
7. `composer install`
8. `cp .env.example .env`
9. `php artisan key:generate`
10. `chmod -R 777 storage`

Use this data for connect to database. Put it in .env file (which located in src directore)
`DB_CONNECTION=mysql`
`DB_HOST=mysql`
`DB_PORT=3306`
`DB_DATABASE=cinema`
`DB_USERNAME=admin`
`DB_PASSWORD=123456`

11. Continue to run next commands
12. `php artisan migrate --seed`
13. `npm install`
14. `npm run build`

URL http://localhost:8000/
