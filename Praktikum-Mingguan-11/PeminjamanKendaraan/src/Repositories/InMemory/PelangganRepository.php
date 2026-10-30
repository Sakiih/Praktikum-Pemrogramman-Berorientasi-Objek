<?php

namespace PeminjamanKendaraan\Repositories\InMemory;

use PeminjamanKendaraan\Contracts\PelangganRepositoryInterface;
use PeminjamanKendaraan\Models\Pelanggan;

class PelangganRepository implements PelangganRepositoryInterface
{
    private array $daftarPelanggan = [];
    private int $idBerikutnya = 1;

    public function tambah(
        string $nama,
        string $nomorTelepon,
        string $alamat
    ): Pelanggan {
        $pelanggan = new Pelanggan(
            $this->idBerikutnya,
            $nama,
            $nomorTelepon,
            $alamat
        );

        $this->daftarPelanggan[$this->idBerikutnya] = $pelanggan;

        $this->idBerikutnya++;

        return $pelanggan;
    }

    public function cariBerdasarkanId(int $id): ?Pelanggan
    {
        return $this->daftarPelanggan[$id] ?? null;
    }
}
