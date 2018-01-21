<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
class CategoryController extends Controller
{
    public function index()
    {
    	//listado
    	$categories = Category::paginate(10);
    	// return view(admin.category.index)->with(compact('categories'));
    }

    

    public function create()
    {
    	//formulario

    	return view('admin.categories.create');
    }

    public function store(Request $request)
    {
    	//validars
    	$this->validate($request,Category::$rules,Category::$messages);

    	//registrar nuevo producto en la bd
    	Category::create($request->all());  //asignacion masiva

    	//return redirect('/admin/categories');
    }

    public function edit(Category $category)
    {
    	//formulario de edicion    
    	//return view('admin.categories.edit')->with(compact('category')); 

    }

    public function update(Request $request,Category $category)
    {
    	//validar
    	$this->validate($request,Category::$rules,Category::$messages);

    	//actualizar producto en la base de datos
    	$category->update($request->all());

    	//return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
    	//actualizar producto en la base de datos    	
    	$category->delete();//DELETE

    	//return back();
    }
    
}
