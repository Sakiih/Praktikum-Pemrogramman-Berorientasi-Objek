<?php

namespace PeminjamanKendaraan\Contracts;

use PeminjamanKendaraan\Models\Pelanggan;

interface PelangganRepositoryInterface
{
    public function cariBerdasarkanId(int $id): ?Pelanggan;
}
