<?php

namespace App\Http\Controllers\Admin;

use App\CartDetail;
use App\Http\Controllers\Controller;

use App\ProductImage;
use Illuminate\Http\Request;
use App\User;
use App\UserRol;

class UsersController extends Controller
{
    public function index()
    {
    	$users = User::paginate(10);
        $roles = UserRol::get();
    	return view('admin.users.index')->with(compact('users','roles')); // listado
    }

    public function create()
    {
        $roles = UserRol::orderBy('id')->get();
    	return view('admin.users.create')->with(compact('roles')); // formulario de registro
    }

    
    public function store(Request $request)
    {
        $this->validate($request,User::$rules,User::$messages);
        $user = new User();
        
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->username = $request->input('username');
        $user->userrol_id = $request->input('userrol_id');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = public_path() . '/images/users';
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $moved = $file->move($path, $fileName);
            
            $user->photo = $fileName;
            
        }else{
            $user->photo = 'default.jpg';
        }        


        $user->save(); // UPDATE
        //dd($rol->name);
        return redirect('admin/users/create');
    }


    public function edit($id)
    {
        $roles = UserRol::orderBy('name')->get();
        $user = User::find($id);
        
        return view('admin.users.edit')->with(compact('user', 'roles')); // form de edición
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, $rules);
        
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');
        $user->username = $request->input('username');
        $user->userrol_id = $request->userrol_id;
        $user->save(); // UPDATE

        return redirect('/admin/users');
    }

    public function destroy($id)
    {
        

        $user = User::find($id);
        $user->status=0;
        $product->save(); // Dar de baja

        return back();
    }

}
