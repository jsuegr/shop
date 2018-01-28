<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$user_id = auth()->user()->id;
    	$carts = Cart::where('user_id',$user_id)->get();
    	//dd($user_id);
    	//dd($carts);
        return view('carrito.home')->with(compact('carts'));
    	//return "home";
    }

    

}
