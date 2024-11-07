# ERD OrderingApp
![ordering-app](https://github.com/pearlgw/api_backend_order_eat_laravel/blob/master/contentgithub/erd.png)

# Dokumentasi API

## Autentikasi & Pengguna

| **URL**                 | **Metode** | **Deskripsi**                                      |
|-------------------------|------------|----------------------------------------------------|
| `/auth/login`           | POST       | Melakukan autentikasi dan login pengguna.          |
| `/auth/me`              | GET        | Mendapatkan informasi pengguna yang sedang login.  |
| `/auth/logout`          | POST       | Keluar dari sesi dan menghapus token autentikasi.  |

## Manajemen Pengguna

| **URL**                 | **Metode** | **Deskripsi**                                      |
|-------------------------|------------|----------------------------------------------------|
| `/user`                 | POST       | Membuat pengguna baru.                            |

## Item

| **URL**                 | **Metode** | **Deskripsi**                                      |
|-------------------------|------------|----------------------------------------------------|
| `/items`                | GET        | Mendapatkan daftar semua item.                    |
| `/item`                 | POST       | Membuat item baru.                                |
| `/item/{id}`            | GET        | Mendapatkan detail item berdasarkan ID.           |
| `/item/{id}`            | PATCH      | Memperbarui data item berdasarkan ID.             |

## Order

| **URL**                          | **Metode** | **Deskripsi**                                          |
|----------------------------------|------------|--------------------------------------------------------|
| `/orders`                        | GET        | Mendapatkan daftar semua order.                       |
| `/order/{id}`                    | GET        | Mendapatkan detail order berdasarkan ID.              |
| `/order`                         | POST       | Membuat order baru.                                   |
| `/order/{id}/set-as-done`        | PATCH      | Menandai order sebagai selesai.                        |
| `/order/{id}/payment`            | PATCH      | Memproses pembayaran untuk order.                     |

# Panduan Menjalankan Proyek Laravel

Panduan ini menjelaskan langkah-langkah untuk menjalankan proyek Laravel yang telah di-clone dari GitHub, serta menyediakan dokumentasi API untuk mempermudah penggunaan API yang telah disediakan oleh aplikasi.

### Langkah 1: Clone Repository

Langkah pertama adalah meng-clone repository proyek dari GitHub ke mesin lokal Anda. Jalankan perintah berikut di terminal:

```bash
git clone https://github.com/pearlgw/api_backend_order_eat_laravel.git
```
### Langkah 2: Menyalin File .env

```bash
cd api_backend_order_eat_laravel
```

### Langkah 3: Instalasi Dependensi

```bash
composer install
```

### Langkah 4: Menghasilkan Key Aplikasi

```bash
php artisan key:generate
```

### Langkah 5: Membuat Link Storage

```bash
php artisan storage:link
```

### Langkah 6: Migrasi Database

```bash
php artisan migrate
```

### Langkah 7: Menjalankan Seeder

```bash
php artisan db:seed
```

### Langkah 8: Menjalankan Server

```bash
php artisan serve
```
