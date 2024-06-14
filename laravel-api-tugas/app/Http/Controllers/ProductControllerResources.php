<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductControllerResources extends Controller
{
    public function index(Product $product){
        $data = $product-> all();

        return new ProductResource(200, "Success", $data);
    }

    public function create()
    {
        // Returning a template for creating a new product
        $template = [
            "name" => "",
            "desc" => "",
            "qty" => 0,
            "price" => 0.0
        ];

        return response()->json(["data" => $template, "message" => "Template for creating a new product"], 200);
    }

    public function store(Request $request){
        $dataRequest = $request->all(["name", "desc", "qty", "price"]);

        $validate = Validator::make($dataRequest, [
            "name"=>["required", "max:100"],
            "desc"=>["required", "max:100"],
            "qty"=>["required", "integer"],
            "price"=>["required", "numeric"],
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), 400);
        }
        $data = Product::create($dataRequest);

        return new ProductResource(200, "Created Successfully", $data);
    }

    public function show(Product $product){
        return new ProductResource(200, "Success", $product);
    }

    public function edit(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        return new ProductResource(200, "Success", $product);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $dataRequest = $request->all(["name", "desc", "qty", "price"]);

        $validate = Validator::make($dataRequest, [
            "name"=>["sometimes", "required", "max:100"],
            "desc"=>["sometimes", "required", "max:100"],
            "qty"=>["sometimes", "required", "integer"],
            "price"=>["sometimes", "required", "numeric"],
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), 400);
        }

        $product->update($dataRequest);

        return new ProductResource(200, "Updated Successfully", $product);
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Deleted Successfully'], 200);
    }
}
