<?php
    session_start();  

    require __DIR__ . '/vendor/autoload.php';

    use App\Controller\ProductController;
    use App\Controller\UserController;
    use App\Controller\CategoryController;
    use App\Controller\CartController;
    
    $controller = new ProductController();
    $userController = new UserController();
    $categoryController = new CategoryController();
    $cartController = new CartController();

    if(isset($_SESSION["username"])) {
        include_once('admin.php');
    } else {
        include_once('src/View/login.php');
    }



