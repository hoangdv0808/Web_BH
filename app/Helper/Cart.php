<?php
namespace App\Helper;
class Cart
{
    private $items=[];
    private $total_quantity = 0;
    private $total_price = 0;
    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
    }

    public function list(){
        return $this->items;
    }

    public  function add($product,$quantity = 1){
        $item = [
            'productId'=> $product->id,
            'name'=> $product->name,
            'price'=> $product->sale_price > 0 ? $product->sale_price : $product->price,
            'image' =>$product->thumbnail,
            'quantity' =>$quantity,
        ];
        $this->items[$product->id] = $item;

        session(['cart'=>$this->items]);
    }

    public function getTotalPrice(){
        $totalPrice = 0;
        foreach($this->items as $item){
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return $totalPrice;
    }
    public function getTotalQuantity(){
        $totalQuantity = 0;
        foreach($this->items as $item){
            $totalQuantity += $item['quantity'];
        }
        return $totalQuantity;
    }
    public function updateQuantity($productId, $quantity)
    {
        if (isset($this->items[$productId])) {
            $this->items[$productId]['quantity'] = $quantity;
            session(['cart' => $this->items]);
        }
    }

    public function remove($productId)
    {
        if (isset($this->items[$productId])) {
            unset($this->items[$productId]);
            session(['cart' => $this->items]);
        }
    }
}
