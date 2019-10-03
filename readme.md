<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Aplikasi Manajemen Sekolah

Aplikasi ini dibuat untuk persyaratan tes melamar pekerjaan.

## Instalasi

git clone https://github.com/hanif05/manajemen-sekolah.git
cd manajemen-sekolah
composer install
cp .env.example .env
php artisan key:generate
buka .env kemudian edit DB_DATABASE= namadbnya | DB_USERNAME= root | DB_PASSWORD= password jika db nya menggunakan password
php artisan migrate --seed
php artisan storage:link
php artisan serve

## Login

Untuk Login Admin
email = admin@gmail.com
password = admin

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).