<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\Novels\GenreController;
use App\Http\Controllers\Novels\LibraryController;
use App\Http\Controllers\Novels\NovelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\Swals\SwalController;
use App\Http\Controllers\TagController;
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

// Latihan swal
Route::view('/swal', 'swal.swal');
Route::view('/swal-icon', 'swal.swal-icon');
Route::view('/swal-display', 'swal.swal-display');

Route::get("/swal-alert-success", [SwalController::class, "alertSuccess"]);
Route::get("/swal-alert-info", [SwalController::class, "alertInfo"]);
Route::get("/swal-success", [SwalController::class, "success"]);
Route::get("/swal-toast", [SwalController::class, "toast"]);
Route::get("/swal-info", [SwalController::class, "info"]);
Route::get("/swal-html", [SwalController::class, "html"]);

Route::get('/swal-autoclose', [SwalController::class,'autoClose']);
Route::get('/swal-position', [SwalController::class,'position']);
Route::get('/swal-confirm', [SwalController::class,'confirm']);
Route::get('/swal-cancel', [SwalController::class,'cancel']);
Route::get('/swal-addimage', [SwalController::class,'addImage']);
Route::get('/swal-animation', [SwalController::class,'animation']);
Route::get('/swal-progressbar', [SwalController::class,'proggressBar']);

Route::view('/swal-laravel', 'swal.swal-laravel');
Route::get('/swal-with', [SwalController::class,'with']);
Route::get('/swal-with-success', [SwalController::class,'withSuccess']);

Route::view('/swal-form', 'swal.swal-form');
Route::post('/swal-validate-satu', [SwalController::class,'swalValidateSatu']);
Route::post('/swal-validate-banyak', [SwalController::class,'swalValidateBanyak']);

Route::get('/swal-delete', [SwalController::class,'delete']);
Route::delete('/swal-delete/{id}', [SwalController::class,'destroy']);

// Novel
Route::get('/', [HomepageController::class, "index"])->name("homepage");
Route::post('/homepage-search-novel', [HomepageController::class, "search"])->name("input-search");
Route::post('/cari-novel', [HomepageController::class, "cari"])->name("cari-novel");

// Donation midtrans
Route::get("/donation", [DonationController::class, "create"])->name("donation.create");
Route::get("/donation-home", [DonationController::class, "index"])->name("donation.index");




// GOOGLE LOGIN
Route::get('/login/google', [LoginController::class, "redirectToGoogle"]);
Route::get('/login/google/callback', [LoginController::class, "handleGoogleCallback"]);



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');



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


// Tag Route
Route::get('/tags', [TagController::class, "index"])->middleware(['auth', 'verified','admin'])->name('tag');
Route::post('/tags', [TagController::class, "store"])->middleware(['auth', 'verified','admin'])->name('tags-store');
Route::get('/tags/create', [TagController::class, "create"])->middleware(['auth', 'verified','admin'])->name('tags-create');
Route::delete('/tags/{tag}', [TagController::class, "destroy"])->middleware(['auth', 'verified','admin'])->name('tags-delete');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::get('/list-novel', [NovelController::class, "listNovel"])->name('listNovel');

// Kategori
Route::get('/kategori', [GenreController::class, "index"])->name('kategoriNovel');
Route::get('/genre/{genre}', [GenreController::class, "cariGenre"])->middleware(['validGenre'])->name('kategori-genre-route');
Route::get('/author/{author}', [GenreController::class, "cariAuthor"])->middleware(['validAuthor'])->name('kategori-author-route');
Route::get('/status/{status}', [GenreController::class, "cariStatus"])->middleware(['validStatus'])->name('kategori-status-route');

// Request
Route::get('/requests', [RequestController::class, "index"])->middleware(['auth', 'verified'])->name('request');
Route::post('/request', [RequestController::class, "store"])->middleware(['auth', 'verified'])->name('requests-store');
Route::delete('/requests/{request}', [RequestController::class, "destroy"])->middleware(['auth', 'verified','admin'])->name('requests-delete');

// Member route
Route::get('/members', [UserController::class, "index"])->middleware(['auth', 'verified','admin'])->name('member');
Route::delete('/members/{member}', [UserController::class, "destroy"])->middleware(['auth', 'verified','admin'])->name('members-delete');


// Library
Route::get("/library", [LibraryController::class, 'index'])->name('libraryNovel');
Route::post("/add-library", [LibraryController::class, 'addToLibrary'])->name('addLibraryNovel');
Route::post("/delete-library", [LibraryController::class, 'deleteFromLibrary'])->name('deleteLibraryNovel');


Route::post('/cari-list-novel', [NovelController::class, "cariListNovel"])->name('cari-list-novel');

Route::get('/{judulNovel}', [NovelController::class, "viewNovel"])->middleware(['validJudul'])->name('view-novel');


