<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Method to display products
    public function indexx()
    {
        // Fetch all products from the 'products' table
        $products = Product::all();

        // Pass the products data to the view
        return view('shop', compact('products'));
    }

// Store method for product creation
public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'product_name' => 'required|string|max:255',
        'category' => 'required|string',
        'buy_price' => 'required|numeric',
        'sell_price' => 'required|numeric',
        'old_price' => 'nullable|numeric',
        'stock_quantity' => 'required|integer',
        'size' => 'required|string',
        'color' => 'required|string',
        'description' => 'nullable|string',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Store the product image if uploaded
    if ($request->hasFile('product_image')) {
        $imagePath = $request->file('product_image')->store('uploads/product_images', 'public');
        $validatedData['product_image'] = $imagePath;
    }

    // Create the product
    Product::create($validatedData);

    // Redirect or return response
    return redirect()->back()->with('success', 'Product added successfully!');
}

public function editProduct($id)
{
    // Fetch product by ID
    $product = Product::findOrFail($id);
    
    // Return the edit view and pass the product data
    return view('admin.edit_products', compact('product'));
}

public function updateProduct(Request $request, $id)
{
    // Find the product by ID
    $product = Product::findOrFail($id);

    // Validate the request data (optional)
    $validatedData = $request->validate([
        'product_name' => 'required|string|max:255',
        'category' => 'required|string',
        'buy_price' => 'required|numeric',
        'sell_price' => 'required|numeric',
        'old_price' => 'nullable|numeric',
        'stock_quantity' => 'required|integer',
        'size' => 'required|string',
        'color' => 'required|string',
        'description' => 'nullable|string',
        'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    
    $product->fill($validatedData);

    
    if ($request->hasFile('product_image')) {
        
        if ($product->product_image && file_exists(public_path('storage/' . $product->product_image))) {
            Storage::delete('public/' . $product->product_image);
        }

        
        $imagePath = $request->file('product_image')->store('uploads/product_images', 'public');
        $product->product_image = $imagePath;  // Set the new image path
    }

    
    $product->save();

    
    return redirect()->back()->with('success', 'Product updated successfully!');
}

}