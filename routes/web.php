<?php

use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SectionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});



// Auth::routes();




Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/invoices', [App\Http\Controllers\InvoicesController::class, 'index'])->name('invoices');
Route::resource('sections', SectionsController::class)->only([
    'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
]);

Route::resource('products', ProductsController::class)->only([
    'index', 'show', 'create', 'store', 'edit', 'update', 'destroy'
]);

Route::get('/section/{id}', [InvoicesController::class, 'getproducts'])->name('sections.getproducts');

Route::get('invoices/create', [InvoicesController::class, 'create'])->name('invoices.create');
Route::post('invoices/store', [InvoicesController::class, 'store'])->name('invoices.store');


Route::get('/{page}', 'App\Http\Controllers\AdminController@index');

