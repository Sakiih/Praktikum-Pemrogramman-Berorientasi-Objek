<?php

namespace PeminjamanKendaraan\Contracts;

use PeminjamanKendaraan\Models\Kendaraan;

interface KendaraanRepositoryInterface
{
    public function cariBerdasarkanId(int $id): ?Kendaraan;
}
