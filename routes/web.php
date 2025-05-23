<?php

use App\Models\Menu;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\AddOrderController;
use App\Http\Controllers\OrderController;


// Landing page
Route::get('/', function () {
    return view('Welcome');
})->name('welcome');

// Authentication Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/signup', [LoginController::class, 'signUp'])->name('signup');
Route::post('/signup', [LoginController::class, 'signUpPost'])->name('signup.post');

// Routes that require authentication
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard-main');
    })->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Menu Routes
    Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/viewmenu', [MenuController::class, 'viewmenu'])->name('menu.viewmenu');

    // Table Routes
    Route::get('/table', [TableController::class, 'index'])->name('table.index');
    Route::get('/table/create', [TableController::class, 'create'])->name('table.create');
    Route::get('/table/viewtable', [TableController::class, 'viewtable'])->name('table.viewtable');
    Route::post('/table/store', [TableController::class, 'store'])->name('table.store');
    Route::get('/viewtable', [TableController::class, 'index'])->name('viewtable');


    // Other pages requiring authentication
    Route::get('/transactions', function () {
        return view('transactions');
    })->name('transactions');

    Route::get('/all-orders', function () {
        return view('Allorders');
    })->name('all-orders');

    Route::get('/salesanalytics', function () {
        return view('salesanalytics');
    })->name('sales-analytics');

    Route::get('/tables', function () {
        return view('tables');
    })->name('tables');



    Route::get('/addorders', [AddOrderController::class, 'index'])->name('addorders');
    Route::post('/addorders', [AddOrderController::class, 'store'])->name('submitOrder');





    Route::get('/neworders', [AddOrderController::class, 'showNewOrders'])->name('neworders');
    // Route::get('/neworders', function () {
    //     return view('neworders');
    // })->name('neworders');

    Route::get('/checkedoutorders', function () {
        return view('checkedoutorders');
    })->name('checkedoutorders');

    Route::get('/cancelledorders', function () {
        return view('cancelledorders');
    })->name('cancelledorders');

    Route::get('/orders', function () {
        return view('orders');
    })->name('orders');

    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
});

// Public routes (accessible without authentication)
Route::get('/viewmenu', [MenuController::class, 'viewmenu'])->name('viewmenu');
Route::get('/menu', function () {
    return view('menu');
})->name('menu');

// Route for deleting a menu item (if needed)
Route::delete('/menu/delete/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');



Route::get('/checkout/{table_id}', [OrderController::class, 'showCheckout'])->name('orders.checkout');

Route::post('/checkout/submit', [OrderController::class, 'submitCheckout'])->name('checkout.submit');



