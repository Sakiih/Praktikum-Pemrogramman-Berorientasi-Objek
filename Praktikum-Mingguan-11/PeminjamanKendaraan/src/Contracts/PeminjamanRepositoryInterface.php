<?php

namespace PeminjamanKendaraan\Contracts;

use PeminjamanKendaraan\Models\Peminjaman;

interface PeminjamanRepositoryInterface
{
    public function buatIdBaru(): int;

    public function simpan(Peminjaman $peminjaman): void;

    public function cariBerdasarkanId(int $id): ?Peminjaman;
}
