<?php

namespace App\Controller;
use App\Model\ProductManager;
use App\Model\Product;
use App\Model\CategoryManager;

class ProductController {
    protected $productController;

    public function __construct()
    {
        $this->productController = new ProductManager();
    }

    public function getAllProduct() {
        $products = $this->productController->getAllProduct();
        include('src/View/product/list.php');
    }
    
    public function addProduct() {
        $categoryObj = new CategoryManager();
        $categories = $categoryObj->getAllCategory();
        include('src/View/product/add.php');
        if(isset($_POST['sbm'])) {
            $path = "uploads/" . $_FILES['my-file']['name'];
            $file = $_FILES['my-file']['tmp_name'];
            if (move_uploaded_file($file, $path)) {
                echo "Tải tập tin thành công";
            } else {
                echo "Tải tập tin thất bại";
            }
            
            $name = $_POST['product-name'];
            $price = $_POST['product-price'];
            $img = $_POST['img'];
            $category_id = $_POST['category_id'];

            $product = new Product($name, $price,$path,$category_id);
            $this->productController->addProduct($product);
            header("location:index.php");
        }
    }
    public function editProduct()
    {
        $id = $_GET['id'];
        $product = $this->productController->getProductId($id);
        include('src/View/product/edit.php');
        if(isset($_POST['sbm'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $product = new Product($name, $price);
            $product->setId($id);
            $this->productController->editProduct($product);
            header("location:index.php");
        }
    }

    public function deleteProduct() {
        $id = $_GET['id'];
        $this->productController->deleteProduct($id);
        header("location:index.php");
    }

}

