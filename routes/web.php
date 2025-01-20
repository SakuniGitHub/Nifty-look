<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route to checkout view
    Route::post('checkout', [HomeController::class, 'checkout'])->name('checkout');
    // Route to place order
    Route::post('place-order', [HomeController::class, 'placeOrder'])->name('place-order');
    // Route to order finish UI
    Route::get('/order-finished/{order}', [HomeController::class, 'showOrderFinished'])->name('order-finished');
});

Route::get('/admin/register', function () {
    return view('admin.admin_register');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard2');
});

// Route::get('/admin/dashboard', [HomeController::class, 'dashboard'])->name('dashboard2');

Route::get('admin/add_products', [HomeController::class, 'addProducts']);
Route::get('/admin/all-products', [HomeController::class, 'allProducts'])->name('admin.all_products');
Route::get('/products', [ProductController::class, 'indexx'])->name('products.index');
Route::get('edit-product/{id}', [ProductController::class, 'editProduct'])->name('edit-product');
Route::post('update-product/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
Route::delete('/delete-product/{id}', [HomeController::class, 'deleteProduct'])->name('delete-product');

Route::get('/customers', [HomeController::class, 'index'])->name('customers.index');
Route::post('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('cart.add');
Route::post('/wishlist/add/{productId}', [HomeController::class, 'addToWishlist'])->name('wishlist.add');
Route::get('/cart', [HomeController::class, 'showCart'])->name('cart.show');
Route::get('/my_account', [HomeController::class, 'myAccount'])->name('profile.show');
Route::post('/cart/update', [HomeController::class, 'update'])->name('cart.update');
Route::delete('/cart/delete', [HomeController::class, 'destroy'])->name('cart.delete');
Route::get('/wishlist', [HomeController::class, 'showWishlist'])->name('wishlist');
Route::delete('/wishlist/delete/{id}', [HomeController::class, 'deleteWishlistItem'])->name('wishlist.delete');

Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/admin/suppliers/add', [HomeController::class, 'create_supplier'])->name('suppliers.create');
Route::post('/suppliers/store', [HomeController::class, 'store_supplier'])->name('suppliers.store');

// Route to display all suppliers
Route::get('admin/all-suppliers', [HomeController::class, 'allSuppliers'])->name('suppliers.index');

// Route to delete a supplier
Route::delete('delete-supplier/{id}', [HomeController::class, 'destroySupplier'])->name('suppliers.destroy');

Route::get('edit-supplier/{id}', [HomeController::class, 'editSupplier'])->name('suppliers.edit');

// Route to handle the update process
Route::post('update-supplier/{id}', [HomeController::class, 'updateSupplier'])->name('suppliers.update');

// Route to handle rental process
Route::get('/rentals', [RentController::class, 'index'])->name('rentals.index');

// Route to handle rental add to cart
Route::post('/add-to-rental-cart/{id}', [RentController::class, 'addToCart'])->name('rental-cart.add');

Route::post('/rent-cart/update', [RentController::class, 'update'])->name('rent.update');

// Route::post('/copy-products-to-productst', [HomeController::class, 'copyProductsToProductst'])->name('copy-products-to-productst');

Route::get('/admin/seasonal-discounts/add', [HomeController::class, 'create_seasonal_offer'])->name('seasonal-offer.create');
// Route::get('/admin/suppliers/add', [HomeController::class, 'create_supplier'])->name('suppliers.create');
Route::post('/seasonal-discounts/store', [HomeController::class, 'store_seasonal_offer'])->name('seasonal-offer.store');
// Route::post('/suppliers/store', [HomeController::class, 'store_supplier'])->name('suppliers.store');
Route::delete('/discounts/{id}', [HomeController::class, 'destroyDiscount'])->name('discounts.destroy');
Route::get('/copy-products-to-productst', [HomeController::class, 'copyProductsToProductst'])->name('copy-products-to-productst');
require __DIR__ . '/auth.php';
