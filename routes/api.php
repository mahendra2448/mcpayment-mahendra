<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BudgetController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(BudgetController::class)->group(function() {
    Route::post('add-debit', 'addDebit')->name('add.debit');
    Route::post('add-credit', 'addCredit')->name('add.credit');
    Route::get('reset', 'resetBudget')->name('reset-all');
});