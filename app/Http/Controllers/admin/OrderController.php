<?php

namespace App\Http\Controllers\admin;

use App\Events\OrderTaken;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $orders = Order::paginate(6);
        $orders = Order::latest()->paginate(8);
        return view('admin.Orders.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();

        event(new OrderTaken($order->user, $order->product_name));

        return redirect()->route('admin.orders.index')->with('msg', "$order->product_name Order for {$order->user->name} has been taken");
    }
}
