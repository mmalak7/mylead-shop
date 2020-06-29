<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all(); 

        return view('products.index', [
            'products' => $products,
        ]);

        // return response($products, 200); // to jest używane do zwykłych zwrotów w formacie json - więc w zasadzie to przede wszystkim to idzie do ANGULARA
    }

    public function show($id){

        $product = Product::findOrFail($id);

        return view('products.show', ['product' => $product]);
        // return response($product, 200);
    }

    public function create(){
        return view('products.create');
    }

    public function store(){

         //creating new instance of "Product record" from table
         //first part related with API -> no enough time for configuring angular part :/
        // if(Product::where('name', request('name'))->exists()){
        //     $product = new Product();

        //     $product->type = $productOld->type;
        //     $product->name = $productOld->name;
        //     $product->price = request('price');
        //     $product->description = request('description');

        //     $product->save();

        //     return redirect('/')->with('msg', 'New price of product has been added');

        // } else {
        //     $product = new Product();
        //     $product->type = request('type');
        //     $product->name = request('name');
        //     $product->price = request('price');
        //     $product->description = request('description');

        //     $product->save();

        //     return redirect('/')->with('msg', 'Product has been added');
        // }
        // return response()->json([
        //     "message"=>"product record created"
        // ], 201);

        $product = new Product();
        $product->type = request('type');
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');

        $product->save();

        return redirect('/')->with('msg', 'Product has been added');
    }

    public function destroy($id){

        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/')->with('msgDel', 'Product has been deleted');
        // return response()->json([
        //     "message"=>'product deleted'
        // ], 201);
    }

    public function showUpdate($id){

        $product = Product::findOrFail($id);

        return view('products.update', ['product' => $product]);
    }

    public function update($id){
        if(Product::where('id', $id)->exists()){
            $product = Product::find($id);
            $product->type = is_null(request('type')) ? $product->type : request('type');
            $product->name = is_null(request('name')) ? $product->name : request('name');
            $product->price = is_null(request('price')) ? $product->price : request('price');
            $product->description = is_null(request('description')) ? $product->description : request('description');

            $product->save();

            // error_log($product);

            return redirect('/')->with('msgUpdate', 'Product has been updated!');

        } else {

            return redirect('/')->with('msgFail', 'Product has NOT been updated!');

        }
        //     return response()->json([
        //         'message' => 'record updated successfully'
        //     ], 201);
        // } else{
        //     return response()->json([
        //         'message' => 'product not found'
        //     ], 404);
        // }
    }

    public function search(){
        //This searching configuration is checking the spelling 1 to 1, so in case of
        //multiple product that contains other extra letters it's not showing up 
        //I guess that option search for "onChange" would be possible
        //but need to have a look for that more carefully -> Angular/React/Vue for sure have this option
        //look for project with beers !
        if(Product::where('name', request('q'))){
            $products = Product::where('name', request('q'))->get(); 
            error_log($products);

            return view('products.index', [
                'products' => $products,
            ]);
        } else {
            return redirect('/products')->with('msgSearch', 'Product do not exist!');
        }
    }
}
