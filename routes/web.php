<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\StoreController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/locale/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        abort(400);
    }

    // App::setlocale($lang);
    Session::put('locale', $locale);

    return back();
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->middleware('auth:admin')->group(function () {


    Route::get('/', function () {
        return view('admin.dashboard');
    });

    // ->parameter('settingcriterias', 'settingCriteria')
    Route::resource('/stores', StoreController::class);
    Route::get('stores/change/status/{store}', [StoreController::class, 'changeStatus'])->name('stores.change_status');
    Route::resource('/categories', CategoryController::class);
    Route::get('categories/change/status/{category}', [CategoryController::class, 'changeStatus'])->name('categories.change_status');
    Route::resource('/cars', CarController::class);
    Route::get('cars/change/status/{car}', [CarController::class, 'changeStatus'])->name('cars.change_status');

});

require __DIR__.'/auth.php';
