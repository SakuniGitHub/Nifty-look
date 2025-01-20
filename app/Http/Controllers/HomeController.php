<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Productst;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Cart;
use App\Models\RentCart;
use App\Models\Rent;
use App\Models\Wishlist;
use App\Models\Supplier;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\SeasonalDiscount;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function copyProductsToProductst()
    {
        // Retrieve all data from the 'products' table
        $products = Productst::all();

        // Loop through each product and insert it into the 'productst' table
        foreach ($products as $product) {
            Rent::create([
                'product_name' => $product->product_name,
                'category' => $product->category,
                'rent_price' => ($product->sell_price*2)/10,
                'total_quantity' => $product->stock_quantity,
                'available_quantity' => $product->stock_quantity,
                'size' => $product->size,
                'color' => $product->color,
                'description' => $product->description,
                'product_image' => $product->product_image,
            ]);
        }

        return response()->json(['message' => 'Data copied successfully!'], 200);
    }

    public function addProducts()
    {
        return view('admin.add_products');
    }

    public function allProducts()
    {

        $products = DB::select("SELECT `id`, `product_name`, `category`, `buy_price`, `sell_price`, `old_price`, `stock_quantity`, `size`, `color`, `description`, `product_image`, `created_at`, `updated_at` FROM `products`");


        return view('admin.all_products', compact('products'));
    }


    public function index()
    {

        $users = User::all();


        return view('admin.all_customers', compact('users'));
    }


    public function showShop()
    {

        return view('shop');
    }

    public function contact()
    {

        return view('contact');
    }
    public function about()
    {
        return view('about');
    }
    public function addToCart($id, Request $request)
    {

        if (!Auth::check()) {
            return response()->json([
                'status' => 'error',
                'message' => 'You need to login first.',
                'redirect' => route('login')
            ]);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.'
            ]);
        }

        $user_id = Auth::id();

        $existingCartItem = Cart::where('user_id', $user_id)
            ->where('product_id', $product->id)
            ->where('checkout', false)
            ->first();

        if ($existingCartItem) {
            Log::info('item exist');
            // Update the quantity
            $existingCartItem->quantity = $existingCartItem->quantity + 1;
            $existingCartItem->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!'
            ]);
        } else {
            // Create product
            Log::info('item create');
            Cart::create([
                'user_id' => $user_id,
                'product_id' => $product->id,
                'product_name' => $product->product_name,
                'category' => $product->category,
                'buy_price' => $product->buy_price,
                'sell_price' => $product->sell_price,
                'old_price' => $product->old_price,
                'stock_quantity' => $product->stock_quantity,
                'size' => $product->size,
                'color' => $product->color,
                'description' => $product->description,
                'product_image' => $product->product_image,
                'date' => now(),
                'quantity' => 1
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Product added to cart successfully!'
            ]);
        }
    }

    public function addToWishlist(Request $request, $productId)
    {

        if (!Auth::check()) {
            return response()->json(['message' => 'Please login first'], 401);
        }

        $userId = Auth::id();

        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }


        $existingWishlistItem = Wishlist::where('user_id', $userId)
            ->where('product_id', $product->id)
            ->where('size', $request->input('size'))
            ->where('color', $request->input('color'))
            ->first();

        if ($existingWishlistItem) {
            return response()->json(['message' => 'Product already added to wishlist'], 409); // 409 Conflict
        }

        Wishlist::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'product_name' => $product->product_name,
            'category' => $product->category,
            'buy_price' => $product->buy_price,
            'sell_price' => $product->sell_price,
            'old_price' => $product->old_price,
            'stock_quantity' => $product->stock_quantity,
            'size' => $product->size,
            'color' => $product->color,
            'description' => $product->description,
            'product_image' => $product->product_image,
            'date' => now(),
        ]);

        return response()->json(['message' => 'Product added to wishlist successfully']);
    }

    public function showCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())
            ->where('checkout', false)
            ->where('quantity', '>', 0)
            ->get();

        $rentCartItems = RentCart::where('user_id', Auth::id())
            ->where('checkout', false)
            ->where('quantity', '>', 0)
            ->get();
        Log::info('cart-item update - ' . $cartItems);
        Log::info('rent-cart-item update - ' . $rentCartItems);
        return view('cart', compact('cartItems', 'rentCartItems'));
    }

    public function myAccount()
    {



        return view('my_account');
    }
    public function showWishlist()
    {

        $wishlistItems = Wishlist::where('user_id', auth()->id)->get();


        return view('wishlist', compact('wishlistItems'));
    }

    public function deleteWishlistItem($id)
    {

        $wishlistItem = Wishlist::findOrFail($id);
        $wishlistItem->delete();


        return response()->json(['success' => 'Item deleted successfully!']);
    }



    public function update(Request $request)
    {

        $itemIds = $request->input('item_ids');
        $quantities = $request->input('quantities');

        Log::info('item update');

        foreach ($itemIds as $index => $id) {
            $cartItem = Cart::find($id);
            if ($cartItem) {
                $cartItem->quantity = $quantities[$index];
                $cartItem->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully.'
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return response()->json([
                'success' => true,
                'message' => 'Item removed from cart successfully.'
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Item not found.']);
    }


    public function welcome()
    {

        $latestProducts = Product::orderBy('created_at', 'desc')->take(8)->get();


        return view('welcome', compact('latestProducts'));
    }


    public function create_supplier()
    {
        return view('admin.add_supplier');
    }


    public function store_supplier(Request $request)
    {

        $validated = $request->validate([
            'supplier_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'supplier_code' => 'nullable|string|max:50',
        ]);


        Supplier::create($validated);


        return response()->json(['message' => 'Supplier added successfully!'], 200);
    }

    public function allSuppliers()
    {

        $suppliers = Supplier::all();


        return view('admin.all_suppliers', compact('suppliers'));
    }


    public function destroySupplier($id)
    {

        $supplier = Supplier::findOrFail($id);
        $supplier->delete();


        return response()->json(['message' => 'Supplier deleted successfully']);
    }


    public function editSupplier($id)
    {

        $supplier = Supplier::findOrFail($id);


        return view('admin.edit_supplier', compact('supplier'));
    }


    public function updateSupplier(Request $request, $id)
    {

        $request->validate([
            'supplier_name' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'address' => 'required|string',
            'supplier_code' => 'nullable|string|max:50',
        ]);


        $supplier = Supplier::findOrFail($id);
        $supplier->supplier_name = $request->supplier_name;
        $supplier->company_name = $request->company_name;
        $supplier->email = $request->email;
        $supplier->phone_number = $request->phone_number;
        $supplier->address = $request->address;
        $supplier->supplier_code = $request->supplier_code;
        $supplier->save();


        return response()->json(['message' => 'Supplier updated successfully']);
    }


    public function deleteProduct($id)
    {

        $product = Product::find($id);

        if ($product) {

            $product->delete();


            return response()->json(['message' => 'Product deleted successfully.']);
        }


        return response()->json(['message' => 'Product not found.'], 404);
    }

    public function dashboard()
    {

        $usersCount = DB::table('users')->count();
        $suppliersCount = DB::table('suppliers')->count();
        $productsCount = DB::table('products')->count();

        return view('admin.dashboard', compact('usersCount', 'suppliersCount', 'productsCount'));
    }

    public function checkout()
    {
        Log::info('checkout');
        $cartItems = Cart::where('user_id', Auth::id())
            ->where('checkout', false)
            ->where('quantity', '>', 0)
            ->get();
        $rentCartItems = RentCart::where('user_id', Auth::id())
            ->where('checkout', false)
            ->where('quantity', '>', 0)
            ->get();
        $orderDate = now();
        $discounts = SeasonalDiscount::where('discount_from', '<=', $orderDate)
            ->where('discount_to', '>=', $orderDate)
            ->get();
        $highestDiscount = $discounts->max('discount_percentage');
        Log::info('highest-discount ' . $highestDiscount);
        Log::info('cart-item update - ' . $cartItems);
        Log::info('rent-cart-item update - ' . $rentCartItems);
        return view('checkout', compact('cartItems', 'rentCartItems','highestDiscount'));
    }

    public function placeOrder(Request $request)
    {
        Log::info('place-order');
        Log::info($request);

        $validator = Validator::make($request->all(), [
            'name'           => 'required|string|max:255',
            'phone'          => 'required|string|max:15',
            'city'        => 'required|string|max:255',
            'address'       => 'required|string|max:255',
            'locality'           => 'required|string|max:255',
            'total_price'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation errors',
                'errors'  => $validator->errors()
            ], 400);
        }

        $shipping_address = implode(', ', [
            $request->address,
            $request->locality,
            $request->city,
            $request->state
        ]);

        try {
            DB::beginTransaction();

            $orderDate = now();

            $discounts = SeasonalDiscount::where('discount_from', '<=', $orderDate)
                ->where('discount_to', '>=', $orderDate)
                ->get();

            $highestDiscount = $discounts->max('discount_percentage');

            $totalAmount = (float) str_replace(',', '', $request->total_price);

            $discountAmount = 0;

            if ($highestDiscount) {
                $discountAmount = ($highestDiscount / 100) * $totalAmount;
                $totalAmount -= $discountAmount;  // Apply discount to total amount
            }

            $order = Order::create([
                'customer_name'    => $request->name,
                'customer_email'   => Auth::user()->email,
                'customer_phone'   => $request->phone,
                'shipping_address' => $shipping_address,
                'total_amount'     => (float) str_replace(',', '', $request->total_price),
                'discount'         => $discountAmount,
                'payment'          => $totalAmount,
                'status'           => 'completed',
            ]);

            $cartItems = Cart::where('user_id', Auth::id())
                ->where('checkout', false)
                ->get();

            foreach ($cartItems as $item) {
                if ($item['quantity'] > 0) {

                    $product = Product::find($item['product_id']);
                    if ($product) {
                        // Check if stock quantity is sufficient
                        if ($product->stock_quantity < $item['quantity']) {
                            // Return error message
                            return back()->withErrors([
                                'stock_error' => "The requested quantity for {$product->product_name} is not available in stock.",
                            ]);
                        }

                        // Deduct quantity from stock
                        $product->stock_quantity -= $item['quantity'];
                        $product->save();

                        $subtotal = $item['quantity'] * $item['sell_price'];

                        if ($highestDiscount) {
                            $discountAmount = ($highestDiscount / 100) * $subtotal;
                            $subtotal -= $discountAmount;  // Apply discount to total amount
                        }

                        // Create OrderItem
                        OrderItem::create([
                            'order_id'     => $order->id,
                            'item_id'      => $product['reference_number'],
                            'quantity'     => $item['quantity'],
                            'price'        => $item['sell_price'],
                            'subtotal'     => $subtotal,
                        ]);
                    }
                }
            }

            Cart::whereIn('id', $cartItems->pluck('id'))
                ->update(['checkout' => true]);

            Log::info('place-order2');

            $rentCartItems = RentCart::where('user_id', Auth::id())
                ->where('checkout', false)
                ->get();

            Log::info($rentCartItems);

            foreach ($rentCartItems as $rentItem) {
                if ($rentItem['quantity'] > 0) {

                    $rent = Rent::find($rentItem['rent_id']);
                    if ($rent) {
                        // Check if available quantity is sufficient
                        if ($rent->available_quantity < $rentItem['quantity']) {
                            // Return error message
                            return back()->withErrors([
                                'rent_stock_error' => "The requested quantity for rental item {$rent->product_name} is not available in stock.",
                            ]);
                        }

                        // Deduct quantity from available stock
                        $rent->available_quantity -= $rentItem['quantity'];
                        $rent->save();

                        $rent_subtotal = $rentItem['quantity'] * $rentItem['rent_price'];

                        if ($highestDiscount) {
                            $discountAmount = ($highestDiscount / 100) * $rent_subtotal;
                            $rent_subtotal -= $discountAmount;  // Apply discount to total amount
                        }

                        // Create OrderItem
                        OrderItem::create([
                            'order_id'     => $order->id,
                            'item_id'      => $rent['reference_number'],
                            'quantity'     => $rentItem['quantity'],
                            'price'        => $rentItem['rent_price'],
                            'subtotal'     => $rent_subtotal,
                        ]);
                    }
                }
            }

            RentCart::whereIn('id', $rentCartItems->pluck('id'))
                ->update(['checkout' => true]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Order created successfully with items.',
                'order_refno' => $order->reference_number,
                'order_date' => $order->created_at,
                'total_amount' => $order->payment,
                'data' => $order->load('items')
            ], 201);
        } catch (\Exception $e) {
            Log::info($e);

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Failed to create the order.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }
    public function create_seasonal_offer()
    {
        $discounts = SeasonalDiscount::all();  // This fetches all discounts

        // Pass the discounts to the view
        return view('admin.add_seasonal_offer', compact('discounts'));
    }

    public function store_seasonal_offer(Request $request)
    {
        $validated = $request->validate([
            'discount_from' => 'required|date|before_or_equal:discount_to',
            'discount_to' => 'required|date|after_or_equal:discount_from',
            'discount_name' => 'required|string|max:255',
            'discount_percentage' => 'required|numeric|min:0.01|max:99.99',
        ]);
        SeasonalDiscount::create($validated);
        return response()->json(['message' => 'Supplier added successfully!'], 200);
    }


    public function destroyDiscount($id)
    {
        $discount = SeasonalDiscount::findOrFail($id);
        $discount->delete();

        return response()->json(['message' => 'Discount deleted successfully!'], 200);
    }
}
