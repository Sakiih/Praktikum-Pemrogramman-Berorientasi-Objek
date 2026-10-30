<?php

namespace PeminjamanKendaraan\Models;

use DateTimeImmutable;
use InvalidArgumentException;
use RuntimeException;

class Peminjaman
{
    private int $idPeminjaman;
    private int $idPelanggan;
    private int $idKendaraan;
    private DateTimeImmutable $tanggalMulai;
    private DateTimeImmutable $tanggalSelesai;
    private int $totalHari;
    private float $totalHarga;
    private string $statusPeminjaman;

    public function __construct(
        int $idPeminjaman,
        Pelanggan $pelanggan,
        Kendaraan $kendaraan,
        DateTimeImmutable $tanggalMulai,
        DateTimeImmutable $tanggalSelesai,
        int $totalHari,
        float $totalHarga
    ) {
        if ($tanggalSelesai < $tanggalMulai) {
            throw new InvalidArgumentException(
                "Tanggal selesai tidak boleh sebelum tanggal mulai."
            );
        }

        $this->idPeminjaman = $idPeminjaman;

        $this->idPelanggan = $pelanggan->getIdPelanggan();
        $this->idKendaraan = $kendaraan->getIdKendaraan();

        $this->tanggalMulai = $tanggalMulai;
        $this->tanggalSelesai = $tanggalSelesai;

        if ($totalHari < 1) {
            throw new InvalidArgumentException(
                "Total hari harus lebih besar dari nol."
            );
        }

        if ($totalHarga < 0) {
            throw new InvalidArgumentException(
                "Total harga tidak boleh negatif."
            );
        }

        $this->totalHari = $totalHari;
        $this->totalHarga = $totalHarga;

        // Status awal sebelum peminjaman diaktifkan
        $this->statusPeminjaman = "Belum Dibuat";
    }

    public function buatPeminjaman(): void
    {
        if ($this->statusPeminjaman !== "Belum Dibuat") {
            throw new RuntimeException(
                "Peminjaman sudah pernah dibuat."
            );
        }

        $this->statusPeminjaman = "Berlangsung";
    }

    public function kembalikanKendaraan(): void
    {
        if ($this->statusPeminjaman !== "Berlangsung") {
            throw new RuntimeException(
                "Kendaraan tidak sedang dalam status peminjaman."
            );
        }

        $this->perbaruiStatus("Selesai");
    }

    public function perbaruiStatus(string $status): void
    {
        $statusDiizinkan = ["Berlangsung", "Selesai"];

        if (!in_array($status, $statusDiizinkan, true)) {
            throw new InvalidArgumentException(
                "Status peminjaman tidak valid."
            );
        }

        $this->statusPeminjaman = $status;
    }

    // Mengambil ID peminjaman
    public function getIdPeminjaman(): int
    {
        return $this->idPeminjaman;
    }

    public function getInfo(): string
    {
        return "ID Peminjaman: " . $this->idPeminjaman
            . "\nID Pelanggan: " . $this->idPelanggan
            . "\nID Kendaraan: " . $this->idKendaraan
            . "\nTanggal Mulai: "
            . $this->tanggalMulai->format("d-m-Y")
            . "\nTanggal Selesai: "
            . $this->tanggalSelesai->format("d-m-Y")
            . "\nTotal Hari: " . $this->totalHari
            . "\nTotal Harga: Rp"
            . number_format($this->totalHarga, 0, ",", ".")
            . "\nStatus: " . $this->statusPeminjaman;
    }
}
