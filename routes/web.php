<?php

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


Route::get('/', function () { return view('app/index'); } )->name('index');

Route::get('/entry', 'ShowEventsList');

Route::group(['middleware' => 'auth'], function() {
  Route::get('/mypage', 'ShowMypage');
  Route::get('/users', function () { return view('admin.users', ['users'=> App\User::all()]); });
  Route::get('/event', function () { return view('admin.event'); });
  /** Route::get('/race', function () { return view('admin.race'); });
   **/
  Route::get('/all', 'ShowAll');
});

Auth::routes();
