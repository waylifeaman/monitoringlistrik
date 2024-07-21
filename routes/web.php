<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\UserProfileController;
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

// Route::get('/', function () {
//     return view('index');
// });
Route::get('/', function () {
    return view('auth/loginadminkit');
});
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('daftar');




Auth::routes();
Route::middleware(['auth'])->group(
    function () {
        Route::get('/profile/form', [UserProfileController::class, 'showProfileForm'])->name('profile.form');
        Route::put('/profile/update', [UserProfileController::class, 'updateProfile'])->name('profile.update');



        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
        Route::get('/home/fetch-data-pie', [App\Http\Controllers\HomeController::class, 'fetchDataPie']);
        Route::get('/home/fetch-data-pielistrik', [App\Http\Controllers\HomeController::class, 'fetchDataPielistrik']);
        Route::get('/home/indor-last-hour', [App\Http\Controllers\HomeController::class, 'indorlasthour']);
        Route::get('/home/indor-last-day', [App\Http\Controllers\HomeController::class, 'indorlastday']);
        Route::get('/home/indor-last-moun', [App\Http\Controllers\HomeController::class, 'indorlastmoun']);
        Route::get('/home/fetch-data-outdor-lasthour', [App\Http\Controllers\HomeController::class, 'fetchDataOutdorlasthour']);
        Route::get('/home/fetch-data-outdor-lastday', [App\Http\Controllers\HomeController::class, 'fetchDataOutdorlastday']);
        Route::get('/home/fetch-data-outdor-lastmoun', [App\Http\Controllers\HomeController::class, 'fetchDataOutdorlastmoun']);
        Route::get('/home/fetch-data-listrik-lasthour', [App\Http\Controllers\HomeController::class, 'fetchDataListriklasthour']);
        Route::get('/home/fetch-data-listrik-lastday', [App\Http\Controllers\HomeController::class, 'fetchDataListriklastday']);
        Route::get('/home/fetch-data-listrik-lastmoun', [App\Http\Controllers\HomeController::class, 'fetchDataListriklastmoun']);
        Route::get('/home/fetch-data-angin-lasthour', [App\Http\Controllers\HomeController::class, 'fetchDataanginlasthour']);
        Route::get('/home/fetch-data-angin-lastday', [App\Http\Controllers\HomeController::class, 'fetchDataanginlastday']);
        Route::get('/home/fetch-data-angin-lastmoun', [App\Http\Controllers\HomeController::class, 'fetchDataanginlastmoun']);

        Route::get('/indor', [App\Http\Controllers\DataindorController::class, 'index'])->name('indor');
        Route::get('/outdor', [App\Http\Controllers\DataoutdorController::class, 'index'])->name('outdor');
        Route::get('/listrik', [App\Http\Controllers\DatalistrikController::class, 'index'])->name('listrik');
        Route::get('/angin', [App\Http\Controllers\DataanginController::class, 'index'])->name('angin');
    }
);
