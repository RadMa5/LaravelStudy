<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return Product::paginate(15);
    }

    public function show(Product $product){
        return $product;
    }

    public function store(Request $request){
        $product = Product::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
        ]);

        return $product;
    }

    public function destroy(Product $product){
        $product->delete();
        return response()->json([], 204);
    }
}
