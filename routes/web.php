<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\novels\GenreController;
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
Route::post('/homepage-search-novel', [HomepageController::class, "search"])->name("input-search");
Route::post('/cari-novel', [HomepageController::class, "cari"])->name("cari-novel");



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::get('/request', function () {
    return view('request');
})->middleware(['auth', 'verified'])->name('request');

// route novel
Route::post('/search-novel', [NovelController::class, "search"])->middleware(['auth', 'verified', 'admin'])->name('search-novel');


Route::resource("novels", NovelController::class)->middleware(['auth', 'verified', 'admin'])->names([
    "index" => "novels",
    "create" => "novels-create",
    "store" => "novels-store",
    "destroy" => "novels-delete",
    "edit" => "novels-edit",
    "update" => "novels-update",
]);

Route::get('/member', [UserController::class, "index"])->middleware(['auth', 'verified','admin'])->name('member');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/list-novel', [NovelController::class, "listNovel"])->name('listNovel');

// Kategori
Route::get('/kategori', [GenreController::class, "index"])->name('kategoriNovel');
Route::get('/kategori/{genre}', [GenreController::class, "cariGenre"])->middleware(['validGenre'])->name('kategori-genre-route');


Route::post('/cari-list-novel', [NovelController::class, "cariListNovel"])->name('cari-list-novel');

Route::get('/{judulNovel}', [NovelController::class, "viewNovel"])->middleware(['validJudul'])->name('view-novel');