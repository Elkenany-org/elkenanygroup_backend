<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $all_orders = Order::latest()->paginate(10);
        return view('Orders.index')->with('all_orders' , $all_orders);
    }

    public function archive()
    {
        $all_orders = Order::latest()->onlyTrashed()->paginate(10);
        return view('Orders.archive')->with('all_orders',$all_orders);
    }
    
    public function show($id)
    {
        $order = Order::where('id' , $id)->first();
        $order->read = '1';
        $order->save();
        return view('Orders.show')->with('order' , $order); 
    }
    
    

    public function soft_delete($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->back();
    }

    public function restore($id)
    {
        $order = Order::withTrashed()->find($id);
        $order->restore();
        return redirect()->back();
    }

    public function hardDelete($id)
    {
        $order = Order::find($id);
        $order->forceDelete();
        return redirect()->back();
    }

}
