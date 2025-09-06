<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;

Route::get('/', [ResourceController::class, 'index'])->name('dashboard');

Route::resource('barang', BarangController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('customers', CustomerController::class);
Route::resource('menu', MenuController::class);
Route::resource('order', OrderController::class);
Route::get('/order/{order}/struk', [OrderController::class, 'struk'])->name('order.struk');
Route::get('/resource', [ResourceController::class, 'index'])->name('resource.index');
Route::get('/hasilpenjualan', [ResourceController::class, 'hasilPenjualan'])->name('hasilpenjualan.index');
