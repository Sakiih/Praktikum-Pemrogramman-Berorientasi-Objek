<?php
require_once 'Product.php';

$productModel = new Product();
$pesan = '';


// Tambah atau edit produk
if (isset($_POST['simpan'])) {
    $id = (int) ($_POST['id'] ?? 0);
    $nama = trim($_POST['nama']);
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    if (
        $nama != '' &&
        is_numeric($harga) &&
        $harga >= 0 &&
        filter_var($stok, FILTER_VALIDATE_INT) !== false &&
        $stok >= 0
    ) {
        $product = new Product($nama, $harga, $stok);

        if ($id > 0) {
            $product->update($id);
        } else {
            $product->save();
        }

        header('Location: index.php');
        exit;

    } else {
        $pesan = 'Data produk tidak valid!';
    }
}


// Hapus produk
if (isset($_POST['hapus'])) {
    $productModel->delete((int) $_POST['id']);

    header('Location: index.php');
    exit;
}


// Mengambil produk untuk diedit
$edit = null;

if (isset($_GET['edit'])) {
    $edit = $productModel->findById((int) $_GET['edit']);
}

$products = $productModel->findAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk Laptop</title>

    <style>
        body {
            font-family: Arial;
            margin: 30px;
        }

        input {
            display: block;
            margin: 5px 0 10px;
            padding: 7px;
        }

        table {
            border-collapse: collapse;
            margin-top: 15px;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Manajemen Produk Laptop</h1>

    <h2><?= $edit ? 'Edit Produk' : 'Tambah Produk' ?></h2>

    <p><?= htmlspecialchars($pesan) ?></p>

    <form method="POST">

        <input
            type="hidden"
            name="id"
            value="<?= htmlspecialchars((string) ($edit['id'] ?? '')) ?>"
        >

        Nama Produk:
        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($edit['name'] ?? '') ?>"
            required
        >

        Harga:
        <input
            type="number"
            name="harga"
            min="0"
            step="0.01"
            value="<?= htmlspecialchars((string) ($edit['price'] ?? '')) ?>"
            required
        >

        Stok:
        <input
            type="number"
            name="stok"
            min="0"
            step="1"
            value="<?= htmlspecialchars((string) ($edit['stock'] ?? '')) ?>"
            required
        >

        <button type="submit" name="simpan">
            <?= $edit ? 'Update' : 'Tambah' ?>
        </button>

        <?php if ($edit): ?>
            <a href="index.php">Batal</a>
        <?php endif; ?>

    </form>


    <h2>Daftar Produk</h2>

    <table>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>

        <?php foreach ($products as $p): ?>
            <tr>
                <td><?= $no++ ?></td>

                <td><?= (int) $p['id'] ?></td>

                <td><?= htmlspecialchars($p['name']) ?></td>

                <td>
                    Rp <?= number_format((float) $p['price'], 0, ',', '.') ?>
                </td>

                <td><?= (int) $p['stock'] ?></td>

                <td>
                    <a href="index.php?edit=<?= (int) $p['id'] ?>">
                        Edit
                    </a>

                    <form
                        method="POST"
                        style="display:inline"
                        onsubmit="return confirm('Yakin ingin menghapus produk?')"
                    >
                        <input
                            type="hidden"
                            name="id"
                            value="<?= (int) $p['id'] ?>"
                        >

                        <button type="submit" name="hapus">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>