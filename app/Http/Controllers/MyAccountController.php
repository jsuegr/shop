<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\User;
use App\UserRol;

class ProductController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        $roles = UserRol::orderBy('name')->get();
        $user = User::find(auth()->user()->id);
        return view('admin.users.edit')->with(compact('user', 'roles')); // form de edición
    }

    public function update(Request $request)
    {
        $this->validate($request);
        // dd($request->all());
        $user = User::find(auth()->user()->id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->username = $request->input('username');
        $user->userrol_id = $request->userrol_id;
        $user->save(); // UPDATE
        return redirect('/myaccount/edit');
    }

    public function destroy()
    {
        $user = User::find(auth()->user()->id);
        $user->status=0;
        $product->save(); // Dar de baja
        return redirect('/');
    }

}
