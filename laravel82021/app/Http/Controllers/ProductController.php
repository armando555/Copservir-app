<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::all();
        return view('products.index')->with("data", $data);
    }

    public function home()
    {
        return redirect()->route('home.index');
    }
    public function add($id,Request $request)
    {
        $products = $request->session()->get("products");
        $products [$id] = $id;
        $quantity = $request->session()->get("quantityFlower");
        $quantity[$id] = $request["quantity"];
        $request->session()->put('quantity', $quantity);
        $request->session()->put('products', $products);
        dd($products,$quantity);
        return back();
    }
}
