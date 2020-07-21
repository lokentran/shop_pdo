<?php
namespace App\Controller;
use App\Model\ProductManager;
use App\Model\Cart;
class CartController {
    protected $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function addToCart()
    {
        $idProduct = $_REQUEST['id'];
        $product = $this->productManager->getProductId($idProduct);

        if(isset($_SESSION['cart'])) {
            $oldCart  = unserialize($_SESSION['cart']);
        } else {
            $oldCart  = $_SESSION['cart'];
        }

        $newCart = new Cart($oldCart);
        $newCart->add($product);

        $_SESSION['cart'] = serialize($newCart);

        $cartCurrent = unserialize($_SESSION['cart']);
        include('src/View/cart/list.php');
           
        
    }
}