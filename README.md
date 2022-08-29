# Tes DOT Indonesia

Aplikasi ini dibuat sebagai test DOT Indonesia. Pengembangan aplikasi ini menggunakan laravel jetstream untuk mempersingkat pembuatan auth. Dikarenakan menggunakan laravel jetstream maka css yang saya gunakan adalah tailwindcss. Selain itu saya juga menggunakan framework laravel livewire.

## Login

-   masuk ke halaman utama, lalu pilih **login** di pojok kanan atas
-   untuk login anda bisa menggunakan akun **email**: nurhakiki@gmail.com dan **password**: password
-   teradapat beberapa menu, silahkan masuk ke menu **items** untuk mengelola data
-   data ini diambil dari tabel **items** dan berelasi many-to-one dengan table **item_types**
-   anda juga dapat mengubah data diri dan password pada menu profil, dengan cara menghover nama di pojok kanan atas
-   logout dapat dilakukan dengan cara menekan tombol logout di pojok kanan atas

## Cara Menggunakan

```bash
# clone repository
$ git clone https://github.com/5h1ro/dot_test.git
# install package php
$ composer install
# install package node
$ npm install && npm run dev
# build ketika sudah selesai melakukan develop aplikasi
$ npm run build
# Migrate Database
$ php artisan migrate:fresh --seed
```
