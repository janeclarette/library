<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminRegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ChartController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:admin', 'verified'])->group(function () {
    Route::get('/author', [AuthorController::class, 'index'])->name('authors.index');
    Route::get('/author/create', [AuthorController::class, 'create'])->name('authors.create');
    Route::post('/author/store', [AuthorController::class, 'store'])->name('authors.store');
    Route::get('/{id}/edit', [AuthorController::class, 'edit'])->name('authors.edit');
    Route::put('/authors/{id}', [AuthorController::class, 'update'])->name('authors.update');
    Route::get('/{id}/delete', [AuthorController::class, 'delete'])->name('authors.delete');

    Route::get('/book', [BookController::class, 'index'])->name('books.index');
    Route::get('/book/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/book', [BookController::class, 'store'])->name('books.store');
    Route::get('/book/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/{book}/update', [BookController::class, 'update'])->name('books.update');
    Route::get('/books/{book}/delete', [BookController::class, 'delete'])->name('books.delete');

    Route::get('/genre', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/genre/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/genre', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/genres/{genre}/edit', [GenreController::class, 'edit'])->name('genres.edit');
    Route::put('/genres/{genre}', [GenreController::class, 'update'])->name('genres.update');
    Route::get('/genre/{id}', [GenreController::class, 'delete'])->name('genres.delete');

    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::get('/suppliers/create', [SupplierController::class, 'create'])->name('suppliers.create');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::get('/suppliers/{supplier}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::get('/suppliers/{supplier}', [SupplierController::class, 'delete'])->name('suppliers.delete');


Route::get('/admin/dashboard', [UserController::class, 'showDashboard'])->name('admin.dashboard');
Route::post('/admin/user/{user}/activate', [UserController::class, 'activate'])->name('admin.user.activate');
Route::put('/admin/user/{user}/deactivate', [UserController::class, 'deactivate'])->name('admin.user.deactivate');
Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index');
Route::get('orders/{order}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
Route::put('orders/{order}', [OrderController::class, 'update'])->name('admin.orders.update');
Route::get('/users/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::put('/profile/update-image', [ProfileController::class, 'updateImage'])->name('profile.update-image');

    Route::post('/cart/add/{book}', [CartController::class, 'add'])->name('cart.add');

    Route::get('/cart', [CartController::class, 'index'])->name('cart'); // Update the route name
    Route::post('/reduce-by-one/{id}', [CartController::class, 'reduceByOne'])->name('reduceByOne');
    Route::post('/remove-item/{id}', [CartController::class, 'removeItem'])->name('removeItem');

    Route::post('/cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');


   


});



Route::get('/dashboard', [DashboardController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/viewproduct/{id}', [DashboardController::class, 'view'])->middleware(['auth', 'verified'])->name('viewproduct');

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');



require __DIR__.'/adminauth.php';



Route::get('/checkout/dashboard', [CheckoutController::class, 'showDashboard'])->name('checkout.dashboard');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.show');
Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');


Route::post('/checkout/dashboard', [CheckoutController::class, 'showDashboard'])->name('checkout.dashboard');
Route::post('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [CheckoutController::class, 'placeOrder'])->name('place-order');
Route::get('/order/dashboard', [OrderController::class, 'dashboard'])->name('order.dashboard');

Route::get('/charts/top-selling-books', [ChartController::class, 'topSellingBooks']);
Route::get('/charts/revenue-by-genre', [ChartController::class, 'revenueByGenre']);
Route::get('/charts/monthly-sales-trend', [ChartController::class, 'monthlySalesTrend']);