<?php

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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function () {
    Route::post('login', 'Api\AuthController@login');
    Route::post('logout', 'Api\AuthController@logout');
    Route::get('refresh', 'Api\AuthController@refresh');
    Route::get('user', 'Api\AuthController@user');
});

Route::get('quizzes', 'Api\QuizController@index');
Route::get('quiz/{slug}', 'Api\QuizController@show');
Route::get('quiz/{slug}/next/{question}', 'Api\QuizController@next');
Route::post('answer/{quiz}/{question}', 'Api\AnswerController@send');
