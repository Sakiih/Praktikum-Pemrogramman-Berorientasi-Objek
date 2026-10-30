<?php

namespace PeminjamanKendaraan\Calculators;

use DateTimeImmutable;
use InvalidArgumentException;
use PeminjamanKendaraan\Contracts\KalkulatorSewaInterface;

class KalkulatorSewaHarian implements KalkulatorSewaInterface
{
    public function hitungTotalHari(
        DateTimeImmutable $tanggalMulai,
        DateTimeImmutable $tanggalSelesai
    ): int {
        if ($tanggalSelesai < $tanggalMulai) {
            throw new InvalidArgumentException(
                "Tanggal selesai tidak boleh sebelum tanggal mulai."
            );
        }

        return $tanggalMulai->diff($tanggalSelesai)->days + 1;
    }

    public function hitungTotalHarga(int $totalHari, float $tarifSewa): float
    {
        if ($totalHari < 1) {
            throw new InvalidArgumentException(
                "Total hari harus lebih besar dari nol."
            );
        }

        if ($tarifSewa < 0) {
            throw new InvalidArgumentException(
                "Tarif sewa tidak boleh negatif."
            );
        }

        return $totalHari * $tarifSewa;
    }
}
