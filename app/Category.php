<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class Category extends Model
{

	public static $messages = [
		'name.required' => 'Es necesario ingresar un nombre para el producto.',
		'name.min' => 'El nombre de la categoría debe tener almenos 3 caracteres' ,
		'description.max' => 'La descripción solo admite hasta 250 caracteres'
	];

	public static $rules =[
		'name' => 'required|min:3',
		'description' => 'max:250'
	];

	protected $fillable = ['name', 'description'];

    //$category->product

    public function products()
    {
    	return $this->hasMany(Product::class);
    }


    //muestra la imagen de la categoria. en este caso selecciona una imagen destacada del algun producto
    public function getFeaturedImageUrlAttribute()
    {
        if($this->image)
            return '/images/categories/'.$this->image;
        //else
    	$firstroduct = $this->products()->first();
    	   return $firstProduct->featured_image_url;

        return '/images/default.gif'
    }
}
