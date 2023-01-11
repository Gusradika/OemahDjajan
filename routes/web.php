<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\DetailOrderController;

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

Route::get('/', [MenuController::class, "index"]);
Route::get('/home', [MenuController::class, "index"]);
Route::get('/addorder/{item:id}', [MenuController::class, "beli"]);



Route::get('/MenuMakanan', [MenuController::class, "pilihMakanan"]);
Route::get('/MenuMinuman', [MenuController::class, "pilihMinuman"]);
Route::get('/pilihan/{kategori:nama_kategori}', [MenuController::class, "gatePilih"]);

Route::get('/pesanan', [MenuController::class, "pesanan"]);

Route::get('/menu/{item:id}', [MenuController::class, "showMenuInfo"]);


// Keranjang Controller
Route::get('/removeItem/{keranjang:id}', [KeranjangController::class, "destroy1"]);

Route::get('/makeOrder', [MenuController::class, "makeOrder"]);




// Dashboard
Route::get('/dashboard', [dashboardController::class, "index"])->middleware('auth');
Route::get('/dashboard/all-order', [dashboardController::class, "showAllOrders"])->middleware('auth');
Route::get('/dashboard/available-order', [dashboardController::class, "showAvailableOrders"])->middleware('auth');
Route::get('/dashboard/completed-order', [dashboardController::class, "showCompletedOrders"])->middleware('auth');
Route::get('/dashboard/canceled-order', [dashboardController::class, "showCanceledOrders"])->middleware('auth');
Route::get('/dashboard/produk', [dashboardController::class, "showProduks"])->middleware('auth');
Route::get('/dashboard/employee', [dashboardController::class, "showEmployee"])->middleware('auth');
Route::get('/dashboard/kategori', [dashboardController::class, "showKategori"])->middleware('auth');

Route::get('/dashboard/order-info/{order:id}', [dashboardController::class, "showDetailedOrders"])->middleware('auth');

Route::get('/orders/mark-complete/{order:id}', [dashboardController::class, "markCompleteOrder"])->middleware('auth');
Route::get('/orders/cancel/{order:id}', [dashboardController::class, "cancelOrder"])->middleware('auth');
Route::get('/orders/edit/{order:id}', [dashboardController::class, "editOrder"])->middleware('auth');
Route::get('/remove/{keranjang:id}', [dashboardController::class, "destroy"])->middleware('auth');
Route::get('/addEdit/{item:id}', [dashboardController::class, "addEdited"])->middleware('auth');
Route::get('/updateEdit', [dashboardController::class, "updateEdit"])->middleware('auth');
Route::get('/destroyAll', [dashboardController::class, "destroyAll"])->middleware('auth');
Route::get('/removeEdit/{keranjang:id}', [dashboardController::class, "removeEdit"])->middleware('auth');
Route::get('/dashboard/editProduk/{item:id}', [dashboardController::class, "editProduk"])->middleware('auth'); //
Route::get('/tiket', function () {
    return view("tiket", ["active" => 0]);
});

Route::get("notFound", function () {
    return view("notFound", ["active" => "null"]);
});

Route::post("/debug", [dashboardController::class, "debug"]);
Route::post("/updateProduk/{item:id}", [dashboardController::class, "updateProduk"])->middleware('auth');
Route::get("/createProduk", [dashboardController::class, "showNewProdukForm"])->middleware('auth');
Route::post("/createProduk", [dashboardController::class, "createProduk"])->middleware('auth');
Route::get("/deleteProduk/{item:id}", [dashboardController::class, "deleteProduk"])->middleware('auth');


Route::get("/login", [MenuController::class, "login"])->middleware('guest');
Route::post("/login", [MenuController::class, "authenticate"]);
Route::post("/logout", [MenuController::class, "logout"]);