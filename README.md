<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Forum

Forum is a web application created to manage posts and responses. It allows the guests to see posts and responses, and create new 
posts and responses for authenticated users. Forum was built using PHP and Laravel. 

To start Forum, you can follow these steps:

- Clone this project in your local environment, running `git clone https://github.com/escalante308/forum`
- Go inside the Forum directory, using `cd forum`.
- Create the .env file using the .env.example file, using `cp .env.example .env`. Then, open the file and set the "DB_PASSWORD" variable to "password"
- Run the Docker Containers, using `docker-compose up -d`. This will take some minutes the first time you run the command.
- After this, you can access to the app in your browser going to http://localhost
- Once the Docker Containers are running, we can start making changes to the app. If you're using VSCode, run `code .` to start a VSCode window from the app directory. Then, using the Remote Connections plugin, you need to attach VSCode to a running container, pressing CTRL+SHIFT+P and writing "Attach to Running Container" and selecting the container that is running Laravel

## Installing in server

- Prerrequisites: 
  - PHP 8.1+ and modules
  - MySQL 8
- Clone project in server
- Create a new Database
- Copy .env.example to .env and set Environment variables
  - DB_DATABASE=<database name>
  - DB_USERNAME=<mysql username>
  - DB_PASSWORD=<mysql password>
- Run `composer install`
- Run `php artisan migrate:fresh --seed` To create the Database Structure and the required rows (1000 users - 10000 posts - at least 5 responses per post)
- Run `php artisan key:generate` to add the Env Key
- Depending on the server configuration, you need to run `chmod -R 777 /var/www/html/storage/logs` so the application can create Log files 
