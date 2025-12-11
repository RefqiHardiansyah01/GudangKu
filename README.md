# ProjectPraktikum

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
</p>

---

# 🚀 Cara Menjalankan Project Laravel

Sebelum menjalankan aplikasi Laravel ini, pastikan semua langkah berikut dilakukan:

---

## 🔧 1. Nyalakan XAMPP
Pastikan service berikut berjalan:

- Apache
- MySQL

---

## 🗄️ 2. Import Template Database  
Tersedia di folder:

```
database/template
```

Kamu dapat mengimpor database tersebut melalui phpMyAdmin atau menggunakan seeder bawaan Laravel.

---

## 📦 3. Install Dependencies

```
composer install
npm install
```

---

## ⚙️ 4. Generate Key & Setup Environment

Jika belum ada file `.env`, duplikasi dari `.env.example`:

```
cp .env.example .env
```

Generate key:

```
php artisan key:generate
```

---

## 🗃️ 5. Migrasi Database (Opsional)

Jika ingin menggunakan seeder:

```
php artisan migrate:fresh
php artisan db:seed
```

---

## ▶️ 6. Jalankan Laravel & Vite

Jalankan server backend Laravel:

```
php artisan serve
```

Jalankan asset bundler:

```
npm run dev
```

---