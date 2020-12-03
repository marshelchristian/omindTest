<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Product;
use Validator;
use Response;
// use Illuminate\Support\Facades\input;

class ProductController extends Controller
{
    public function product() {
        // return $data = "All Products";
        $product = Product::all();
        return response()->json($product, 200);
    }

    public function productDetail($id) {
        // $data = "Product Owner: " . Auth::user()->name;
        $product = Product::find($id);
        return response()->json($product, 200);
    }

    public function addProduct(Request $request)
    {
            $rules = array(
                'title' =>  'required', 
                'body' =>  'required', 
            );
            $validator = validator::make($request->all(), $rules);
            if ($validator->fails()) 
            {
                return response::json(array('errors' => $validator->getMessageBag()->toarray()));
            }
            else
            {
                $product = new Product;
                $product->title = $request->title;
                $product->body = $request->body;
                $product->save();
                return response()->json($product);
            }

    }

    public function editProduct(Request $request)
    {
        $product = Product::find($request->id);
        $product->title = $request->title;
        $product->body = $request->body;
        $product->save();

        return response()->json($product);
    }

    public function deleteProduct($id){
        $product = Product::find($id)->delete();
        return response()->json($product);
    }
}
