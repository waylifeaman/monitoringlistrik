<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('logout-user', function () {
    Auth::logout();
    return redirect('/');
})->name('logout-user');

Route::get('/', function () {
    return view('auth/loginadminkit');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('daftar');


Auth::routes();
Route::middleware(['auth'])->group(
    function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/indor', [App\Http\Controllers\DataIndorController::class, 'index'])->name('indor');
        Route::get('/outdor', [App\Http\Controllers\DataOutdorController::class, 'index'])->name('outdor');
        Route::get('/listrik', [App\Http\Controllers\DataListrikController::class, 'index'])->name('listrik');
        Route::get('/angin', [App\Http\Controllers\DataAnginController::class, 'index'])->name('angin');
    }
);
