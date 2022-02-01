<?php

use App\Models\Inventory;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TourgroupController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\HotelreservationController;
use App\Http\Controllers\AutocompleteSearchController;
use App\Http\Controllers\ReservationController;

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

Route::get('/', [RegisterController::class, 'loginForm'])->name('loginForm');
Route::post('/', [RegisterController::class, 'login'])->name('login');


Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
//Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('autocomplete-search', [AutocompleteSearchController::class, 'index']);
Route::get('boo', [AutocompleteSearchController::class, 'query'])->name('autocomplete');
Route::post('/reservations/beds24', [ReservationController::class, 'beds24'])->name('reservations.beds24');
Route::post('/reservations/report', [ReservationController::class, 'report'])->name('reservations.report');

Route::middleware(['auth', 'revalidate'])->group(function () {
    Route::resources([
        'hotelreservations' => HotelreservationController::class,
        'transports' => TransportController::class,
        'tourgroups' => TourgroupController::class,
        'guides' => GuideController::class,
        'restaurants' => RestaurantController::class,
        'tickets' => TicketController::class,
        'products' => ProductController::class,
        'inventories' => InventoryController::class,
        'cargos' => CargoController::class,
        'reservations' => ReservationController::class,
    
    ]);
    // Route::post('/transports/auto', [TransportController::class, 'auto'])->name('auto');
    // Route::post('/transports/air', [TransportController::class, 'air'])->name('air');
    // Route::post('/transports/train', [TransportController::class, 'train'])->name('train');    
    
});

Route::resource('users', UserController::class)->middleware(['can:admin','revalidate']);
Route::get('/status', [TourgroupController::class, 'status'])->name('tourgroups_status');






