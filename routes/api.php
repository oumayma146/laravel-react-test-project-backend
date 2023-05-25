<?php

use App\Http\Controllers\Mensualite;
use App\Http\Controllers\MontantEmpruter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('calcule', [MontantEmpruter::class, 'calculeMontantEmpruter']);
Route::post('monsualite', [Mensualite::class, 'calculeMensualite']);
Route::get('capital', [MontantEmpruter::class, 'getMontant']);
Route::get('', [Mensualite::class, 'getMensualite']);
Route::get('list-montant', [MontantEmpruter::class, 'index']);
Route::get('list-mensualite', [Mensualite::class, 'index']);

Route::get('table/{id}', [Mensualite::class, 'getTableAmmortissment']);