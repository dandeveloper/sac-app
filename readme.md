# SAC APP

## Environment Configuration

- PHP Version 7.1
- Database: Mysql 8.0
- DEPENDENCY MANAGER: Composer
- Server used in development: Nginx

### Using Laradock

I recommend to use [Docker](https://docs.docker.com/) with [Docker-Compose](https://docs.docker.com/compose/install/) and [Laradock](http://laradock.io/) to setup the Environment due to this Project is using [Laravel](https://laravel.com) Framework.

1 - Clone Laradock inside your PHP project:

`$ git clone https://github.com/Laradock/laradock.git`

2 - Enter the laradock folder and rename env-example to .env.

`$ cp env-example .env`

3 - Run the project containers:

`$ docker-compose up -d nginx mysql phpmyadmin`

-------

## Project Configuration

OBS.: If you are using Laradock just execute workspace container bash:

`$ docker-compose exec workspace bash`

1 - Installing Dependencies with Composer. Enter in the project root folder:

`$ composer install`

2 - Rename the file .env.example to .env

`$ mv .env.example .env`

3 - Setting the application key

`$ php artisan key:generate`

4 - Create The Database in Mysql. I recommend to use database collation `utf8mb4_unicode_ci`.

5 - Open the .env file and edit the database settings following your Environment configuration:

`DB_CONNECTION=mysql`<br>
`DB_HOST=mysql`<br>
`DB_DATABASE=sac_app`<br>
`DB_USERNAME=root`<br>
`DB_PASSWORD=secret`<br>

6 - Run the Migrations

`$ php artisan migrate`

7 - Run the Database Seed to create a default Login user (Name: Atendente, E-mail: atendente@atendente.com, Password: 123456):

`$ php artisan db:seed`