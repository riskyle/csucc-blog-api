<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Guide to run the CSUCC Blog API

-   Step 1: git clone https://github.com/riskyle/csucc-blog-api.git

-   Step 2: Run `composer install` in your terminal.

-   Step 3: Run `cp .env.example .env` in your terminal. This command will copy the .env.example text into .env file.

-   Step 4: Run `php artisan key:generate` in your terminal. This command will generate an app key for your laravel.

-   Step 5: Run `php artisan migrate` in your terminal. I'm using SQLite for faster configuration so I have much time to create the system.

-   Step 6: Run `php artisan serve` in your terminal.
