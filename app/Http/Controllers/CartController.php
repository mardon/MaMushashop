<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartData = $request->session()->get('cart');
        $cart = [];
        $sum = 0;
        if ($request->session()->has('cart')) {
            foreach ($cartData as $key => $value) {
                $product = Product::where('id', '=', $key)->get()->toArray();
                $cart_item['item'] = $product['0'];
                $cart_item['total_price'] = $value['qty'] * $product['0']['price'];
                $cart_item['qty'] = $value['qty'];
                $sum = $sum + $cart_item['total_price'];
                array_push($cart, $cart_item);
            }
        }
        return view('cart')->with('cart',$cart)->with('sum',$sum);
    }

    public function postAdd(Request $request) {
        $id = $request->input('product_id');
        $session = $request->session();
        $cartData = ($session->get('cart')) ? $session->get('cart') : array();
        if (array_key_exists($id, $cartData)) {
            $cartData[$id]['qty']++;
        } else {
            $cartData[$id] = array(
                'qty' => 1
            );
        }
        $request->session()->put('cart', $cartData);
        return redirect()->back()->with('message', 'Product Added Successfully!');
    }
}
