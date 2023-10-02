<?php

use App\Livewire\Products;
use App\Livewire\ListProducts;
use App\Livewire\Inventory\Add;
use App\Livewire\Inventory\All;
use App\Livewire\Inventory\Outlets;
use App\Livewire\Inventory\Displays;
use App\Livewire\Inventory\NewModel;
use App\Livewire\Inventory\AddStocks;
use App\Livewire\Inventory\AppStocks;
use App\Livewire\Inventory\EditModel;
use Illuminate\Support\Facades\Route;
use App\Livewire\Inventory\AddNewModel;
use App\Livewire\Inventory\Views\Outlet;
use App\Livewire\Inventory\Views\Stocks;
use App\Livewire\Inventory\Views\Display;
use App\Http\Controllers\ProfileController;
use App\Livewire\Inventory\AddOutletStocks;
use App\Livewire\Inventory\AddDisplayStocks;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', function () {
    return view('users');
})->middleware(['auth', 'verified'])->name('users');

Route::get('/customers', function () {
    return view('customers');
})->middleware(['auth', 'verified'])->name('customers');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/inventory', function () {
        return view('inventory');
    })->name('inventory');

    Route::get('/inventory/add-stocks/{id}', AddStocks::class)->name('add-stocks');

    Route::get('/inventory/add-outlet_stocks/{id}', AddOutletStocks::class)->name('add-outlet_stocks');

    Route::get('/inventory/add-display_stocks/{id}', AddDisplayStocks::class)->name('add-display_stocks');

    Route::get('/inventory/edit-model/{id}', EditModel::class)->name('edit-model');

    Route::get('/inventory/add-new-model', AddNewModel::class)->name('add-new-model');

    Route::get('/inventory/stocks', Stocks::class)->name('stocks');

    Route::get('/inventory/display', Display::class)->name('display');

    Route::get('/inventory/outlet', Outlet::class)->name('outlet');

    // Route::get('/inventory/displays', Displays::class)->name('displays');

    // Route::get('/inventory/outlets', Outlets::class)->name('outlets');

    // Route::get('/inventory/new_model', NewModel::class)->name('new_model');
});

Route::get('/sell', function () {
    return view('sell');
})->middleware(['auth', 'verified'])->name('sell');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
