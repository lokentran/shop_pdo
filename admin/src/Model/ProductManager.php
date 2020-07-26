<?php


namespace App\Model;


class ProductManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllProduct()
    {
        $sql = "SELECT * FROM products";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();

  

        $arr = [];
        foreach ($data as $key => $item) {
            $product = new Product($item['img'], $item['name'], $item['price'], $item['quantity'], $item['description'],$item['category_id']);
            $product->setId($item['id']);
            array_push($arr, $product);
        }
        return $arr;
    }

    public function addProduct($product)
    {
        $sql = "INSERT INTO `products`(`img`, `name`, `price`, `quantity`, `description`,`category_id`) VALUES (:img, :name, :price, :quantity, :description, :category_id)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->bindParam(':category_id', $product->getCategoryId());
        $stmt->execute();
    }

    public function getProductId($id)
    {
        $sql = "SELECT * FROM products WHERE  id= :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateProduct($product)
    {
        $sql = "UPDATE `products` SET `img`= :img,`name`=:name,`price`=:price,`quantity`= :quantity,`description`= :description,`category_id`=:category_id WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':img', $product->getImg());
        $stmt->bindParam(':name', $product->getName());
        $stmt->bindParam(':price', $product->getPrice());
        $stmt->bindParam(':quantity', $product->getQuantity());
        $stmt->bindParam(':description', $product->getDescription());
        $stmt->bindParam(':category_id', $product->getCategoryId());
        $stmt->bindParam(':id', $product->getId());
        $stmt->execute();
    }

    public function deleteProduct($id)
    {
        $sql = "DELETE FROM `products` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function searchProduct($keyword)
    {
        $sql = "SELECT * FROM `products` WHERE name LIKE :keyword";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $products = [];
        foreach ($data as $key => $item) {
            $product = new Product($item['img'], $item['name'], $item['price'], $item['quantity'], $item['description'],$item['category_id']);
            $product->setId($item['id']);
            array_push($products, $product);
        }
        return $products;
    }
    public function searchByCategory($id)
    {
        $sql =  'SELECT * from categories,products where categories.id = products.category_id and categories.id = :id';
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $product = new Product($item['img'], $item['name'], $item['price'], $item['quantity'], $item['description'],$item['category_id']);
            $product->setId($item['id']);
            array_push($arr, $product);
        }
        return $arr;
    }


}

