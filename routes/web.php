<?php

use App\Http\Controllers\InstanceController;
use App\Http\Controllers\InstanceReportController;
use App\Http\Controllers\PackageController;
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
    Route::get('instances/{instance}', [InstanceController::class, 'show'])->name('instances.show');
    Route::patch('instances/{instance}', [InstanceController::class, 'update'])->name('instances.update');
    Route::get('instances/{instance}/edit', [InstanceController::class, 'edit'])->name('instances.edit');
    Route::get('instances/{instance}/reports/{report}', [InstanceReportController::class, 'show'])->name('reports.show');

    Route::get('packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('packages/{package}', [PackageController::class, 'show'])->where('package', '.*\/.*')->name('packages.show');
});

require __DIR__ . '/auth.php';
