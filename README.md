# Laravel-ToDo

This is a simple ToDo List written in php and using the framework Laravel.

After cloning, do the following things:
- make sure, you have php, mysql, nodejs (>= 6.0) and npm installed (run php -v, mysql, nodejs -v and npm -v)
- make sure, you have composer installed (run composer)
- login to mysql and create a new database
- open .env and put in the name of the database, user name and password

- cd into the repository and run:
  - composer install
  - npm install
  - php artisan key:generate
  - php artisan migrate:fresh
  - php artisan db:seed
  
- if all goes well, you can start the server
  - php artisan serve
- in your browser go to http://localhost:8000 and you should be prompted to login -> use admin@test.com with toptal to log in
