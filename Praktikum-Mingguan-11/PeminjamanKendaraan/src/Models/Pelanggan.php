<?php

namespace PeminjamanKendaraan\Models;

class Pelanggan
{
    private int $idPelanggan;
    private string $nama;
    private string $nomorTelepon;
    private string $alamat;

    public function __construct(
        int $idPelanggan,
        string $nama,
        string $nomorTelepon,
        string $alamat
    ) {
        $this->idPelanggan = $idPelanggan;
        $this->nama = $nama;
        $this->nomorTelepon = $nomorTelepon;
        $this->alamat = $alamat;
    }

    public function getIdPelanggan(): int
    {
        return $this->idPelanggan;
    }

    public function getNama(): string
    {
        return $this->nama;
    }

    public function getInfo(): string
    {
        return "ID Pelanggan: " . $this->idPelanggan
            . "\nNama: " . $this->nama
            . "\nNomor Telepon: " . $this->nomorTelepon
            . "\nAlamat: " . $this->alamat;
    }
}
