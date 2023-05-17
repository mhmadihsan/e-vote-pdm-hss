<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\AdminController;

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
Route::post('vote/store',[PollingController::class,'store_vote']);

Route::get('polling',[PollingController::class,'index']);
Route::get('polling/data',[PollingController::class,'data_polling']);

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['prefix'=>'admin'],function ($route){
    $route->group(['prefix'=>'tickets'],function ($route){
        $route->get('/',[AdminController::class,'index_tickets'])->name('admin.tickets');
        $route->get('add',[AdminController::class,'add_tickets'])->name('admin.tickets.add');
        $route->post('store',[AdminController::class,'store_tickets']);
        $route->delete('delete/{id}',[AdminController::class,'delete_tickets']);
    });

    $route->group(['prefix'=>'candidate'],function ($route){
        $route->get('/',[AdminController::class,'index_candidate'])->name('admin.candidate');
        $route->get('add',[AdminController::class,'add_candidate'])->name('admin.candidate.add');
        $route->get('edit/{id}',[AdminController::class,'edit_candidate'])->name('admin.candidate.edit');
        $route->post('update_candidate',[AdminController::class,'update_candidate']);
    });
});
