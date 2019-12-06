Installation steps:


1- git clone https://github.com/secmohammed/laravel-adr-auth-tdd laravel-adr-auth


2- cd laravel-adr-auth


3- composer install


4- copy any .env you have to this project, also duplicate it as .env.testing


5- run php artisan jwt:secret


6- php artisan config:cache


7- run phpunit to run the test suites.
