<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return response()->json($product, 201);
    }

    public function show(string $id)
    {
    $product = Product::find($id);

    return response()->json($product);
    }

    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product->update($request->all());

        return response()->json($product);
    }

    public function destroy(string $id)
    {
    $product = Product::find($id);

    $product->delete();

    return response()->json([
        'message' => 'Produk berhasil dihapus'
    ]);
    }
}