<?php

namespace App\Controller;

use App\Model\CategoryManager;
use App\Model\Product;
use App\Model\ProductManager;

class ProductController
{
    protected $productController;


    public function __construct()
    {
        $this->productController = new ProductManager();
    }

    public function getAllProduct()
    {
        $products = $this->productController->getAllProduct();

        // echo "<pre>";
        // print_r($products);
        // echo "</pre>";
   

        $categoryObj = new CategoryManager();
        $categories = $categoryObj->getAllCategories();

        echo "<pre>";
        print_r($categories);
        echo "</pre>";

        include('src/View/product/list.php');
    }

    public function addProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categoryObj = new CategoryManager();
            $categories = $categoryObj->getAllCategories();
            include('src/View/product/add.php');
        } else {
            $file = $_FILES['my-file']['tmp_name'];
            $path = "uploads/" . $_FILES['my-file']['name'];
            if (move_uploaded_file($file, $path)) {
                echo "Tải tập tin thành công";
            } else {
                echo "Tải tập tin thất bại";
            }
            $name = $_POST['name'];
            $price = $_POST['price'];
            $quantity = $_POST['quantity'];
            $description = $_POST['description'];
            $category_id = $_POST['category_id'];
            $product = new Product($path, $name, $price, $quantity, $description, $category_id);
            $this->productController->addProduct($product);
            header("location:index.php");
        }
    }

    public function updateProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_REQUEST['id'];
            $product = $this->productController->getProductId($id);
            include('src/View/product/update.php');
        } else {
            $path = "uploads/" . $_FILES['my-file']['name'];
            $file = $_FILES['my-file']['tmp_name'];
            if (move_uploaded_file($file, $path)) {
                echo "Tải tập tin thành công";
            } else {
                echo "Tải tập tin thất bại";
            }
            $id = $_REQUEST['id'];
            $name = $_REQUEST['name'];
            $price = $_REQUEST['price'];
            $quantity = $_REQUEST['quantity'];
            $description = $_REQUEST['description'];
            $category_id = $_POST['category_id'];
            $product = new Product($path, $name, $price, $quantity, $description, $category_id);
            $product->setId($id);
            $this->productController->updateProduct($product);
            header("location:index.php");
        }
    }

    public function deleteProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $id = $_REQUEST['id'];
            $this->productController->deleteProduct($id);
            header("location:index.php");
        }
    }

    public function detailProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $id = $_REQUEST['id'];
            $product = $this->productController->getProductId($id);
            include('front/product/detail-product.php');
        }
    }

    public function getAllProductFront()
    {
        $products = $this->productController->getAllProduct();
        include('front/product/list.php');
    }

    public function searchProduct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $keyword = $_REQUEST['keyword'];
            $products = $this->productController->searchProduct($keyword);
            $categoryObj = new CategoryManager();
            $categories = $categoryObj->getAllCategories();
            include_once('src/View/product/list.php');
        }
    }

    public function searchProductById($id)
    {
        $categoryObj = new CategoryManager();
        $categories = $categoryObj->getAllCategories();
        $products = $this->productController->searchByCategory($id);
        include('front/product/listProductByCat.php');
    }

}