<?php

// File: ProductValidated.php
class Product
{
    private $nama;
    private $harga;
    private $kategori;
    private $diskon;

    public function __construct($nama, $harga, $kategori)
    {
        $this->nama = $nama;
        $this->setHarga($harga);
        $this->kategori = $kategori;
        $this->diskon = 0;
    }

    // Setter Harga dengan validasi ketat
    public function setHarga($harga)
    {
        if (!is_numeric($harga)) {
            throw new Exception("Harga harus berupa angka!");
        }

        if ($harga < 0) {
            throw new Exception("Harga tidak boleh negatif!");
        }

        if ($harga > 100000000) {
            throw new Exception("Harga maksimal Rp 100.000.000!");
        }

        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getKategori()
    {
        return $this->kategori;
    }

    // Setter Diskon dengan validasi
    public function setDiskon($diskon)
    {
        if ($diskon < 0 || $diskon > 100) {
            throw new Exception("Diskon harus antara 0-100%!");
        }

        $this->diskon = $diskon;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }

    public function getHargaSetelahDiskon()
    {
        return $this->harga * (1 - $this->diskon / 100);
    }

    public function getInfo()
    {
        return "Produk: $this->nama<br>" .
            "Kategori: $this->kategori<br>" .
            "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>" .
            "Diskon: $this->diskon%<br>" .
            "Harga Setelah Diskon: Rp " .
            number_format($this->getHargaSetelahDiskon(), 0, ',', '.');
    }
}

// Penggunaan
try {
    $product = new Product(
        "Laptop Gaming",
        25000000,
        "Elektronik"
    );

    echo $product->getInfo() . "<br><br>";

    $product->setDiskon(15);

    echo $product->getInfo() . "<br>";

    // Test validasi - akan error
    // $product->setHarga(-1000);
    // $product->setDiskon(150);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

?>