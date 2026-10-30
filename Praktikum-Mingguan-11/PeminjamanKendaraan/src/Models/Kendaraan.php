<?php

namespace PeminjamanKendaraan\Models;

class Kendaraan
{
    private int $idKendaraan;
    private string $nomorKendaraan;
    private string $jenisKendaraan;
    private string $merek;
    private float $tarifSewa;

    public function __construct(
        int $idKendaraan,
        string $nomorKendaraan,
        string $jenisKendaraan,
        string $merek,
        float $tarifSewa
    ) {
        $this->idKendaraan = $idKendaraan;
        $this->nomorKendaraan = $nomorKendaraan;
        $this->jenisKendaraan = $jenisKendaraan;
        $this->merek = $merek;
        $this->tarifSewa = $tarifSewa;
    }

    public function getIdKendaraan(): int
    {
        return $this->idKendaraan;
    }

    public function getNomorKendaraan(): string
    {
        return $this->nomorKendaraan;
    }

    public function getTarifSewa(): float
    {
        return $this->tarifSewa;
    }

    public function getInfo(): string
    {
        return "ID Kendaraan: " . $this->idKendaraan
            . "\nNomor Kendaraan: " . $this->nomorKendaraan
            . "\nJenis Kendaraan: " . $this->jenisKendaraan
            . "\nMerek: " . $this->merek
            . "\nTarif Sewa per Hari: Rp"
            . number_format($this->tarifSewa, 0, ',', '.');
    }
}
