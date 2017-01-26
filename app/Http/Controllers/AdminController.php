<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $orders = Order::with('items','customer')->orderBy('id', 'desc')->paginate(5);
        foreach ($orders as $order) {
            $items = Order::find($order->id)->items()->get();
            $sum_order[$order->id] = 0;
            foreach ($items as $item) {
                $sum_order[$order->id] += $item->pivot->quantity*$item->pivot->price;
            }
            $order['sum'] = $sum_order[$order['id']];
        }
        foreach ($orders as $order) {
            $order['name'] = ucfirst(substr($order->customer->firstname,0,1)).'.'.$order->customer->lastname;
        }
        return view('admin.orders', ['orders' => $orders]);
    }

    public function detail($id)
    {
        $order = Order::with('customer','items')->findOrFail($id);
        return view('admin.detail', ['order' => $order]);
    }

    public function status($id)
    {
        $order = Order::with('customer','items')->findOrFail($id);
        $order->status = !($order->status);
        $order->save();
        return view('admin.detail', ['order' => $order]);
    }
}
