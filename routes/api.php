<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['prefix'  => 'v1/customers'], function (){
    Route::get('/', [AdminController::class, 'getData'])->name('admin.customers');
    Route::get('/{id}', [AdminController::class, 'getDataById']);
});