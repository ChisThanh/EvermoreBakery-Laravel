<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('clients.home');
    }

    public function blog()
    {
        return view('clients.blog');
    }

    public function about()
    {
        return view('clients.about');
    }

    public function contact()
    {
        return view('clients.contact');
    }

    public function checkout()
    {
        return view('clients.checkout');
    }

    public function cart()
    {
        return view('clients.cart');
    }
}
