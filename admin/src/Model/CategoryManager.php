<?php

namespace App\Model;

class CategoryManager {
    protected $database;

    public function __construct()
    {   
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAllCategory() {
        $sql = "SELECT * FROM categories";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $key => $item) {
            $category = new Category($item['name']);
            $category->setId($item['id']);
            array_push($arr, $category);
        }
        return $arr;
    }

    public function addCategory($category) {
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(':name', $category->getName());
        $stmt->execute();
    }

}
