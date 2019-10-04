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

1. git clone https://github.com/hanif05/manajemen-sekolah.git
2. cd manajemen-sekolah
3. composer install
4. cp .env.example .env
5. php artisan key:generate
6. buka .env kemudian edit DB_DATABASE= namadbnya | DB_USERNAME= root | DB_PASSWORD= password jika db nya menggunakan password
7. php artisan migrate --seed
8. php artisan storage:link
9. php artisan serve

## Login

Untuk Login Admin
email = admin@gmail.com | password = admin

## Form Lamaran & Tes essai

untuk form lamaran dan essai didalam folder dengan nama lamaran-test

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).