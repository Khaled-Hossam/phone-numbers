# Phone Numbers

## Installation

***Note*** : It's recommended to install using [Docker](#docker) via Laravel Sail (laravel sail is just a wrapper for docker which is ready to use out-of-the-box) to avoid any conflicts with host machine versions



Clone the repository

    git clone git@github.com:Khaled-Hossam/phone-numbers.git

Switch to the repo folder

    cd phone-numbers

Install all the dependencies using composer

    composer install

<!-- Install npm dependencies and compile them

    npm install
    npm run prod -->

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate


Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

    

**TL;DR command list**

    git clone git clone git@github.com:Khaled-Hossam/phone-numbers.git
    cd phone-numbers
    composer install
    cp .env.example .env
    php artisan key:generate
    
    php artisan serve
----------

## Docker

To install with Docker [laravel sail](https://laravel.com/docs/9.x/sail), run following commands:
    (please note it may take several minutes only in the first time to build containers)

```
git clone git@github.com:Khaled-Hossam/phone-numbers.git
cd phone-numbers

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

./vendor/bin/sail up -d
cp .env.example .env
./vendor/bin/sail artisan key:generate

```

# Code overview


## Folders

- `app/Http/Controllers` - Contains the controllers
- `app/Http/Requests` - Contains the validation requests
- `app/Http/Resources` - Contains the api response resource (it service as response DTO)
- `app/Services` - Contains the services which encapsulate business logic
- `app/Enums` - Contains the enums
- `routes` - Contains the api routes defined in api.php file
- `resources/js/layout` - Contains vue main layout
- `resources/js/views/*` - Contains pages vue components
- `resources/js/routes.js` - Contains vue router routes
- `tests/Features/PhoneNumbersTest` - Contains apis tests


----------

# APIS

Get phone numbers api

    get /api/phone-numbers

Request query params

| **Required** 	| **Key**              	| **Value**            	|
|----------	|------------------	|------------------	|
| No      	| is_valid_phones     	| [0, 1] 	|
| No      	| country_code     	| [country_code] 	|


list countries api

    get /api/countries-list
----------

# Feature Testing For API

To run test 

    ./vendor/bin/sail artisan test --filter PhoneNumbersTest

----------
