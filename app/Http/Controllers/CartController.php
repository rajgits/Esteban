<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        
        $productResponse = Http::get('https://fakestoreapi.com/products/'.$id);
        $product = json_decode($productResponse->getBody(), true);

        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    'title' => $product['title'],
                    'quantity' => 1,
                    'price' => $product['price'],
                    'image' => $product['image']
                ]
            ];

            session()->put('cart', $cart);

            return redirect('cart')->with('success', 'Item added to cart successfully!');
        }

        $cart[$id] = [
            'title' => $product['title'],
            'quantity' => 1,
            'price' => $product['price'],
            'image' => $product['image']
        ];

        session()->put('cart', $cart);

        return redirect('cart')->with('success', 'Item added to cart successfully!');
    }

    public function getCart(){
        $cart = session()->get('cart');
        // Calculate the total price of all items in the cart
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        return view('cart', ['products'=>$cart,'title'=>'Shopping App','totalPrice'=>$totalPrice]);
    }

    public function clear_cart(){
        // Clear the cart data from the session
        session()->forget('cart');
        return redirect('/')->with('success', 'Cart cleared successfully!');

    }

    public function viewCart(Request $request, $id){
        
        $productResponse = Http::get('https://fakestoreapi.com/products/'.$id);
        $product = json_decode($productResponse->getBody(), true);

        if (!$product) {
            abort(404);
        }

        return view('cartview', ['title'=>'Shopping App','products'=>$product]);
    }
}
