# Rate It Up

Cari Rasa, Temukan Cerita Kuliner Terbaik Ada di Sini.

Rate It Up adalah website untuk berbagi, mencari, dan menilai tempat kuliner favorit. Temukan rekomendasi, ulasan, dan pengalaman kuliner terbaik dari komunitas.

## Fitur

-   Registrasi & Login
-   Role-based access (User & Administrator)
-   CRUD Tempat Kuliner
-   Review & Rating Tempat
-   Komentar pada Review
-   Responsive UI dengan Tailwind CSS

## Screenshot

<div align="center">
  <img src="public/Screenshot/Screenshot%202025-07-04%20at%2023-11-57%20Laravel.png" alt="Tampilan Rate It Up" width="350" style="margin: 0 8px;" />
  <img src="public/Screenshot/Screenshot%202025-07-04%20at%2023-12-20%20Laravel.png" alt="Tampilan Rate It Up" width="350" style="margin: 0 8px;" />
</div>

## Stack

-   Laravel 12
-   Tailwind CSS
-   Vite
-   MySQL/MariaDB

## Instalasi & Setup

```sh
# Clone repository
$ git clone https://github.com/miroocloud/RateItUp.git
$ cd RateItUp

# Install dependencies
$ composer install
$ npm install

# .env dan generate key
$ cp .env.example .env
$ php artisan key:generate

# Konfigurasi database di .env

# Migrasi & seeder database
$ php artisan migrate --seed

# Development (Laravel & Vite)
$ npm run dev

# Build production
$ npm run build
```

## Akun Login

-   **Admin**
    -   Email: `admin@rateitup.com`
    -   Password: `AdminHadir#0118`
-   **User**
    -   Email: `karina@rateitup.com`
    -   Password: `karinaAespo#0198`

## Lisensi

This Project is Under [MIT license ](LICENSE) &copy; 2025 Farid Nizam
