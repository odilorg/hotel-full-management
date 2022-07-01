<?php

use App\Models\Inventory;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InkassaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CleaningController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\TourgroupController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\HotelreservationController;
use App\Http\Controllers\AutocompleteSearchController;
use App\Http\Controllers\RoomRepairController;
use App\Http\Controllers\UtilityUsageController;

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
// Route::get('/pdf', function() {
//    // return view('reports.pdf');
//    $pdf = PDF::loadView('reports.pdf');
//    return $pdf->download('invoice.pdf');
// });



Route::get('/', [RegisterController::class, 'loginForm'])->name('loginForm');
Route::post('/', [RegisterController::class, 'login'])->name('login');
// Route::get('/user/{id}/{name}', function ($id, $name) {
//     //
// })->whereNumber('id')->whereAlpha('name');


Route::post('/logout', [RegisterController::class, 'logout'])->name('logout');
//Route::get('search', [SearchController::class, 'search'])->name('search');
Route::get('autocomplete-search', [AutocompleteSearchController::class, 'index']);
Route::get('boo', [AutocompleteSearchController::class, 'query'])->name('autocomplete');
Route::get('boo2', [AutocompleteSearchController::class, 'fill_company'])->name('fill_company');
Route::post('/reservations/beds24', [ReservationController::class, 'beds24'])->name('reservations.beds24');
Route::post('/reservations/report', [ReservationController::class, 'report'])->name('reservations.report');
Route::post('/expenses/report', [ExpenseController::class, 'report'])->name('expenses.report');
Route::post('/reservations/pdf', [ReservationController::class, 'createPDF'])->name('reservations.pdf');
Route::post('/reservations/report-range', [ReservationController::class, 'report_range'])->name('reservations.report-range');
Route::get('/reservations/report-range/unpaid/{sana1}/{sana2}', [ReservationController::class, 'report_range_unpaid'])->name('reservations.report-range-unpaid');
Route::post('/expenses/report-range', [ExpenseController::class, 'report_range'])->name('expenses.report-range');
Route::get('/cleaning', [CleaningController::class, 'cleaning'])->name('cleaning.cleaning')->middleware(['auth', 'revalidate']);
Route::post('/cleaning/ready', [CleaningController::class, 'cleaning_ready'])->middleware(['auth', 'revalidate']);
Route::post('/cleaning/notready', [CleaningController::class, 'cleaning_notready'])->middleware(['auth', 'revalidate']);


Route::middleware(['auth', 'revalidate', 'can:not-cleaning' ])->group(function () {
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
        'expenses' => ExpenseController::class,
        'reports' => ReportController::class,
        'inkassas' => InkassaController::class,
        'companies' => CompanyController::class,
        'roomrepairs' => RoomRepairController::class,
        'users' => UserController::class,
        'utility_usages' => UtilityUsageController::class,
       
    
    ]);
    // Route::post('/transports/auto', [TransportController::class, 'auto'])->name('auto');
    // Route::post('/transports/air', [TransportController::class, 'air'])->name('air');
    // Route::post('/transports/train', [TransportController::class, 'train'])->name('train');    
    
});

//Route::resource('users', UserController::class,)->middleware(['revalidate']);
Route::get('/status', [TourgroupController::class, 'status'])->name('tourgroups_status');






