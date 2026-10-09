<?php
// OOP
class PersegiPanjang {
    public $panjang;
    public $lebar;

    function hitungLuas() {
        return $this->panjang * $this->lebar;
    }
}

$pp = new PersegiPanjang();

$pp->panjang = 10;
$pp->lebar = 5;
echo "<h3>PROGRAM OOP MENGHITUNG LUAS PERSEGI PANJANG</h3>";
echo "Panjang = 10<br>";
echo "Lebar = 5<br><br>";
echo "Rumus = Panjang x Lebar<br>";
echo "Luas (OOP): " . $pp->hitungLuas();

?>


