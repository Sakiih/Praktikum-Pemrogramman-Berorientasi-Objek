<?php

abstract class ServiceHP
{
    protected $id;
    protected $nama;
    protected $hargaDasar;

    public function __construct($id, $nama, $hargaDasar)
    {
        $this->id = $id;
        $this->nama = $nama;
        $this->hargaDasar = $hargaDasar;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function getHargaDasar()
    {
        return $this->hargaDasar;
    }

    abstract public function hitungTotal();
    abstract public function getJenis();
}

class GantiLCD extends ServiceHP
{
    private $inch;

    public function __construct($id, $nama, $hargaDasar, $inch)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->inch = $inch;
    }

    public function hitungTotal()
    {
        return $this->hargaDasar + (50000 * $this->inch);
    }

    public function getJenis()
    {
        return "Ganti LCD";
    }
}

class GantiBaterai extends ServiceHP
{
    private $mAh;

    public function __construct($id, $nama, $hargaDasar, $mAh)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->mAh = $mAh;
    }

    public function hitungTotal()
    {
        return $this->hargaDasar + (500 * $this->mAh);
    }

    public function getJenis()
    {
        return "Ganti Baterai";
    }
}

class Flash extends ServiceHP
{
    private $versi;

    public function __construct($id, $nama, $hargaDasar, $versi)
    {
        parent::__construct($id, $nama, $hargaDasar);
        $this->versi = $versi;
    }

    public function hitungTotal()
    {
        $total = $this->hargaDasar + (30000 * $this->versi);

        if ($this->versi > 2) {
            $total = $total - ($total * 0.10);
        }

        return $total;
    }

    public function getJenis()
    {
        return "Flash";
    }
}

$service1 = new GantiLCD(1, "Rasya Akmal Sakhi", 500000, 6);
$service2 = new GantiBaterai(2, "Raihan Ikram", 300000, 4000);
$service3 = new Flash(3, "Hafiz Alfitra", 200000, 3);
$service4 = new GantiLCD(4, "Deriel Mulya", 450000, 5);
$service5 = new Flash(5, "Adli Putri", 150000, 2);

$daftarService = [
    $service1,
    $service2,
    $service3,
    $service4,
    $service5
];

echo "===============================================<br>";
echo "SISTEM SERVICE HP<br>";
echo "===============================================<br>";

echo "No | ID | Nama | Jenis | Harga Dasar | Total<br>";
echo "-----------------------------------------------<br>";

$no = 1;
$totalKeseluruhan = 0;

foreach ($daftarService as $service) {
    echo $no . " | ";
    echo $service->getId() . " | ";
    echo $service->getNama() . " | ";
    echo $service->getJenis() . " | ";
    echo "Rp " . number_format($service->getHargaDasar(), 0, ',', '.') . " | ";
    echo "Rp " . number_format($service->hitungTotal(), 0, ',', '.');
    echo "<br>";

    $totalKeseluruhan += $service->hitungTotal();
    $no++;
}

echo "-----------------------------------------------<br>";
echo "Total Keseluruhan: Rp " . number_format(
    $totalKeseluruhan,
    0,
    ',',
    '.'
);

?>