<?php

use App\Http\Controllers\BorrowerController as BorrowerController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth:web', 'verified'])->group(function() {
    Route::get('/borrowers', [BorrowerController::class, 'index']);
    Route::get('create/borrowers', function () {
        return view('borrowers.create');
    });
    Route::post('/borrowers', [BorrowerController::class, 'create']);
    Route::put('/borrowers/{borrower}', [BorrowerController::class, 'update']);
    Route::delete('/borrowers/{borrower}', [BorrowerController::class, 'delete']);
});
