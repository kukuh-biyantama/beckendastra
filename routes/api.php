<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//post kategori
Route::get('/getkategori', [ApiController::class, 'indexkategori'])->name('kategori.get');
Route::post('/postkategori', [ApiController::class, 'postkategori'])->name('kategori.post');
Route::get('/edit/kategori/{id}', [ApiController::class, 'editkategori'])->name('kategori.edit');
Route::put('/update/kategori/{id}', [ApiController::class, 'updatekategori'])->name('kategori.update');
Route::delete('/delete/kategori/{id}', [ApiController::class, 'deletekategori'])->name('kategori.delete');


//controller buku
Route::get('/getbooks', [ApiController::class, 'indexbooks'])->name('books.get');
Route::post('/postbooks', [ApiController::class, 'booksstore'])->name('books.post');
Route::get('/edit/books/{id}', [ApiController::class, 'editbooks'])->name('books.edit');
Route::put('/update/books/{id}', [ApiController::class, 'updatebooks'])->name('books.update');
Route::delete('/delete/books/{id}', [ApiController::class, 'deletebooks'])->name('books.delete');

//control transaksi
Route::get('/gettransaksi', [ApiController::class, 'indextransaksi'])->name('transaksi.get');
Route::post('/posttransaksi', [ApiController::class, 'transaksistore'])->name('transaksi.post');
Route::get('/edit/transaksi/{id}', [ApiController::class, 'edittransaksi'])->name('transaksi.edit');
Route::put('/update/transaksi/{id}', [ApiController::class, 'updatetransaksi'])->name('transaksi.update');
Route::delete('/delete/transaksi/{id}', [ApiController::class, 'deletetransaksi'])->name('transaksi.delete');
