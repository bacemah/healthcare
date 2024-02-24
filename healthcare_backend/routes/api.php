<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController ;
use App\Http\Controllers\ServiceController ;
use App\Http\Controllers\DoctorController ;
use App\Http\Controllers\AppointmentController ;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(ClientController::class)->group(function(){

    Route::post('/client/register' , 'register');
    Route::post('/client/login' , 'login');




});

Route::controller(ServiceController::class)->group(function(){
    Route::post('service/add' , 'index') ;
    Route::get('service/all' , 'create') ;
    Route::get('service/one/{id}' , 'one') ;
}) ;

Route::controller(DoctorController::class)->group(function(){
    Route::get('doctors/all' , 'index') ;
    Route::post('doctors/add' , 'create') ;
}) ;




Route::controller(AppointmentController::class)->group(function(){
    Route::post('appointments/add' , 'create') ;
}) ;