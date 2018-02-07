<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;

class ShoppingCartController extends Controller
{
    public function index(){
        return view('shoppingcart');
    }


    public function store(Request $request){
        $cart = new ShoppingCart();
        $cart->user_id = $request->userId;
        $cart->product_id = $request->productId;
        $cart->name = $request->name;
        $cart->price = $request->price;
        $cart->quantity= $request->quantity;
        $cart->save();

        return $cart;
      }
}
