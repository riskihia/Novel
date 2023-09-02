<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Novels\NovelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
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

Route::get('/', [HomepageController::class, "index"])->name("homepage");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/request', function () {
    return view('request');
})->middleware(['auth', 'verified'])->name('request');

Route::resource("novels", NovelController::class)->middleware(['auth', 'verified'])->names([
    "index" => "novels",
    "create" => "novels-create",
    "store" => "novels-store",
    "destroy" => "novels-delete",
    "edit" => "novels-edit",
    "update" => "novels-update",
]);

Route::get('/member', [UserController::class, "index"])->middleware(['auth', 'verified'])->name('member');
// Route::get('/member', function () {
//     return view('member');
// })->middleware(['auth', 'verified'])->name('member');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
