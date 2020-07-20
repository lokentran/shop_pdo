<?php
namespace App\Controller;
use App\Model\ProductManager;
use App\Model\Cart;
class CartController {
    protected $cartController;

    public function __construct()
    {
        $this->cartController = new ProductManager();
    }

    public function addToCart()
    {
        $idProduct = $_REQUEST['id'];
        $product = $this->cartController->getProductId($idProduct);
        if($_SESSION['cart']){
        $oldCart  = $_SESSION['cart'];
        }else {
            $_SESSION['cart']=null;
            $oldCart  = $_SESSION['cart'];
        }
        $newCart = new Cart($oldCart);
        $newCart->add($product);

       $_SESSION['cart']=$newCart;

    
          include('src/View/cart/list.php');
           
        
    }
}