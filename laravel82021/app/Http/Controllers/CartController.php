<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $data = [];
        $data['products'] = Product::all();
        return view('cart.index');
    }

    public function home()
    {
        return redirect()->route('home.index');
    }
}
