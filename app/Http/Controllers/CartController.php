<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function cart() {
        var_dump(session('cartItems'));
        return view('cart.cart');
    }

    public function addToCart(Product $product) 
    {
        $cartItems = session()->get('cartItems', []);

        if(isset($cartItems[$product->id])) {
            $cartItems[$product->id]['quantity']++;
        }
        else {
            $cartItems[$product->id] = [
                "image_path" => $product->image_path,
                "name" => $product->name,
                "details" => $product->details,
                "brand" => $product->brand,
                "price" => $product->price,
                "quantity" => 1
            ];
        }
        session()->put('cartItems', $cartItems);
        return redirect()->back();
    }

    public function delete(Product $product) {
        if($product) {
            $cartItems = session()->get('cartItems');

            if(isset($cartItems[$product->id])) {
                unset($cartItems[$product->id]);
                session()->put('cartItems', $cartItems);
            }
        }

        return redirect()->back();
    }
}
