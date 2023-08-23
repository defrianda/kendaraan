# kendaraan
# Nama Proyek Anda

Deskripsi singkat tentang proyek Anda.

## Persyaratan

Pastikan Anda telah menginstal perangkat lunak berikut sebelum memulai:

- [Composer](https://getcomposer.org/)
- [MongoDB](https://www.mongodb.com/try/download/community)

## Instalasi

1. **Clone repositori:** Clone repositori ini ke direktori lokal Anda.

```bash
git clone https://github.com/username/nama-repo.git
cd nama-repo


composer install

Jalankan Migrasi dan Seeder: Migrasi dan Seeder diperlukan untuk membuat tabel atau koleksi dalam database Anda.
php artisan migrate
php artisan db:seed --class=MongoUsersTableSeeder

php artisan serve


Buka peramban dan akses proyek Anda di http://localhost:8000.
