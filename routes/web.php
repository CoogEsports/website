<?php

use App\Http\Controllers\Auth\ConnectedAccountProviderController;
use App\Http\Controllers\Acp\AcpController;
use App\Http\Controllers\Profile\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/teams', function () {
    return view('teams');
})->name('teams');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/connected-accounts');
});

Route::prefix('provider')->group(function () {
    Route::get('/{provider}/redirect', [ConnectedAccountProviderController::class, 'redirectToProvider'])
        ->name('provider.redirect')
        ->where('provider', 'discord|steam');
    Route::get('/{provider}/callback', [ConnectedAccountProviderController::class, 'handleProviderCallback'])
        ->name('provider.callback')
        ->where('provider', 'discord|steam');
});

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/acp', [AcpController::class, 'index'])->name('acp.index');
});
