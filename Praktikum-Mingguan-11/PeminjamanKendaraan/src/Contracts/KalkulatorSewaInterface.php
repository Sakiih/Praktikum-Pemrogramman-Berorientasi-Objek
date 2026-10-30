<?php

namespace PeminjamanKendaraan\Contracts;

use DateTimeImmutable;

interface KalkulatorSewaInterface
{
    public function hitungTotalHari(
        DateTimeImmutable $tanggalMulai,
        DateTimeImmutable $tanggalSelesai
    ): int;

    public function hitungTotalHarga(int $totalHari, float $tarifSewa): float;
}
