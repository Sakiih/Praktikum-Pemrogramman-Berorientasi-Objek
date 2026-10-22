<?php

require_once 'DatabaseConnection.php';

class Product
{
    private $connection;
    private $name;
    private $price;
    private $stock;

    public function __construct($name = '', $price = 0, $stock = 0)
    {
        $this->connection = DatabaseConnection::getConnection();

        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
    }

    // Menambahkan produk
    public function save()
    {
        $sql = "INSERT INTO products (name, price, stock)
                VALUES (:name, :price, :stock)";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock
        ]);
    }

    // Melihat semua produk
    public function findAll()
    {
        $sql = "SELECT * FROM products ORDER BY id ASC";

        $stmt = $this->connection->query($sql);

        return $stmt->fetchAll();
    }

    // Melihat satu produk berdasarkan ID
    public function findById($id)
    {
        $sql = "SELECT * FROM products WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        $stmt->execute([
            'id' => $id
        ]);

        return $stmt->fetch();
    }

    // Mengubah produk
    public function update($id)
    {
        $sql = "UPDATE products
                SET name = :name,
                    price = :price,
                    stock = :stock
                WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock,
            'id' => $id
        ]);
    }

    // Menghapus produk
    public function delete($id)
    {
        $sql = "DELETE FROM products WHERE id = :id";

        $stmt = $this->connection->prepare($sql);

        return $stmt->execute([
            'id' => $id
        ]);
    }
}