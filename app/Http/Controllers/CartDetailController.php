<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CartDetail;
class CartDetailController extends Controller
{
    //

    public function store(Request $request)
    {
    	$cartDetail = new CartDetail();
    	$cartDetail->cart_id = auth()->user()->cart->id; //cart_id carrito de compras activo
    	$cartDetail->product_id=$request->product_id;
    	$cartDetail->quantity = $request->quantity;
    	$cartDetail->save();

        $notificacion = "El producto se ha cargado a tu carrito de compras correctamente";
    	return back()->with(compact('notificacion'));
    }

    public function destroy(Request $request)
    {
        $cartDetail = new CartDetail::find($request->cart_detail_id);
        
        if($cartDetail->cart_id==auth()->user()->cart->id)
            $cartDetail->delete();

        $notificacion = 'El producto se ha eliminado correctamente';


        return back()->with(compact('notification'));
    }
}
