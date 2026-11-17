# 💻 Praktikum Pemrograman Berorientasi Objek

Repository ini berisi dokumentasi, kumpulan kode program, latihan, dan tugas praktikum mata kuliah **Pemrograman Berorientasi Objek (PBO)**.

Repository dikembangkan sebagai arsip pembelajaran selama perkuliahan, mulai dari penerapan konsep dasar pemrograman PHP, Object-Oriented Programming (OOP), penggunaan Composer, hingga implementasi REST API menggunakan Laravel.

Setiap praktikum disimpan berdasarkan folder mingguan agar hasil pengerjaan lebih terstruktur, mudah ditelusuri, dan dapat dikembangkan secara bertahap.

---

## 📖 Tentang Repository

Repository ini digunakan untuk mendokumentasikan seluruh aktivitas praktikum Pemrograman Berorientasi Objek.

Materi dan implementasi yang dikerjakan mencakup pemahaman konsep pemrograman, penerapan kode program, pengelolaan dependensi, interaksi dengan database, serta pembangunan aplikasi berbasis backend.

Penggunaan Git dan GitHub juga diterapkan sebagai bagian dari proses pembelajaran untuk mengelola perubahan kode, menyimpan riwayat pengerjaan, dan mendokumentasikan perkembangan setiap praktikum.

## 🎯 Tujuan Pembelajaran

- Memahami konsep dasar pemrograman berorientasi objek.
- Menerapkan konsep class, object, property, method, inheritance, encapsulation, dan konsep OOP lainnya.
- Mengembangkan program PHP dengan struktur kode yang terorganisasi.
- Memahami namespace, autoloading, dan dependency management menggunakan Composer.
- Mengimplementasikan operasi CRUD menggunakan database.
- Memahami konsep REST API dan komunikasi data menggunakan JSON.
- Mengembangkan REST API menggunakan framework Laravel.
- Membiasakan penggunaan Git dan GitHub dalam pengelolaan proyek pemrograman.

## 📂 Struktur Repository

Berikut struktur direktori utama repository:

```text
Praktikum-Pemrogramman-Berorientasi-Objek/
│
├── Praktikum-Mingguan-01/
├── Praktikum-Mingguan-02/
├── Praktikum-Mingguan-04/
├── Praktikum-Mingguan-05/
├── Praktikum-Mingguan-06/
│
├── Praktikum-Mingguan-08/
│   └── php-namespace/
│       ├── src/
│       │   ├── Models/
│       │   └── Services/
│       ├── composer.json
│       └── index.php
│
├── Praktikum-Mingguan-10/
├── Praktikum-Mingguan-11/
├── Praktikum-Mingguan-12/
│
├── Praktikum-Mingguan-15/
│   └── rest-api/
│       ├── app/
│       ├── bootstrap/
│       ├── config/
│       ├── database/
│       ├── public/
│       ├── resources/
│       ├── routes/
│       ├── storage/
│       ├── tests/
│       ├── artisan
│       ├── composer.json
│       └── package.json
│
├── UTS_20_H1101251041/
│
├── LICENSE
└── README.md
```

Struktur di atas merupakan gambaran direktori utama dan beberapa komponen proyek. Setiap folder praktikum dapat memiliki struktur internal yang berbeda sesuai kebutuhan materi dan tugas.

## 📚 Praktikum yang Tersedia

Repository ini menyimpan berbagai hasil pengerjaan praktikum berdasarkan minggu perkuliahan.

| Direktori | Keterangan |
|---|---|
| `Praktikum-Mingguan-01` | Dokumentasi dan pengerjaan praktikum minggu 01. |
| `Praktikum-Mingguan-02` | Dokumentasi dan pengerjaan praktikum minggu 02. |
| `Praktikum-Mingguan-04` | Dokumentasi dan pengerjaan praktikum minggu 04. |
| `Praktikum-Mingguan-05` | Dokumentasi dan pengerjaan praktikum minggu 05. |
| `Praktikum-Mingguan-06` | Dokumentasi dan pengerjaan praktikum minggu 06. |
| `Praktikum-Mingguan-08` | Implementasi PHP Namespace dan Composer. |
| `Praktikum-Mingguan-10` | Dokumentasi dan pengerjaan praktikum minggu 10. |
| `Praktikum-Mingguan-11` | Dokumentasi dan pengerjaan praktikum minggu 11. |
| `Praktikum-Mingguan-12` | Dokumentasi dan pengerjaan praktikum minggu 12. |
| `Praktikum-Mingguan-15` | Implementasi REST API menggunakan Laravel. |
| `UTS_20_H1101251041` | Dokumentasi dan berkas pengerjaan Ujian Tengah Semester. |

### Implementasi REST API — Minggu 15

Pada praktikum minggu 15, dilakukan pembangunan REST API menggunakan Laravel dengan studi kasus pengelolaan data produk.

Implementasi ini menerapkan konsep CRUD (*Create, Read, Update, Delete*) untuk mengelola data produk melalui HTTP Request dan HTTP Response dalam format JSON.

**Fitur yang diimplementasikan:**

- Menampilkan seluruh data produk.
- Menambahkan data produk baru.
- Menampilkan detail produk berdasarkan ID.
- Memperbarui data produk.
- Menghapus data produk.

**Teknologi yang digunakan:**

- Laravel sebagai framework backend.
- PHP sebagai bahasa pemrograman.
- MySQL sebagai sistem manajemen basis data.
- Eloquent ORM untuk interaksi dengan database.
- EchoAPI sebagai alat pengujian endpoint REST API.

**Struktur komponen utama:**

| Komponen | Fungsi |
|---|---|
| `app/Models/Product.php` | Mendefinisikan model Product dan atribut yang dapat diisi. |
| `app/Http/Controllers/ProductController.php` | Mengelola proses CRUD produk. |
| `database/migrations/` | Mendefinisikan struktur tabel database. |
| `routes/api.php` | Mendefinisikan endpoint REST API. |

**Daftar Endpoint API:**

Base URL pengembangan:

```text
http://127.0.0.1:8000
```

| HTTP Method | Endpoint | Fungsi |
|---|---|---|
| GET | `/api/products` | Mengambil seluruh data produk. |
| POST | `/api/products` | Menambahkan produk baru. |
| GET | `/api/products/{id}` | Mengambil detail produk berdasarkan ID. |
| PUT | `/api/products/{id}` | Memperbarui data produk. |
| DELETE | `/api/products/{id}` | Menghapus produk berdasarkan ID. |

**Contoh JSON untuk menambahkan produk:**

```json
{
    "name": "Laptop ASUS",
    "price": 5000000,
    "description": "Laptop untuk kebutuhan kuliah"
}
```

Pengujian endpoint dilakukan menggunakan EchoAPI dengan memeriksa HTTP status code dan response JSON yang dihasilkan oleh server.

## 🛠️ Teknologi dan Tools

Berikut teknologi dan perangkat yang digunakan dalam pengerjaan berbagai praktikum:

| Teknologi / Tools | Kegunaan |
|---|---|
| PHP | Bahasa pemrograman backend. |
| Composer | Mengelola dependensi dan autoload PHP. |
| Laravel | Framework untuk membangun aplikasi backend dan REST API. |
| MySQL | Sistem manajemen basis data relasional. |
| Laragon | Lingkungan pengembangan web lokal. |
| HeidiSQL | Mengelola dan memeriksa database MySQL. |
| EchoAPI | Menguji HTTP Request dan REST API. |
| Git | Melacak perubahan kode dan mengelola versi proyek. |
| GitHub | Menyimpan repository secara online. |
| Visual Studio Code | Editor kode untuk mengembangkan proyek. |

## 🚀 Cara Mengakses Repository

### 1. Clone Repository

Jalankan perintah berikut pada terminal:

```bash
git clone https://github.com/Sakiih/Praktikum-Pemrogramman-Berorientasi-Objek.git
```

### 2. Masuk ke Direktori Repository

```bash
cd Praktikum-Pemrogramman-Berorientasi-Objek
```

Setelah itu, pilih folder praktikum yang ingin dipelajari.

### 3. Menjalankan Praktikum PHP Namespace

Masuk ke direktori proyek:

```bash
cd Praktikum-Mingguan-08/php-namespace
```

Instal dependensi Composer:

```bash
composer install
```

Jalankan program:

```bash
php index.php
```

### 4. Menjalankan REST API Laravel

Masuk ke direktori proyek Laravel:

```bash
cd Praktikum-Mingguan-15/rest-api
```

Instal dependensi:

```bash
composer install
```

Salin konfigurasi environment:

```powershell
Copy-Item .env.example .env
```

Buat database baru melalui MySQL dengan nama `rest_api`, kemudian sesuaikan konfigurasi `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rest_api
DB_USERNAME=root
DB_PASSWORD=
```

Generate application key:

```bash
php artisan key:generate
```

Jalankan database migration:

```bash
php artisan migrate
```

Jalankan server Laravel:

```bash
php artisan serve
```

Server pengembangan dapat diakses melalui:

```text
http://127.0.0.1:8000
```

Untuk menguji REST API, gunakan EchoAPI atau aplikasi pengujian HTTP lainnya dengan endpoint yang telah dijelaskan pada bagian Implementasi REST API.

**Catatan:** Pastikan PHP, Composer, dan MySQL sudah terpasang serta berjalan. Sesuaikan konfigurasi database dengan lingkungan lokal masing-masing.

## 🌱 Progress Pembelajaran

Repository ini merupakan dokumentasi perkembangan pembelajaran dalam mata kuliah Pemrograman Berorientasi Objek.

Setiap praktikum menjadi kesempatan untuk mempelajari konsep baru, menerapkan teori ke dalam kode program, memahami kesalahan selama proses pengembangan, dan meningkatkan kemampuan pemrograman secara bertahap.

Seiring bertambahnya materi dan tugas perkuliahan, repository ini akan terus diperbarui agar seluruh hasil pembelajaran tersimpan secara terstruktur.

## 👨‍💻 Author

**Rasya Akmal Sakhi**

Mahasiswa Sistem Informasi — Universitas Tanjungpura

- GitHub: [@Sakiih](https://github.com/Sakiih)
- Repository: [Praktikum Pemrogramman Berorientasi Objek](https://github.com/Sakiih/Praktikum-Pemrogramman-Berorientasi-Objek)

## 📄 License

Repository ini menggunakan lisensi MIT. Silakan lihat berkas [LICENSE](./LICENSE) untuk informasi lebih lanjut.

---

"Learn by doing, improve by practicing, and grow by building."

⭐ Terima kasih telah mengunjungi repository praktikum ini!
