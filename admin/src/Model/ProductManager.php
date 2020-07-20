<?php

namespace App\Model;
use App\Model\Product;

class ProductManager {
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect() ;
    }

    public function getAllProduct() {
        $sql = "SELECT * FROM products";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchALl();
        $arr = [];
        foreach ($data as $item) {
            $product = new Product($item['product_name'], $item['product_price'],$item['img'],$item['category_id']);
            $product->setId($item['product_id']);
            array_push($arr, $product);
        }
        return $arr;
    }
    
    public function addProduct($product) {
        $sql = "INSERT INTO products (product_name, product_price, img, category_id) VALUES(:name, :price,:img,:category_id)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':category_id', $product->getCategory_id());
        $stmt->execute();
    }

    public function getProductId($id) {
        $sql = "SELECT * FROM products where product_id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch();
        return $product;
    }

    public function editProduct($product)
    {
        $sql = "UPDATE products SET product_name = :name , product_price= :price, img = :img, category_id=:category_id WHERE product_id = :id ";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':category_id', $product->getCategory_id());
        $stmt->bindParam(':id', $product->getId());
        $stmt->execute();
    }

    public function deleteProduct($id) {
        $sql = "DELETE FROM products WHERE product_id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $product->getId());
        $stmt->execute();
    }

}

