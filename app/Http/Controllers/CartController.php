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
        // citanje podataka iz sesije - get metoda
        // ako je sesija cartItems prazna, postavi je na prazan niz
        $cartItems = session()->get('cartItems', []);

        // proveri da li bas taj proizvod postoji u sesiji
        if(isset($cartItems[$product->id])) {
            // ako postoji, povecavaj samo kolicinu
            $cartItems[$product->id]['quantity']++;
        }
        // ako ne postoji u sesiji, 
        else {
            //dodaj u niz $cartItems novi proizvod sa atributima iz zahteva
            $cartItems[$product->id] = [
                "image_path" => $product->image_path,
                "name" => $product->name,
                "details" => $product->details,
                "brand" => $product->brand,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        // cuvanje podataka u sesiju - put metoda
        session()->put('cartItems', $cartItems);
        return redirect()->back();
    }

    public function delete(Product $product) {
        // proveri da li proizvod postoji
        if($product) {
            // u niz $cartItems sacuvamo podatke iz sesije cartItems
            $cartItems = session()->get('cartItems');

            // ako selektovani proizvod postoji u sesiji
            if(isset($cartItems[$product->id])) {
                // izbaci taj proizvod iz niza
                unset($cartItems[$product->id]);
                // sada takav niz bez tog proizvoda sacuvaj u sesiju cartItems
                session()->put('cartItems', $cartItems);
            }
        }

        return redirect()->back();
    }
}
