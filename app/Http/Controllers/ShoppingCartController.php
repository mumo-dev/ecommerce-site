<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderRecord;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index(){
        return view('shoppingcart');
    }


    public function store(Request $request){

        $order = new Order();
        $order->user_id = $request->userId;
        $order->save();

        $orderId = $order->id;
       
        foreach($request->orders as $custOrder){
            
            // return $custOrder['product_id'];

            $customerOrder = new OrderRecord();
            $customerOrder->order_id = $orderId;
            $customerOrder->product_id = $custOrder['product_id'];
            $customerOrder->price = $custOrder['product_price'];
            $customerOrder->quantity = $custOrder['quantity'];
            $customerOrder->save();

        }
        return $order;
    }

    

}
