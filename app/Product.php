<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //validar
    public static $messages = [
        'name.required' => 'Es necesario ingresar un nombre para el producto.',
        'name.min' => 'El nombre del producto debe tener almenos 3 caracteres' ,
        'description.required' => 'La descripción es un campo obligatorio',
        'description.max' => 'La descripción solo admite hasta 200 caracteres',
        'price.required' => 'El campo precio es obligatorio',
        'price.numeric' => 'El campo precio debe ser numérico',
        'price.min' => 'El campo precio debe ser mínimo 0'
    ];

    public static $rules =[
        'name' => 'required|min:3',
        'description' => 'required|max:200',
        'price' => 'required|numeric|min:0'
    ];

    // $product->category
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    //$product->product_feautes
    public function product_features()
    {
        return $this->hasMany(ProductFeature::class);
    }
    
    // $product->images
    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute()
    {
        $featuredImage = $this->images()->where('featured', true)->first();
        if (!$featuredImage)
            $featuredImage = $this->images()->first();

        if ($featuredImage) {
            return $featuredImage->url;
        }

        // default
        return '/images/default.gif';
    }

    public function getCategoryNameAttribute()
    {
        if ($this->category)
            return $this->category->name;

        return 'General';
    }
}
