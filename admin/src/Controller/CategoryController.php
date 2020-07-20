<?php

namespace App\Controller;
use App\Model\CategoryManager;
use App\Model\Category;

class CategoryController {
    protected $categoryController;

    public function __construct()
    {
        $this->categoryController = new CategoryManager();
    }

    public function getAllCategory() {
        $categories = $this->categoryController->getAllCategory();
        include('src/View/category/list.php');
    }

    public function addCategory() {
        include('src/View/category/add.php');
        if(isset($_POST['sbm'])) {
            $name = $_POST['name'];
            $category = new Category($name);
            $this->categoryController->addCategory($category);
            header('location:index.php?page=list-category');
        }
    }

}