<?php


namespace App\Controller;


use App\Model\Category;
use App\Model\CategoryManager;

class CategoryController
{
    protected $categoryController;

    public function __construct()
    {
        $this->categoryController = new CategoryManager();
    }

    public function getAllCategories()
    {
        $categories = $this->categoryController->getAllCategories();
        include('src/View/category/list.php');
    }

    public function addCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            include('src/View/category/add.php');
        } else {
            $name = $_POST['name'];
            $country = $_POST['country'];
            $category = new Category($name, $country);
            $this->categoryController->addCategory($category);
            header("location:index.php?page=list-category");
        }
    }

    public function updateCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $category = $this->categoryController->getCategoryId($id);
            include('src/View/category/update.php');
        } else {
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $country = $_REQUEST['country'];
            $category = new Category($name, $country);
            $category->setId($id);
            $this->categoryController->updateCategory($category);
            header('location:index.php?page=list-category');
        }
    }

    public function deleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $this->categoryController->deleteCategory($id);
            header('location:index.php?page=list-category');
        }
    }

    public function searchCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keyword = $_REQUEST['keyword'];
            $categories = $this->categoryController->searchCategory($keyword);
            include('src/View/category/list.php');
        }
    }

    public function getAll()
    {
        $categories = $this->categoryController->getAllCategories();
        include('front/menu/navbar.php');
    }
}