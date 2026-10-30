<?php

namespace PeminjamanKendaraan\Repositories\InMemory;

use InvalidArgumentException;
use PeminjamanKendaraan\Contracts\PelangganRepositoryInterface;
use PeminjamanKendaraan\Models\Pelanggan;

class PelangganRepositoryAlternatif implements PelangganRepositoryInterface
{
    private array $daftarPelanggan = [];

    public function __construct(array $daftarPelanggan)
    {
        foreach ($daftarPelanggan as $pelanggan) {
            if (!$pelanggan instanceof Pelanggan) {
                throw new InvalidArgumentException(
                    "Data repository harus berupa objek Pelanggan."
                );
            }

            $this->daftarPelanggan[$pelanggan->getIdPelanggan()] = $pelanggan;
        }
    }

    public function cariBerdasarkanId(int $id): ?Pelanggan
    {
        return $this->daftarPelanggan[$id] ?? null;
    }
}
