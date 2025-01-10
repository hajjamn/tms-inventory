<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        // Search by name
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Search by barcode
        if ($request->has('barcode') && $request->barcode != '') {
            $query->where('barcode', 'like', '%' . $request->barcode . '%');
        }

        // Get the filtered products
        $products = $query->get();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        Product::create($request->validated());

        return redirect()->route('admin.products.index')->with('success', 'Prodotto creato con successo.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //DIFFERENT SYNTAX
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        // Update the specific product instance
        $product->update($request->validated());

        return redirect()->route('admin.products.index')->with('success', 'Prodotto modificato con successo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Prodotto eliminato con successo.');
    }
}
