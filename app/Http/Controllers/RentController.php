<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\RentCart;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RentController extends Controller
{
    // Method to display rentals
    public function index()
    {
        // Fetch all rentals from the 'rentals' table
        $rentals = Rent::all();

        // Pass the rentals data to the view
        return view('rental', compact('rentals'));
    }

    public function addToCart($id)
    {
        Log::info($id);
        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You need to login first.',
                'redirect' => route('login')
            ]);
        }

        $rental = Rent::find($id);

        if (!$rental) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.'
            ]);
        }

        if ($rental->available_quantity <= 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not available.'
            ]);
        }

        $user_id = Auth::id();

        $existingRentCartItem = RentCart::where('user_id', $user_id)
            ->where('rent_id', $rental->id)
            ->where('checkout', false)
            ->first();

        if ($existingRentCartItem) {
            Log::info('rent item exist');
            // Update the quantity
            $existingRentCartItem->quantity = $existingRentCartItem->quantity + 1;
            $existingRentCartItem->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!'
            ]);
        } else {
            // Create product
            Log::info('rent item create');
            RentCart::create([
                'user_id' => $user_id,
                'rent_id' => $rental->id,
                'product_name' => $rental->product_name,
                'category' => $rental->category,
                'rent_price' => $rental->rent_price,
                'stock_quantity' => $rental->available_quantity,
                'size' => $rental->size,
                'color' => $rental->color,
                'description' => $rental->description,
                'product_image' => $rental->product_image,
                'date' => now(),
                'quantity' => 1
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!'
            ]);
        }
    }

    public function update(Request $request)
    {

        $itemIds = $request->input('item_ids');
        $quantities = $request->input('quantities');

        Log::info('cart-item update');

        foreach ($itemIds as $index => $id) {
            $rentCartItem = RentCart::find($id);
            if ($rentCartItem) {
                $rentCartItem->quantity = $quantities[$index];
                $rentCartItem->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.'
        ]);
    }
}
