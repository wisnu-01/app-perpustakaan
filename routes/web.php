<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\MemberController;

// Route Halaman Utama Bawaan
Route::get('/', function () {
    return view('welcome');
});

// --- Langkah 3: Mendaftarkan Route Resource ---
Route::resource('books', BookController::class);
Route::resource('categories', CategoryController::class)->except(['show']);
Route::resource('members', MemberController::class);
Route::resource('loans', LoanController::class);

// Route khusus pengembalian buku
Route::put('/loans/{id}/kembalikan', [LoanController::class, 'kembalikan'])
    ->name('loans.kembalikan');

// --- Bagian Tugas P-2: Route Group untuk Admin ---
Route::prefix('admin')->group(function () {
    Route::get('/info', function () {
        return 'Admin Route Group@info - Halaman Informasi Admin';
    });
});