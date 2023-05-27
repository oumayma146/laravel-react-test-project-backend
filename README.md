

## Installation

Here is how you can run the project locally:

1/Clone this repo

git clone https://github.com/oumayma146/test_backend_softt365.git

2/Go into the project root directory

cd test_backend_softt365

3/Copy .env.example file to .env file

cp .env.example .env

4/Create database test (you can change database name)

5/Go to .env file

set database credentials (DB_DATABASE=test, DB_USERNAME=root, DB_PASSWORD=)

4/Install PHP dependencies

composer install

5/Generate key

php artisan key:generate

6/Run migration

php artisan migrate

7/Run server

php artisan serve


Make sure to follow your Laravel local Development Environment.

