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

Route::get('/', function () {
    return view('welcome');
});


Route::get('questions/editreponses/{id}', 'QuestionController@editreponses')->name('editreponses');
Route::get('questions/deletereponses/{id}', 'QuestionController@deletereponses')->name('deletereponses');
Route::delete('reponses/{id}/{id_q}', 'ReponseController@destroy')->name('deletereponse');



Route::resource('categories','CategorieController');

Route::resource('questions','QuestionController');

Route::resource('reponses','ReponseController');
