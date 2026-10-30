<?php

namespace PeminjamanKendaraan\Repositories\InMemory;

use PeminjamanKendaraan\Contracts\KendaraanRepositoryInterface;
use PeminjamanKendaraan\Models\Kendaraan;

class KendaraanRepository implements KendaraanRepositoryInterface
{
    private array $daftarKendaraan = [];
    private int $idBerikutnya = 1;

    public function tambah(
        string $nomorKendaraan,
        string $jenisKendaraan,
        string $merek,
        float $tarifSewa
    ): Kendaraan {
        $kendaraan = new Kendaraan(
            $this->idBerikutnya,
            $nomorKendaraan,
            $jenisKendaraan,
            $merek,
            $tarifSewa
        );

        $this->daftarKendaraan[$this->idBerikutnya] = $kendaraan;

        $this->idBerikutnya++;

        return $kendaraan;
    }

    public function cariBerdasarkanId(int $id): ?Kendaraan
    {
        return $this->daftarKendaraan[$id] ?? null;
    }
}
