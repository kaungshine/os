<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Order;

class FrontendController extends Controller
{
    public function home()
    {
    	$items = Item::orderBy('id', 'desc')->take(3)->get();
    	return view('frontend.home', compact('items'));
    }

    //ItemController -> show
    public function itemdetail($item) //id
    {
    	$item = Item::find($item);
    	return view('frontend.detail', compact('item'));
    }

    public function cart()
    {
    	return view('frontend.cart');
    }

    public function checkout(Request $request)
    {
        $arr = json_decode($request->data);
        $total = 0;
        foreach ($arr->product_list as $row) {
            $subtotal = $row->price * $row->quantity;
            $total += $subtotal;
        }

        $order = new Order;
        $order->voucherno = uniqid();
        $order->total = $total;
        $order->note = 'Note Here';
        $order->status = 0;
        $order->user_id = 1; //auth id
        $order->orderdate = now();

        $order->save();

        foreach ($arr->product_list as $row) {
          $order->items()->attach($row->id,['qty' => $row->quantity]); 
        }

        return 'Your Order Successful!';
        
    }
}
