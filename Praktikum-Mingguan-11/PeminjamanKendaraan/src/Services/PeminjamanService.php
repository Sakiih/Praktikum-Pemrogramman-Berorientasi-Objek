<?php

namespace PeminjamanKendaraan\Services;

use DateTimeImmutable;
use PeminjamanKendaraan\Contracts\KalkulatorSewaInterface;
use PeminjamanKendaraan\Contracts\KendaraanRepositoryInterface;
use PeminjamanKendaraan\Contracts\PelangganRepositoryInterface;
use PeminjamanKendaraan\Contracts\PeminjamanRepositoryInterface;
use PeminjamanKendaraan\Models\Peminjaman;
use RuntimeException;

class PeminjamanService
{
    public function __construct(
        private PelangganRepositoryInterface $pelangganRepository,
        private KendaraanRepositoryInterface $kendaraanRepository,
        private PeminjamanRepositoryInterface $peminjamanRepository,
        private KalkulatorSewaInterface $kalkulatorSewa
    ) {
    }

    public function buatPeminjaman(
        int $idPelanggan,
        int $idKendaraan,
        DateTimeImmutable $tanggalMulai,
        DateTimeImmutable $tanggalSelesai
    ): Peminjaman {
        $pelanggan = $this->pelangganRepository->cariBerdasarkanId($idPelanggan);
        if ($pelanggan === null) {
            throw new RuntimeException("Pelanggan dengan ID {$idPelanggan} tidak ditemukan.");
        }

        $kendaraan = $this->kendaraanRepository->cariBerdasarkanId($idKendaraan);
        if ($kendaraan === null) {
            throw new RuntimeException("Kendaraan dengan ID {$idKendaraan} tidak ditemukan.");
        }

        $totalHari = $this->kalkulatorSewa->hitungTotalHari(
            $tanggalMulai,
            $tanggalSelesai
        );
        $totalHarga = $this->kalkulatorSewa->hitungTotalHarga(
            $totalHari,
            $kendaraan->getTarifSewa()
        );

        $idPeminjaman = $this->peminjamanRepository->buatIdBaru();
        $peminjaman = new Peminjaman(
            $idPeminjaman,
            $pelanggan,
            $kendaraan,
            $tanggalMulai,
            $tanggalSelesai,
            $totalHari,
            $totalHarga
        );

        $peminjaman->buatPeminjaman();
        $this->peminjamanRepository->simpan($peminjaman);

        return $peminjaman;
    }

    public function prosesPengembalian(int $idPeminjaman): Peminjaman
    {
        $peminjaman = $this->peminjamanRepository->cariBerdasarkanId($idPeminjaman);
        if ($peminjaman === null) {
            throw new RuntimeException("Peminjaman dengan ID {$idPeminjaman} tidak ditemukan.");
        }

        $peminjaman->kembalikanKendaraan();

        return $peminjaman;
    }
}
