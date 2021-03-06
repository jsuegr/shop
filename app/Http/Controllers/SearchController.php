<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    public function show(Request $request)
    {	
    	$query = $request->input('query');
    	$products = Product::where('name', 'like', "%$query%")->paginate(5);
    	//dd($products->count());
    	if ($products->count() == 1) {
    		$id = $products->first()->id;
    		return redirect("products/$id"); // 'products/'.$id
    	}
        
    	return view('search.show')->with(compact('products', 'query'));
        //return $products;
    }

    public function data()
    {
    	$products = Product::pluck('name');

        //dd($products);
    	return $products;
    }
}
