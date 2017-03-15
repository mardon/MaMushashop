<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', ['products' => $products]);
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product_edit', ['product' => $product]);
    }

    public function update($id, Request $request)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->image)
        {
            $image = $request->image;
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('products/' . $filename);
            Image::make($image->getRealPath())->resize(180, 240)->save($path);
            $product->image = $filename;
        }
        $product->save();
        return redirect('/admin/products');
    }
}
