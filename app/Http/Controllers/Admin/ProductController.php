<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
class ProductController extends Controller
{
    public function index()
    {
    	//listado
    	$products = Product::order_by('name')->paginate(10);
    	// return view(admin.products.index)->with(compact('products'));
    }

    

    public function create()
    {
    	//formulario
        $categories = Category::order_by('name')->get();
    	return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
    	

    	$this->validate($request,Product::$rules,Product::$messages);

    	//registrar nuevo producto en la bd
    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save();//INSERT

    	//return redirect('/admin/products');
    }

    public function edit($id)
    {
    	//formulario de edicion
        $categories = Category::order_by('name')->get();
    	$product = Product::find($id);
    	//return view('admin.products.edit')->with(compact('product','categories')); 

    }

    public function update(Request $request, $id)
    {
    	
    	$this->validate($request,Product::$rules,Product::$messages);

    	//actualizar producto en la base de datos
    	$product = Product::find($id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
    	$product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
    	$product->save();//UPDATE

    	//return redirect('/admin/products');
    }

    public function destroy($id)
    {
    	//actualizar producto en la base de datos
    	$product = Product::find($id);    	
    	$product->delete();//DELETE

    	//return back();
    }
    	
}
