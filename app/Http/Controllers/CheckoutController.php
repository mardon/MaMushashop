<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Order;
use App\Product;
use App\Order_product;
use App\Mail\NewOrder;
use Mail;


class CheckoutController extends Controller
{
    public function index() {
        return view('checkout');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'street' => 'required',
            'city' => 'required',
            'psc' => 'required',
            'email' => 'required|email',
            'phone' => 'required'
        ]);

        $customer = new Customer($request->all());
        $customer->save();

        $customer_id = $customer->id;
        $order = new Order(['user_id' => $customer_id, 'status' => 0]);
        $order->save();

        $order_id = $order->id;

        $cartData = $request->session()->get('cart');

        $email_data = array();
        $id = 1;
        foreach ($cartData as $key => $value) {
            $product = Product::where('id', '=', $key)->get()->toArray();
            $price = $product['0']['price'];
            $order_product = new Order_product([
                'order_id' => $order_id,
                'product_id' => $key,
                'quantity' => $value['qty'],
                'price' => $price,
            ]);
            $order_product->save();
            $email_data[$id]['product'] = $product['0']['name'];
            $email_data[$id]['qty'] = $value['qty'];
            $email_data[$id]['total'] = $price;
            $id++;
        }

        session()->forget('cart');

        Mail::to('mar.don@seznam.cz')->send(new NewOrder($email_data, $customer));

        return redirect('/')->with('message', 'Vaše objednávka byla odeslána');
    }
}
