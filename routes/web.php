<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;

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
    return redirect()->route('clients.index');
    // return view('welcome');
});

Route::get('login', function () {
    return view('login');
})->name('login');

//Usuarios
Route::get('users', [UserController::class, 'index'])->name('clients.index');


//Clientes
Route::get('clients', [ClientController::class, 'index'])->name('clients.index');

Route::get('clients/new', [ClientController::class, 'create'])->name('clients.create');

Route::post('clients', [ClientController::class, 'store']);

Route::get('clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');

Route::get('clients/{client}', [ClientController::class, 'detail'])->name('clients.show');

Route::put('clients/{client}', [ClientController::class, 'update']);

Route::delete('clients/{client}', [ClientController::class, 'destroy']);


// Productos
Route::get('products', [ProductController::class, 'index'])->name('products.index');


// Facturas
Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');

Route::get('invoices/new', [InvoiceController::class, 'create'])->name('invoices.create');

Route::get('invoices/create', [InvoiceController::class, 'store']);
