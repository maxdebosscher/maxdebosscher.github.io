<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Form routes
Route::get('forms', 'FormController@index');            // List all forms
Route::get('form/{id}', 'FormController@show');         // List single form
Route::post('form', 'FormController@store');            // Create new form
Route::put('form', 'FormController@store');             // Update form
Route::delete('form/{id}', 'FormController@destroy');   // Delete form

// Question routes
Route::get('questions', 'QuestionController@index');              // List all questions
Route::get('question/{id}', 'QuestionController@show');           // List single question
Route::post('question', 'QuestionController@store');              // Create new question
Route::put('question', 'QuestionController@store');               // Update question
Route::delete('question/{id}', 'QuestionController@destroy');     // Delete question