<?php

// ===============================
// Parent class: Produk
// ===============================
class Produk {
    protected $nama;
    protected $merek;
    protected $harga;

    public function __construct($nama, $merek, $harga) {
        if ($harga < 0) {
            throw new Exception("Harga tidak boleh negatif!");
        }

        $this->nama  = $nama;
        $this->merek = $merek;
        $this->harga = $harga;
    }

    public function getInfo() {
        $info  = "Merek: " . $this->merek . "\n";
        $info .= "Harga: Rp " . number_format($this->harga, 0, ',', '.') . "\n";
        return $info;
    }
}

// ===============================
// Child class: Makanan
// ===============================
class Makanan extends Produk {
    protected $tanggalKadaluarsa;

    public function __construct($nama, $merek, $harga, $tanggalKadaluarsa) {
        parent::__construct($nama, $merek, $harga);
        $this->tanggalKadaluarsa = $tanggalKadaluarsa;
    }

    public function getInfo() {
        if (strtotime($this->tanggalKadaluarsa) >= strtotime(date("Y-m-d"))) {
            $status = "Segar";
        } else {
            $status = "Kadaluarsa";
        }

        $info  = "Produk: Makanan - " . $this->nama . "\n";
        $info .= parent::getInfo();
        $info .= "Tanggal Kadaluarsa: " . $this->tanggalKadaluarsa . "\n";
        $info .= "Status: " . $status . "\n";
        return $info;
    }
}

// ===============================
// Child class: Elektronik
// ===============================
class Elektronik extends Produk {
    protected $garansi;

    public function __construct($nama, $merek, $harga, $garansi) {
        parent::__construct($nama, $merek, $harga);
        $this->garansi = $garansi;
    }

    public function getInfo() {
        $info  = "Produk: Elektronik - " . $this->nama . "\n";
        $info .= parent::getInfo();
        $info .= "Garansi: " . $this->garansi . " bulan\n";
        return $info;
    }
}

// ===============================
// Testing / Pemanggilan
// ===============================
$mie = new Makanan("Mie Instan", "Indomie", 3500, "2027-06-30");
echo $mie->getInfo();

echo "<br>";

$tv = new Elektronik("Smart TV", "Samsung", 5000000, 12);
echo $tv->getInfo();

?>