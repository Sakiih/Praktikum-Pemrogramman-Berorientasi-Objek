<?php

class Mobil {

    // Property
    private $merek;
    private $warna;
    private $kecepatan;

    // Constructor
    public function __construct($merek, $warna, $kecepatan) {
        $this->merek = $merek;
        $this->warna = $warna;
        $this->kecepatan = $kecepatan;
    }

    // ===== Method Getter (untuk mengambil nilai property) =====

    public function getMerek() {
        return $this->merek;
    }

    public function getWarna() {
        return $this->warna;
    }

    public function getKecepatan() {
        return $this->kecepatan;
    }

    // ===== Method Setter (untuk mengubah nilai property) =====

    // Setter kecepatan
    // Syarat: tidak boleh negatif, dan maksimal 200 km/jam
    public function setKecepatan($kecepatan) {
        if ($kecepatan < 0) {
            return "Data tidak valid! Anda memasukkan angka negatif ($kecepatan). Harap masukkan angka positif.";
        } elseif ($kecepatan > 200) {
            return "Data tidak valid! Kecepatan $kecepatan km/jam melebihi batas maksimal. Harap masukkan angka 0 - 200 km/jam.";
        } else {
            $this->kecepatan = $kecepatan;
            return "Berhasil! Kecepatan diubah menjadi $kecepatan km/jam.";
        }
    }

    // Setter warna
    // Syarat: tidak boleh kosong, dan minimal 3 karakter
    public function setWarna($warna) {
        if ($warna == "") {
            return "Data tidak valid! Warna tidak boleh kosong. Harap masukkan nama warna.";
        } elseif (strlen($warna) < 3) {
            return "Data tidak valid! Warna \"$warna\" terlalu pendek. Harap masukkan warna minimal 3 karakter.";
        } else {
            $this->warna = $warna;
            return "Berhasil! Warna diubah menjadi $warna.";
        }
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


echo "<h1>Dream Cars Rasya Akmal Sakhi</h1>";

// Membuat 3 objek berbeda
$mobil1 = new Mobil("Mazda Rx 7", "Merah", 180);
$mobil2 = new Mobil("Mustang", "Hitam", 150);
$mobil3 = new Mobil("Chevrolet Corvette", "Silver", 120);


// Menampilkan informasi mobil
echo $mobil1->getInfo() . "<br>";
echo $mobil1->jalankan() . "<br>";
echo $mobil1->berhenti() . "<br><br>";

echo $mobil2->getInfo() . "<br>";
echo $mobil2->jalankan() . "<br>";
echo $mobil2->berhenti() . "<br><br>";

echo $mobil3->getInfo() . "<br>";
echo $mobil3->jalankan() . "<br>";
echo $mobil3->berhenti() . "<br><br>";


// ===== Contoh penggunaan Getter =====
echo "Objek awal sebelum property diubah:<br>";
echo "Merek mobil ke-1: " . $mobil1->getMerek() . "<br>";
echo "Warna mobil ke-1: " . $mobil1->getWarna() . "<br>";
echo "Kecepatan mobil ke-1: " . $mobil1->getKecepatan() . " km/jam<br><br>";


// ===== Contoh penggunaan Setter (nilai benar) =====
echo $mobil1->setKecepatan(195) . "<br>";
echo $mobil1->setWarna("Biru") . "<br><br>";
echo "Objek setelah property diubah:<br>";
echo "Merek mobil ke-1: " . $mobil1->getMerek() . "<br>";
echo "Warna mobil ke-1: " . $mobil1->getWarna() . "<br>";
echo "Kecepatan mobil ke-1: " . $mobil1->getKecepatan() . " km/jam<br><br>";


// ===== Contoh penggunaan Setter (nilai salah, untuk membuktikan validasi jalan) =====

// Percobaan 1: kecepatan negatif
echo $mobil1->setKecepatan(-50) . "<br>";
echo "Kecepatan mobil ke-1 sekarang: " . $mobil1->getKecepatan() . " km/jam<br><br>";

// Percobaan 2: kecepatan lebih dari 200
echo $mobil1->setKecepatan(250) . "<br>";
echo "Kecepatan mobil ke-1 sekarang: " . $mobil1->getKecepatan() . " km/jam<br><br>";

// Percobaan 3: warna kosong
echo $mobil1->setWarna("") . "<br>";
echo "Warna mobil ke-1 sekarang: " . $mobil1->getWarna() . "<br><br>";

// Percobaan 4: warna kurang dari 3 karakter
echo $mobil1->setWarna("Bi") . "<br>";
echo "Warna mobil ke-1 sekarang: " . $mobil1->getWarna() . "<br><br>";

?>