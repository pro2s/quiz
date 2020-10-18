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
        'middleware' => ['auth', 'roles:admin,editor,moderator'],
    ],
    function () {
        Route::get('/', 'DashboardController@index')->name('dashboard');

        Route::put('quizzes/{quiz}/toggle', 'QuizController@toggle')->name('quizzes.toggle');
        Route::put('quizzes/{quiz}/add/{question}', 'QuizController@addQuestion')->name('quizzes.addQuestion');
        Route::delete('quizzes/{quiz}/delete/{question}', 'QuizController@deleteQuestion')->name('quizzes.deleteQuestion');
        Route::resource('quizzes', 'QuizController');

        Route::delete('answers/{answer}', 'AnswerController@destroy')->name('answers.destroy');
        Route::put('answers/{answer}/toggle', 'AnswerController@toggle')->name('answers.toggle');

        Route::get('questions/{question}/correct/{answer}', 'QuestionController@correct')->name('questions.answer.correct');
        Route::get('questions/{question}/answer', 'QuestionController@createAnswer')->name('questions.answer.create');
        Route::get('questions/{question}/answer/{answer}', 'QuestionController@editAnswer')->name('questions.answer.edit');
        Route::post('questions/{question}/answer', 'QuestionController@storeAnswer')->name('questions.answer.store');
        Route::put('questions/{question}/answer/{answer}', 'QuestionController@updateAnswer')->name('questions.answer.update');

        Route::get('questions/search', 'QuestionController@search')->name('questions.search');
        Route::put('questions/{question}/toggle', 'QuestionController@toggle')->name('questions.toggle');
        Route::resource('questions', 'QuestionController');
        Route::resource('questions.answers', 'QuestionAnswerController');
        Route::put('users/{user}/toggle', 'UserController@toggle')->name('users.toggle');
        Route::resource('users', 'UserController');
    }
);
