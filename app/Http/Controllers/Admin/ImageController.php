<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
class ImageController extends Controller
{
    //
    public function index($id)
    {
    	//vista de imagenes del producto
    	$product= Product::find($id);
    	$images = $product->images;
    	//return view('admin.products.images.index')->with(compact('product','images'));
    }

    public function store(Request $request, $id)
    {
    	//guardar imagen en Amazon
    	$file = $request->file('photo');

    	//guardar en la bd
    	$productImage = new ProductImage();
    	$productImage->image = $imageUrl;
    	$productImage->product_id=$id;  
    	$producImage->save();        
    }

    public function destroy(Request $request,$id)
    {
    	$productImage = ProductImage::find($request->image_id);
    	$productImage->delete();
    }

    public function select($idProducto, $idImage )
    {
        ProductImage::where('product_id',$idProducto)->update([
            'featured'->false
        ]);

        $productImage = ProductImage::find($idImage);
        $productImage->featured = true;
        $productImage->save();

        return back();
    }

}
