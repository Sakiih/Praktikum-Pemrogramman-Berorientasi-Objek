# Sistem Peminjaman Kendaraan

Proyek praktikum PHP OOP sederhana untuk simulasi peminjaman kendaraan. Data
disimpan di memori selama program berjalan; proyek ini tidak menggunakan
database.

## Struktur folder

- `src/Models/` berisi class domain: `Pelanggan`, `Kendaraan`, dan `Peminjaman`.
- `src/Contracts/` berisi interface repository dan kalkulator sewa.
- `src/Repositories/InMemory/` berisi repository yang menyimpan data di array,
  termasuk repository pelanggan alternatif untuk demonstrasi LSP.
- `src/Services/` berisi alur bisnis pembuatan dan pengembalian peminjaman.
- `src/Calculators/` berisi implementasi perhitungan sewa harian.
- `bin/main.php` adalah entry point simulasi utama.
- `tests/` berisi pengujian, termasuk pengujian substitusi repository.

## Interface dan ISP

Interface dipisahkan berdasarkan kebutuhan pemakainya:

- `PelangganRepositoryInterface` hanya menyediakan pencarian pelanggan.
- `KendaraanRepositoryInterface` hanya menyediakan pencarian kendaraan.
- `PeminjamanRepositoryInterface` menyediakan pembuatan ID, penyimpanan, dan
  pencarian peminjaman karena ketiganya digunakan oleh alur service peminjaman.
- `KalkulatorSewaInterface` hanya menyediakan perhitungan total hari dan total
  harga.

Operasi seperti `tambah()` pada repository pelanggan dan kendaraan sengaja
tidak dimasukkan ke interface karena hanya digunakan untuk menyiapkan data pada
implementasi konkret, bukan kebutuhan `PeminjamanService`. Dengan demikian,
pengguna interface tidak dipaksa bergantung pada method yang tidak dipakainya.

`PeminjamanService` menerima keempat dependency tersebut melalui tipe
interface, bukan class konkret. Pemeriksaan kontrak dan dependency ini tersedia
di `tests/test_isp.php`.

## Composer dan PSR-4

`composer.json` memetakan namespace `PeminjamanKendaraan\` ke folder `src/`.
Dengan PSR-4, Composer dapat menemukan file class berdasarkan namespace tanpa
`require_once` untuk setiap class.

Perbarui autoload setelah menambah atau memindahkan class:

```bash
composer dump-autoload
```

## Menjalankan proyek

Jalankan simulasi melalui entry point utama:

```bash
php bin/main.php
```

Perintah lama tetap tersedia melalui wrapper di root:

```bash
php main.php
```

Jalankan tes LSP dengan:

```bash
php tests/test_lsp.php
```

Jalankan tes ISP dengan:

```bash
php tests/test_isp.php
```
