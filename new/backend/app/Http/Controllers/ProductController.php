<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
//use App\Services\Header;

class ProductController extends Controller
{

    public function run()
    {

        return response()->json(["msg" => "Test."], 200);

    }

    public function index(Product $product, Request $request) {

        //$request->query();
        if($request->query('name') && $request->query('desc')) {
        
        $product = Product::create($request->all());
        return response()->json($request->query(), 200);

         }

         else{ return response()->json(["msg" => "Error. Try Again with 'name' and 'desc'."], 400);
            }


     }

    public function all()
    {
     
        return response()->json(Product::all());
    }

    public function showOne($id)
    {
        return response()->json(Product::find($id));
    }

    public function create(Request $request)
    {
     
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
        ]);


        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function update($id, Request $request)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return response('Deleted Successfully', 200);
    }


        public function deleteAll()
    {
        Product::truncate();
        return response('All Deleted Successfully', 200);
    }
}