<?php

namespace App\Http\Controllers;
use App\Helper\Cart;
use Illuminate\Http\Request;
use App\Models\Product;
class CartUserController extends Controller
{
    public function cart(Cart $cart)
    {
        return view("user.cart",compact('cart'));
    }
    public function addcart(Request $request,Cart $cart){
        $product = Product::find($request->id);
        $quantity = $request->quantity;
        $cart->add($product,$quantity);

        return redirect()->route('user.cart');
    }

    public function updateQuantity(Request $request, Cart $cart)
    {
        $productId = $request->id;
        $quantity = $request->quantity;

        $cart->updateQuantity($productId, $quantity);

        return redirect()->route('user.cart');
    }

    public function removeItem(Request $request, Cart $cart)
    {
        $productId = $request->id;
        $cart->remove($productId);

        return redirect()->route('user.cart');
    }

}
