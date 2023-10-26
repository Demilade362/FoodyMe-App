<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(6);
        return view('home', compact('products'));
    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }
}
