<?php


namespace App\Model;


class CategoryManager
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllCategories()
    {
        $sql = "SELECT * FROM categories";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $category = new Category($item['name'], $item['country']);
            $category->setId($item['id']);
            array_push($arr, $category);
        }
        return $arr;
    }

    public function addCategory($category)
    {
        $sql = "INSERT INTO `categories`( `name`, `country`) VALUES (:name, :country)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $category->getName());
        $stmt->bindParam(':country', $category->getCountry());
        $stmt->execute();
    }

    public function getCategoryId($id)
    {
        $sql = "SELECT * FROM categories where id =:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function updateCategory($category)
    {
        $sql = "UPDATE `categories` SET `name`= :name,`country`= :country WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $category->getId());
        $stmt->bindParam(':name', $category->getName());
        $stmt->bindParam(':country', $category->getCountry());
        $stmt->execute();
    }

    public function deleteCategory($id)
    {
        $sql = "DELETE FROM `categories` WHERE id =:id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function searchCategory($keyword)
    {
        $sql = "SELECT * FROM categories WHERE name LIKE :keyword";
        $stmt = $this->database->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%');
        $stmt->execute();
        $data = $stmt->fetchAll();
        $categories = [];
        foreach ($data as $item) {
            $category = new Category($item['name'], $item['country']);
            $category->setId($item['id']);
            array_push($categories, $category);
        }
        return $categories;
    }
}