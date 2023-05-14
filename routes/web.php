<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollingController;

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

Route::get('vote',[PollingController::class,'search_ticket']);
Route::get('voting',[PollingController::class,'voting']);

Route::get('polling',[PollingController::class,'index']);

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['prefix'=>'admin'],function ($route){
    $route->group(['prefix'=>'tickets'],function ($route){
        $route->get('/');
    });

    $route->group(['prefix'=>'candidate'],function ($route){
        $route->get('/');
    });
});
