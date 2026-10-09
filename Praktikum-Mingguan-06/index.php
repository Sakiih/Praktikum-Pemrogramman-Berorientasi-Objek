<?php

// Interface
interface Bentuk {
    public function hitungLuas();
}

// Class Persegi
class Persegi implements Bentuk {
    private $sisi;

    public function __construct($sisi) {
        $this->sisi = $sisi;
    }

    public function hitungLuas() {
        return $this->sisi * $this->sisi;
    }
}

// Class Lingkaran
class Lingkaran implements Bentuk {
    private $radius;

    public function __construct($radius) {
        $this->radius = $radius;
    }

    public function hitungLuas() {
        return 3.14 * $this->radius * $this->radius;
    }
}

// Membuat objek Persegi dan Lingkaran
$bentuk = [
    [
        "nama" => "Persegi (sisi=5)",
        "objek" => new Persegi(5)
    ],
    [
        "nama" => "Lingkaran (radius=7)",
        "objek" => new Lingkaran(7)
    ]
];

// Loop untuk mencetak luas setiap bentuk
foreach ($bentuk as $item) {
    echo "Luas " . $item["nama"] . ": "
        . $item["objek"]->hitungLuas() . "<br>";
}


?>