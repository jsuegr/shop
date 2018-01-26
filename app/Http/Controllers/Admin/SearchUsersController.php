<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchUsersController extends Controller
{
    public function show(Request $request)
    {	
    	$query = $request->input('query');
    	$users = User::where('name', 'like', "%$query%")->orWhere( 'username','like', "%$query%")->paginate(10);
    	
    	if ($users->count() == 1) {
    		$id = $users->first()->id;
    		return redirect("users/$id"); // 'users/'.$id
          //  return $users;
    	}

    	return view('search.show')->with(compact('users', 'query'));
        //return $users;
    }

    public function data()
    {
    	$users = Product::pluck('name','last_name','username');
    	return $users;
    }
}
