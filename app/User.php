<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\UserRol;
class User extends Authenticatable
{
    use Notifiable;

    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el usuario.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
    ];
    public static $rules = [
        'name' => 'required|min:3',
        'username' => 'unique:users,username|required|max:10|min:3',
        'email' => 'email|unique:users,email',
        'phone' => 'min:8|numeric',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address', 'username'
    ]; // admin => true
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {   

        return $this->belongsTo(UserRol::class, 'userrol_id');
    }

    public function addresses(){
      return $this->hasMany(Address::class);
    }

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // cart_id
    public function getCartAttribute()
    {
        $cart = $this->carts()->where('status', 'Active')->first();
        if ($cart)
            return $cart;

        // else
        $cart = new Cart();
        $cart->status = 'Active';
        $cart->user_id = $this->id;
        $cart->save();

        return $cart;
    }

    public function hasRole($user)
    {
        //if(auth()->user()->userrol_id==$rol_id)
          //  return true;
        return $user->userrol_id;
    }

    public function getProfilePhotoAttribute(){
        $photo = $this->photo;
        if (substr($photo, 0, 4) === "http") {
            return $photo;
        }
        return '/images/users/'.$photo;
    }

}
