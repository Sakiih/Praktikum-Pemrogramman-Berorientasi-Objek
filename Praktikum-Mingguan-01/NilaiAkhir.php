<?php

// Fungsi menghitung nilai akhir
function hitungNilaiAkhir($uts, $uas, $tugas) {
    return ($uts * 0.3) + ($uas * 0.4) + ($tugas * 0.3);
}

// Fungsi menentukan grade
function getGrade($nilai) {
    if ($nilai >= 85) return "A";
    elseif ($nilai >= 70) return "B";
    elseif ($nilai >= 55) return "C";
    elseif ($nilai >= 40) return "D";
    else return "E";
}

// Contoh penggunaan
$nilai_akhir = hitungNilaiAkhir(80, 90, 85);

echo "Nilai Akhir: $nilai_akhir <br>";
echo "Grade: " . getGrade($nilai_akhir);

?>
