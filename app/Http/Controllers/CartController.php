<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;   
use App\User;
use App\Mail\NewOrder;
use Mail;
class CartController extends Controller
{
    //actualizar carrito activo del usuario en pendiente
    public function update()
    {
    	$client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date=Carbon::now();
    	$cart->save(); //UPDATE

    	$admins = User::where('admin', true)->get();
    	Mail::to($admins)->send(new NewOrder($client, $cart));

    	$notificacion="Tu pedido se ha registrado correctamente. Te contactaremos pronto vía mail.";
    	return back()->with(compact());
    }
}
