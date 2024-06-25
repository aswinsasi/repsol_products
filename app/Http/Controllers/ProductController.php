<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Product::create($request->only('name'));

        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $product->update($request->only('name'));

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        if (empty($query)) {
            $products = collect(); // Create an empty collection
            $hasResults = false;
        } else {
            // Tokenize the query by splitting into individual words
            $tokens = explode(' ', $query);

            // Build the query dynamically to search for each token independently
            $productsQuery = Product::query();
            foreach ($tokens as $token) {
                $productsQuery->where('name', 'LIKE', "%{$token}%");
            }

            // Get the results
            $products = $productsQuery->get();
            $hasResults = $products->isNotEmpty();
        }

        return view('products.search', compact('products', 'hasResults'));
    }
}