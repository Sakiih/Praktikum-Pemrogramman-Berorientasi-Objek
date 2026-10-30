<?php

namespace PeminjamanKendaraan\Repositories\InMemory;

use DateTimeImmutable;
use PeminjamanKendaraan\Contracts\PeminjamanRepositoryInterface;
use PeminjamanKendaraan\Models\Kendaraan;
use PeminjamanKendaraan\Models\Pelanggan;
use PeminjamanKendaraan\Models\Peminjaman;

class PeminjamanRepository implements PeminjamanRepositoryInterface
{
    private array $daftarPeminjaman = [];
    private int $idBerikutnya = 1;

    public function buatIdBaru(): int
    {
        return $this->idBerikutnya++;
    }

    public function simpan(Peminjaman $peminjaman): void
    {
        $this->daftarPeminjaman[$peminjaman->getIdPeminjaman()] = $peminjaman;
    }

    public function tambah(
        Pelanggan $pelanggan,
        Kendaraan $kendaraan,
        DateTimeImmutable $tanggalMulai,
        DateTimeImmutable $tanggalSelesai,
        int $totalHari,
        float $totalHarga
    ): Peminjaman {

        $peminjaman = new Peminjaman(
            $this->buatIdBaru(),
            $pelanggan,
            $kendaraan,
            $tanggalMulai,
            $tanggalSelesai,
            $totalHari,
            $totalHarga
        );

        $peminjaman->buatPeminjaman();

        $this->simpan($peminjaman);

        return $peminjaman;
    }

    public function cariBerdasarkanId(int $id): ?Peminjaman
    {
        return $this->daftarPeminjaman[$id] ?? null;
    }

    public function semua(): array
    {
        return $this->daftarPeminjaman;
    }
}
