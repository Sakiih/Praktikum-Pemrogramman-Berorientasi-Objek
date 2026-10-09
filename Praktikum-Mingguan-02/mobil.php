<?php

class Mobil {

    // Property
    public $merek;
    public $warna;
    public $kecepatan;

    // Constructor
    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    // Method getInfo()
    public function getInfo() {
        return "Merek: $this->merek, Warna: $this->warna, Kecepatan: $this->kecepatan km/jam";
    }

    // Method jalankan()
    public function jalankan() {
        return "Mobil berjalan...";
    }

    // Method berhenti()
    public function berhenti() {
        return "Mobil berhenti";
    }
}


// Membuat 3 objek berbeda
$mobil1 = new Mobil("Mazda Rx 7", "Merah", 320);
$mobil2 = new Mobil("Mustang", "Hitam", 300);
$mobil3 = new Mobil("Chevrolet Corvette", "Silver", 250);


// Menampilkan informasi mobil
echo $mobil1->getInfo() . "<br>";
echo $mobil1->jalankan() . "<br>";
echo $mobil1->berhenti() . "<br><br>";

echo $mobil2->getInfo() . "<br>";
echo $mobil2->jalankan() . "<br>";
echo $mobil2->berhenti() . "<br><br>";

echo $mobil3->getInfo() . "<br>";
echo $mobil3->jalankan() . "<br>";
echo $mobil3->berhenti();

?>