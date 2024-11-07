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
