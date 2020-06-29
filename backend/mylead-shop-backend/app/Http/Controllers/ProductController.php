<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(){

        $products = Product::all(); 

        // $products = Product::orderBy('price', 'desc')->get();
        // $products = Product::where('name', 'razer2')->get();
        // $products = Product::latest()->get();

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

    // public function store(){

    //     $product = new Product(); //creating new instance of "Pizza record" from table
        
    //     $product->type = request('type');
    //     $product->name = request('name');
    //     $product->price = request('price');
    //     $product->description = request('description');

    //     $product->save();

    //     // return redirect('/')->with('msg', 'Product has been added');
    // }

    public function store(){

        $product = new Product(); //creating new instance of "Pizza record" from table
        
        $product->type = request('type');
        $product->name = request('name');
        $product->price = request('price');
        $product->description = request('description');
        
        $product->save();

        return redirect('/')->with('msg', 'Product has been added');
        // return response()->json([
        //     "message"=>"product record created"
        // ], 201);
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
            $product->type = is_null(request('type')) ? $product->type : $product->request('type');
            $product->name = is_null(request('name')) ? $product->name : $product->request('name');
            $product->price = is_null(request('price')) ? $product->price : $product->request('price');
            $product->description = is_null(request('description')) ? $product->description : $product->request('description');

            $product->save();
        
            return redirect('/')->with('success', 'Product has been updated!');
        }else{
            return redirect('/')->with('fail', 'Product has NOT been updated!');
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
}
