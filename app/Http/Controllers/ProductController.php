<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * index shows the landing products dashboard page, all the products from adn available in the database.
     */
    public function index()
    {
        $stored_products_from_db = Product::OrderBy('id' , 'desc')->get();
        
        return view('products.products_dashboard', compact('stored_products_from_db'));
    }

    /**
     * showing the form for the user to register or create the product.
     */
    public function create()
    {
        return view('products.create_product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $captured_products_details = $request->validate([
            'name' => 'required|min:3|max:40',
            'description' => 'nullable|max:200',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category' => 'required',
        ]);

        $storage_carrier = Product::create($captured_products_details);
        return redirect()->route('products.index')->with('success', 'product created successfullly');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product_fetched_to_edit = Product::FindorFail($id);
        return view('products.edit_product' , compact('product_fetched_to_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $captured_products_details = $request->validate([
            'name' => 'required|min:3|max:40',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category' => 'required',
        ]);

        $product_fetched_to_edit = Product::FindorFail($id);

        $product_fetched_to_edit->update($captured_products_details);

        return redirect()->route('products.index')->with('success','Product updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fetch_product_to_be_deleted = Product::FindorFail($id);
        $fetch_product_to_be_deleted->delete();

        return redirect()->route('products.index')->with('success' , 'Product deleted successfully');

    }
}
