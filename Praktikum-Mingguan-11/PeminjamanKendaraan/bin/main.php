<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PeminjamanKendaraan\Calculators\KalkulatorSewaHarian;
use PeminjamanKendaraan\Repositories\InMemory\KendaraanRepository;
use PeminjamanKendaraan\Repositories\InMemory\PelangganRepository;
use PeminjamanKendaraan\Repositories\InMemory\PeminjamanRepository;
use PeminjamanKendaraan\Services\PeminjamanService;

function tampilkanKartuTransaksi(string $judul, string $info): string
{
    $baris = explode("\n", $info);
    $html = '<section class="kartu-transaksi">';
    $html .= '<h2>' . htmlspecialchars($judul, ENT_QUOTES, 'UTF-8') . '</h2>';
    $html .= '<div class="detail-transaksi">';

    foreach ($baris as $dataBaris) {
        [$label, $nilai] = array_pad(explode(': ', $dataBaris, 2), 2, '');
        $nilaiAman = htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
        $kelasStatus = $label === 'Status'
            ? ($nilai === 'Selesai' ? ' status-selesai' : ' status-berlangsung')
            : '';

        $html .= '<div class="baris-detail">';
        $html .= '<span class="label-detail">'
            . htmlspecialchars($label, ENT_QUOTES, 'UTF-8')
            . '</span>';
        $html .= '<span class="nilai-detail' . $kelasStatus . '">'
            . $nilaiAman
            . '</span>';
        $html .= '</div>';
    }

    $html .= '</div></section>';

    return $html;
}

// Membuat repository
$pelangganRepository = new PelangganRepository();
$kendaraanRepository = new KendaraanRepository();
$peminjamanRepository = new PeminjamanRepository();
$kalkulatorSewa = new KalkulatorSewaHarian();
$peminjamanService = new PeminjamanService(
    $pelangganRepository,
    $kendaraanRepository,
    $peminjamanRepository,
    $kalkulatorSewa
);

// Menambahkan pelanggan
$pelangganRepository->tambah(
    "Andi",
    "081234567890",
    "Pontianak"
);

// Menambahkan kendaraan
$kendaraanRepository->tambah(
    "KB 1234 AB",
    "Mobil",
    "Toyota Avanza",
    150000
);

// Membuat peminjaman dengan ID otomatis
$peminjaman1 = $peminjamanService->buatPeminjaman(
    1,
    1,
    new DateTimeImmutable("2026-10-29"),
    new DateTimeImmutable("2026-10-31")
);

$infoTransaksiPertama = $peminjaman1->getInfo();

// Membuat transaksi kedua untuk menguji ID otomatis
$peminjaman2 = $peminjamanService->buatPeminjaman(
    1,
    1,
    new DateTimeImmutable("2026-11-01"),
    new DateTimeImmutable("2026-11-02")
);

$infoTransaksiKedua = $peminjaman2->getInfo();

// Mengembalikan kendaraan pada transaksi pertama
$peminjamanService->prosesPengembalian(
    $peminjaman1->getIdPeminjaman()
);

$infoSetelahPengembalian = $peminjaman1->getInfo();

if (PHP_SAPI === 'cli') {
    echo "=== TRANSAKSI PERTAMA ===\n";
    echo $infoTransaksiPertama;
    echo "\n\n";

    echo "=== TRANSAKSI KEDUA ===\n";
    echo $infoTransaksiKedua;
    echo "\n\n";

    echo "=== SETELAH PENGEMBALIAN TRANSAKSI PERTAMA ===\n";
    echo $infoSetelahPengembalian;
    echo "\n";
    return;
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Peminjaman Kendaraan</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px;
            background: #f1f3f5;
            color: #25313c;
            font-family: Arial, sans-serif;
        }

        .halaman {
            width: min(100%, 760px);
            margin: 0 auto;
        }

        h1 {
            margin: 0 0 24px;
            text-align: center;
            color: #1f3b53;
        }

        .kartu-transaksi {
            margin-bottom: 20px;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        h2 {
            margin: 0 0 16px;
            font-size: 20px;
            color: #2d5d7b;
        }

        .baris-detail {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 10px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .baris-detail:last-child {
            border-bottom: 0;
        }

        .label-detail {
            color: #687580;
        }

        .nilai-detail {
            font-weight: bold;
            text-align: right;
        }

        .status-berlangsung,
        .status-selesai {
            padding: 4px 10px;
            border-radius: 999px;
        }

        .status-berlangsung {
            background: #fff3cd;
            color: #856404;
        }

        .status-selesai {
            background: #d1e7dd;
            color: #0f5132;
        }

        @media (max-width: 520px) {
            body {
                padding: 14px;
            }

            .baris-detail {
                align-items: flex-start;
                flex-direction: column;
                gap: 4px;
            }

            .nilai-detail {
                text-align: left;
            }
        }
    </style>
</head>
<body>
    <main class="halaman">
        <h1>Sistem Peminjaman Kendaraan</h1>
        <?= tampilkanKartuTransaksi('Transaksi Pertama', $infoTransaksiPertama) ?>
        <?= tampilkanKartuTransaksi('Transaksi Kedua', $infoTransaksiKedua) ?>
        <?= tampilkanKartuTransaksi('Setelah Pengembalian', $infoSetelahPengembalian) ?>
    </main>
</body>
</html>
