<?php

namespace App\Http\Controllers;
use App\Models\product;

use Illuminate\Http\Request;

class productsController extends Controller
{
    public function getProducts()
    {
        $products = product::select('*')
                            ->get();
        return response(['data'=> $products, 'Message'=> 'Data Fetched.']);
    }

    public function addProduct(Request $request)
    {   
        $validatedData = $request->validate([
            'category'=>'required',
            'image'=>'required|mimes:jpg,jpeg,png',
            'description'=>'required',
            'cost' => 'required',
            'price' => 'required'
        ]);

        $image = '';
        if($request->hasFile('image'))
        {
            $image_array = $request->file('image');
            $image_ext = $image_array->getClientOriginalExtension();
            $image = "img_".rand(123456,999999).".".$image_ext;
            $destination_path = public_path('/uploaded/');
            $image_array->move($destination_path,$image);
        }

        $validatedData['image'] = $image;
        $product = product::create($validatedData);

        return response(['data'=> $product, 'Message'=> 'New Product Added']);
    }

    public function updateProduct(Request $request,$id)
    {   
        $product = product::find($id);
        if(!$request->image)
        {
            $product->update($request->post());
        }
        else
        {
            $image = '';
            if($request->hasFile('image'))
            {
                $image_array = $request->file('image');
                $image_ext = $image_array->getClientOriginalExtension();
                $image = "img_".rand(123456,999999).".".$image_ext;
                $destination_path = public_path('/uploaded/');
                $image_array->move($destination_path,$image);
            }
            $product->update([
                'category' => $request->category,
                'image' => $image,
                'description' => $request->description,
                'cost' => $request->cost,
                'price' => $request->price,
            ]);
        }
        

        return response(['data'=> $product, 'Message'=> 'Product updated']);
    }

    public function deleteProduct($id)
    {
        $product = new product();
        $product::destroy($id);
        return response(['message'=>'Product and all its related data deleted.']);
    }
}
