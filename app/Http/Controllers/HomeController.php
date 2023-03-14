<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $response = Http::get('https://fakestoreapi.com/products');
        $products = json_decode($response->getBody(), true);
        $cart = session()->get('cart');
        

        // Check if the cart session exists
        if (session()->has('cart')) {
            // Get the cart data from the session
            // Check if the cart is empty
            if (empty($cart)) {
                // Cart is empty
                $cartCount = 0;
            } else {
                // Cart is not empty
                $cartCount = count($cart);
            }
        } else {
            // Cart session does not exist
            $cartCount = 0;
        }
        return view('home',['title'=>'Shopping App','products'=>$products,'incart'=>$cartCount]);
    }
}
