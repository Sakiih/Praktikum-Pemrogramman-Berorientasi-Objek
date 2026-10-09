<?php

class Product {

    // Property
    public $nama;
    public $harga;
    public $kategori;

    // Constructor
    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    // Method getInfo()
    public function getInfo() {
        return "Nama: $this->nama<br>" .
               "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "<br>" .
               "Kategori: $this->kategori<br>";
    }

    // Method applyDiskon()
    public function applyDiskon($persen) {
        $this->harga = $this->harga - ($this->harga * $persen / 100);
    }
}


// Membuat 2 objek Product
$produk1 = new Product("Laptop Asus", 12000000, "Elektronik");
$produk2 = new Product("Mouse Logitech", 300000, "Aksesoris");


// Menampilkan informasi sebelum diskon
echo "<b>Produk 1</b><br>";
echo $produk1->getInfo();


// Memberikan diskon 10%
$produk1->applyDiskon(10);

echo "Setelah diskon 10%:<br>";
echo $produk1->getInfo();

echo "<br>";


// Menampilkan informasi produk 2
echo "<b>Produk 2</b><br>";
echo $produk2->getInfo();


// Memberikan diskon 20%
$produk2->applyDiskon(20);

echo "Setelah diskon 20%:<br>";
echo $produk2->getInfo();

?>