<?php
session_start();
namespace App\Model;

class Cart
{
    public $items = [];
    public $totalPrice =0 ;
    public $totalQty = 0;
    public $oldCart = $_SESSION['cart'];
    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQty = $oldCart->totalQty;

        }
    }

    public function add($product)
    {
        $productStore = [
            "item" => $product,
            "totalQty" => 0,
            "totalPrice" => 0
        ];

        if ($this->items) {
            if (array_key_exists($product->id, $this->items)) {
                $productStore = $this->items[$product->id];
            }
        }
      
        $productStore['totalQty']++;
        $productStore['totalPrice'] += $product['product_price'];
        $this->items[$product['product_id']] = $productStore;
        $this->totalQty++;
        $this->totalPrice +=$product['product_price'];

    }
}