<?php
use App\Question;
use App\Categorie;
use App\Reponse;
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
    $categories = Categorie::get()->count();
    $questions = Question::get()->count();
    $reponses = Reponse::get()->count();

    return view('welcome',compact('questions','categories', 'reponses'));
});


Route::get('questions/editreponses/{id}', 'QuestionController@editreponses')->name('editreponses');
Route::get('questions/deletereponses/{id}', 'QuestionController@deletereponses')->name('deletereponses');
Route::delete('reponses/{id}/{id_q}', 'ReponseController@destroy')->name('deletereponse');



Route::resource('categories','CategorieController');

Route::resource('questions','QuestionController');

Route::resource('reponses','ReponseController');
