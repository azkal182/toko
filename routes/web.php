<?php

use Illuminate\Support\Facades\Route;

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
    return redirect()->route('home');
//    return view('welcome');
});

Auth::routes();



Route::get('admin/login', [\App\Http\Controllers\Auth\AdminAuthController::class, 'login'])
    ->name('admin.login');
Route::post('admin/login', [\App\Http\Controllers\Auth\AdminAuthController::class, 'handleLogin'])
    ->name('admin.handleLogin');
Route::post('admin/logout', [\App\Http\Controllers\Auth\AdminAuthController::class, 'logout'])
    ->name('admin.logout');


Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
            ->name('admin.home');
        Route::get('/user/customer', [\App\Http\Controllers\Admin\User\CustomerController::class, 'index'])->name('admin.customer');
        Route::post('/user/customer/import', [\App\Http\Controllers\Admin\User\CustomerController::class, 'import'])->name('admin.customer.import');
        Route::get('/user/user', [\App\Http\Controllers\Admin\User\UserController::class, 'index'])->name('admin.user');


        Route::get('/credit', [\App\Http\Controllers\Admin\CreditController::class, 'index'])->name('admin.credit');
        Route::get('/credit/{id}', [\App\Http\Controllers\Admin\CreditController::class, 'show'])->name('admin.credit.show');
        Route::post('/credit/import', [\App\Http\Controllers\Admin\CreditController::class, 'import'])->name('admin.credit.import');
    });

});


Route::middleware('auth:web')->group(function () {
    Route::view('about', 'about')->name('about')->middleware('auth');
    Route::get('/home', [\App\Http\Controllers\UserController::class, 'index'])->name('home');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});
