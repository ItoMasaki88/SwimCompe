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
  Route::post('/submitEntry', 'SubmitEntryAction')->name('submitEntry');
  Route::post('/deleteEntry', 'DeleteEntryAction')->name('deleteEntry');

  Route::get('/users', function () { return view('admin.users', ['users'=> App\User::all()]); });
  Route::post('/resultForm', 'ResultController@input')->name('resultForm');
  Route::post('/inputResult', 'ResultController@submit')->name('submitResult');
  Route::get('/raceEditForm', 'EditRacesController@input')->name('raceForm');
  Route::post('/editRace', 'EditRacesController@submit')->name('editRace');
  Route::get('/event', function () { return view('admin.event'); });
  Route::post('/event', 'MakeEventAction')->name('makeEvent');
  Route::get('/all', 'ShowAll');
});

Auth::routes();
