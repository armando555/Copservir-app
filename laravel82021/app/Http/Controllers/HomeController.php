<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(  )
    {
        return redirect()->route('home.index');
    }

    public function home()
    {
        return redirect()->route('home.index');
    }
}
