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
    return view('spa');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/account', 'AccountController@index')->name('account')->middleware('auth');
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth', 'roles:admin,editor,moderator']
    ],
    function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::put('quizzes/{quiz}/toggle', 'QuizController@toggle')->name('quizzes.toggle');
        Route::resource('quizzes', 'QuizController');
    }
);
