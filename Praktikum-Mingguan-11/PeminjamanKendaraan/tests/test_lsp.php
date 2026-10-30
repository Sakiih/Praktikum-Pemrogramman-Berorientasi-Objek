<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PeminjamanKendaraan\Contracts\PelangganRepositoryInterface;
use PeminjamanKendaraan\Models\Pelanggan;
use PeminjamanKendaraan\Calculators\KalkulatorSewaHarian;
use PeminjamanKendaraan\Repositories\InMemory\KendaraanRepository;
use PeminjamanKendaraan\Repositories\InMemory\PelangganRepository;
use PeminjamanKendaraan\Repositories\InMemory\PelangganRepositoryAlternatif;
use PeminjamanKendaraan\Repositories\InMemory\PeminjamanRepository;
use PeminjamanKendaraan\Services\PeminjamanService;

function pastikan(bool $kondisi, string $pesan): void
{
    if (!$kondisi) {
        throw new RuntimeException("Assertion gagal: {$pesan}");
    }
}

function pastikanMengandung(string $teks, string $bagian, string $pesan): void
{
    pastikan(str_contains($teks, $bagian), $pesan);
}

function jalankanSkenario(PelangganRepositoryInterface $pelangganRepository): array
{
    $kendaraanRepository = new KendaraanRepository();
    $kendaraanRepository->tambah(
        "KB 1234 AB",
        "Mobil",
        "Toyota Avanza",
        150000
    );

    $peminjamanRepository = new PeminjamanRepository();
    $service = new PeminjamanService(
        $pelangganRepository,
        $kendaraanRepository,
        $peminjamanRepository,
        new KalkulatorSewaHarian()
    );

    $peminjamanPertama = $service->buatPeminjaman(
        1,
        1,
        new DateTimeImmutable("2026-10-29"),
        new DateTimeImmutable("2026-10-31")
    );

    $peminjamanKedua = $service->buatPeminjaman(
        1,
        1,
        new DateTimeImmutable("2026-11-01"),
        new DateTimeImmutable("2026-11-02")
    );

    $service->prosesPengembalian($peminjamanPertama->getIdPeminjaman());

    return [
        $peminjamanPertama->getInfo(),
        $peminjamanKedua->getInfo(),
    ];
}

function pastikanPelangganTidakDitemukan(
    PelangganRepositoryInterface $pelangganRepository
): void {
    $kendaraanRepository = new KendaraanRepository();
    $kendaraanRepository->tambah(
        "KB 1234 AB",
        "Mobil",
        "Toyota Avanza",
        150000
    );

    $service = new PeminjamanService(
        $pelangganRepository,
        $kendaraanRepository,
        new PeminjamanRepository(),
        new KalkulatorSewaHarian()
    );

    try {
        $service->buatPeminjaman(
            99,
            1,
            new DateTimeImmutable("2026-10-29"),
            new DateTimeImmutable("2026-10-31")
        );
    } catch (RuntimeException $exception) {
        pastikanMengandung(
            $exception->getMessage(),
            "Pelanggan dengan ID 99 tidak ditemukan.",
            "Pesan pelanggan tidak ditemukan tidak sesuai."
        );
        return;
    }

    throw new RuntimeException(
        "Pelanggan yang tidak tersedia seharusnya ditolak."
    );
}

$pelangganBiasa = new PelangganRepository();
$pelangganBiasa->tambah("Andi", "081234567890", "Pontianak");

$pelangganAlternatif = new PelangganRepositoryAlternatif([
    new Pelanggan(1, "Andi", "081234567890", "Pontianak"),
]);

pastikan(
    $pelangganBiasa instanceof PelangganRepositoryInterface,
    "Repository pelanggan biasa tidak memenuhi interface."
);
pastikan(
    $pelangganAlternatif instanceof PelangganRepositoryInterface,
    "Repository pelanggan alternatif tidak memenuhi interface."
);
pastikan(
    $pelangganBiasa->cariBerdasarkanId(99) === null,
    "Repository biasa tidak mengembalikan null untuk ID yang tidak ada."
);
pastikan(
    $pelangganAlternatif->cariBerdasarkanId(99) === null,
    "Repository alternatif tidak mengembalikan null untuk ID yang tidak ada."
);

$hasilBiasa = jalankanSkenario($pelangganBiasa);
$hasilAlternatif = jalankanSkenario($pelangganAlternatif);

foreach ([$hasilBiasa, $hasilAlternatif] as $hasil) {
    pastikanMengandung($hasil[0], "Total Hari: 3", "Transaksi pertama tidak 3 hari.");
    pastikanMengandung($hasil[0], "Total Harga: Rp450.000", "Total transaksi pertama salah.");
    pastikanMengandung($hasil[0], "Status: Selesai", "Pengembalian tidak mengubah status.");
    pastikanMengandung($hasil[1], "Total Hari: 2", "Transaksi kedua tidak 2 hari.");
    pastikanMengandung($hasil[1], "Total Harga: Rp300.000", "Total transaksi kedua salah.");
    pastikanMengandung($hasil[1], "Status: Berlangsung", "Status transaksi kedua berubah tanpa pengembalian.");
}

pastikanPelangganTidakDitemukan(new PelangganRepository());
pastikanPelangganTidakDitemukan(new PelangganRepositoryAlternatif([]));

echo "Pengujian LSP berhasil: repository biasa dan alternatif dapat disubstitusikan.\n";
