<?php

namespace App\Http\Controllers;
use App\Item;
use App\Order;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use Auth;


class OrderController extends Controller
{
    //get all user order for dashboard
    public function getAllUserOrders()
    {
        if(Auth::guest() || !Auth::user()->status == 0 ){
            return redirect('/');
        } else{
            $orders = Order::orderBy('id', 'DESC')->get();
            return view('adminPages.dashboard', compact('orders'));
        }
    }

    //delete an order by user or admin
    public function orderDelete($id)
    {
        $order = Order::find($id);
        $order->delete();
        if(Auth::user()->status == 0 ){
            return redirect('/dashboard');
        }else{
            return redirect('/orders/all');
        }


    }
    //add a new order by user
    public function makeOrder(Request $request)
    {
        $orders = new Order;
        $item = new Item;
        $orders->user_id = $request->user_id;
        $orders->item_id = $request->item_id;
        $request = $request->all();

        if ($orders->save()) {
            $itemId = (array) array_get($request, 'item_id');
            $orderId = Order::find($orders->id);
            $orders->items()->attach($itemId);
            $item->orders()->attach($orderId);
            return redirect('/orders/all');
        }
    }
    //get the orders of user for the user
    public function getAllOrders() {
        $orders = Order::all()->where('user_id', '=', Auth::user()->id);
       return view('userPages.UserOrders', compact('orders'));
    }

}
