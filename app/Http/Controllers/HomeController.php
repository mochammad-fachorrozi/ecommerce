<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.index');
    }

    public function product()
    {
        return view('home.product');
    }

    public function cart()
    {
        return view('home.cart');
    }

    public function checkout()
    {
        return view('home.checkout');
    }

    public function myAccount()
    {
        return view('home.my-account');
    }

    public function wishlist()
    {
        return view('home.wishlist');
    }

    public function login()
    {
        return view('home.login');
    }

    public function contact()
    {
        return view('home.contact');
    }
}
