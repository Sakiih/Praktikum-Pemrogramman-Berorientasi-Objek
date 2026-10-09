<?php

use App\Services\ProductService;

require_once __DIR__ . '/vendor/autoload.php';

try {
    $productService = new ProductService();

    // Membuat dua produk
    $product1 = $productService->createProduct('Laptop', 8500000);
    $product2 = $productService->createProduct('Mouse', 150000);

    // Menampilkan kedua produk
    echo "<h2>Daftar Produk</h2>";

    echo $productService->displayProduct($product1) . "<br>";
    echo $productService->displayProduct($product2) . "<br>";

} catch (Throwable $e) {
    echo "<h3>Terjadi Error</h3>";
    echo "<p>Pesan: " . $e->getMessage() . "</p>";
    echo "<p>File: " . $e->getFile() . "</p>";
    echo "<p>Line: " . $e->getLine() . "</p>";
}