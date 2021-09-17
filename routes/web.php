<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstanceController;
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
    return redirect('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('instances', [InstanceController::class, 'index'])->name('instances.index');
});

Route::get('dashboard', DashboardController::class)->name('dashboard');

require __DIR__ . '/auth.php';
