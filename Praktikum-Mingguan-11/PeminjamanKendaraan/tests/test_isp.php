<?php

require_once __DIR__ . '/../vendor/autoload.php';

use PeminjamanKendaraan\Calculators\KalkulatorSewaHarian;
use PeminjamanKendaraan\Contracts\KalkulatorSewaInterface;
use PeminjamanKendaraan\Contracts\KendaraanRepositoryInterface;
use PeminjamanKendaraan\Contracts\PelangganRepositoryInterface;
use PeminjamanKendaraan\Contracts\PeminjamanRepositoryInterface;
use PeminjamanKendaraan\Repositories\InMemory\KendaraanRepository;
use PeminjamanKendaraan\Repositories\InMemory\PelangganRepository;
use PeminjamanKendaraan\Repositories\InMemory\PelangganRepositoryAlternatif;
use PeminjamanKendaraan\Repositories\InMemory\PeminjamanRepository;
use PeminjamanKendaraan\Services\PeminjamanService;

function pastikanIsp(bool $kondisi, string $pesan): void
{
    if (!$kondisi) {
        throw new RuntimeException("Assertion ISP gagal: {$pesan}");
    }
}

function namaMethodInterface(string $namaInterface): array
{
    $method = new ReflectionClass($namaInterface);

    return array_map(
        static fn (ReflectionMethod $method): string => $method->getName(),
        $method->getMethods()
    );
}

function pastikanMethodInterfaceFokus(
    string $namaInterface,
    array $methodYangDiharapkan,
    string $keterangan
): void {
    $methodAktual = namaMethodInterface($namaInterface);
    sort($methodAktual);
    $methodYangDiharapkan = array_values($methodYangDiharapkan);
    sort($methodYangDiharapkan);

    pastikanIsp(
        $methodAktual === $methodYangDiharapkan,
        "Kontrak {$keterangan} memiliki method yang tidak sesuai."
    );
}

pastikanMethodInterfaceFokus(
    PelangganRepositoryInterface::class,
    ['cariBerdasarkanId'],
    'pelanggan'
);
pastikanMethodInterfaceFokus(
    KendaraanRepositoryInterface::class,
    ['cariBerdasarkanId'],
    'kendaraan'
);
pastikanMethodInterfaceFokus(
    PeminjamanRepositoryInterface::class,
    ['buatIdBaru', 'simpan', 'cariBerdasarkanId'],
    'peminjaman'
);
pastikanMethodInterfaceFokus(
    KalkulatorSewaInterface::class,
    ['hitungTotalHari', 'hitungTotalHarga'],
    'kalkulator sewa'
);

pastikanIsp(
    (new PelangganRepository()) instanceof PelangganRepositoryInterface,
    'Repository pelanggan tidak memenuhi kontraknya.'
);
pastikanIsp(
    (new PelangganRepositoryAlternatif([])) instanceof PelangganRepositoryInterface,
    'Repository pelanggan alternatif tidak memenuhi kontraknya.'
);
pastikanIsp(
    (new KendaraanRepository()) instanceof KendaraanRepositoryInterface,
    'Repository kendaraan tidak memenuhi kontraknya.'
);
pastikanIsp(
    (new PeminjamanRepository()) instanceof PeminjamanRepositoryInterface,
    'Repository peminjaman tidak memenuhi kontraknya.'
);
pastikanIsp(
    (new KalkulatorSewaHarian()) instanceof KalkulatorSewaInterface,
    'Kalkulator harian tidak memenuhi kontraknya.'
);

$parameterService = (new ReflectionClass(PeminjamanService::class))
    ->getConstructor()
    ->getParameters();
$tipeDependencyService = array_map(
    static fn (ReflectionParameter $parameter): string => $parameter->getType()->getName(),
    $parameterService
);

pastikanIsp(
    $tipeDependencyService === [
        PelangganRepositoryInterface::class,
        KendaraanRepositoryInterface::class,
        PeminjamanRepositoryInterface::class,
        KalkulatorSewaInterface::class,
    ],
    'PeminjamanService harus bergantung pada interface yang sesuai.'
);

echo "Pengujian ISP berhasil: setiap interface fokus dan dependency service sesuai kontrak.\n";
