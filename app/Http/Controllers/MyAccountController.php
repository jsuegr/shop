<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;
use App\User;
use App\UserRol;

class MyAccountController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit()
    {
        $roles = UserRol::orderBy('name')->get();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $rol = UserRol::find($user->userrol_id);
        //$photo = '/images/users/'.$user->photo;
        return view('admin.users.show')->with(compact('user', 'roles', 'rol')); // form de edición
    }

    public function update(Request $request)
    {
        //$this->validate($request);
        // dd($request->all());
        $user = User::find(auth()->user()->id);
        $rol = UserRol::find($user->userrol_id);
        $user->name = $request->input('name');
        //$user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        //$user->address = $request->input('address');
        $user->username = $request->input('username');
        

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = public_path() . '/images/users';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            $user->photo = $fileName;
            
        }        


        $user->save(); // UPDATE
        //dd($rol->name);
        return view('admin.users.show')->with(compact('user','rol'));
    }

    public function destroy()
    {
        $user = User::find(auth()->user()->id);
        $user->status=0;
        $product->save(); // Dar de baja
        return redirect('/');
    }

}
