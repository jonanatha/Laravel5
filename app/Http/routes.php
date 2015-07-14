<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'AccountController@index');
Route::post('/signin', array('befor'=>'csrf', 'uses'=>'AccountController@Userlogin'));
Route::get('logout', array('uses'=>'AccountController@Userlogout'));
Route::get('/income', 'AccountController@income');
Route::get('/Register', 'AccountController@register');
Route::post('/registerUser', array('uses'=>'AccountController@create'));
Route::get('/addIncome', 'AccountController@addIncome');
Route::post('/registerIncome', array('uses'=>'AccountController@newIncome'));
Route::get('/addExpend', array('uses'=>'AccountController@addExpend'));
Route::post('/registerExpend', array('uses'=>'AccountController@newExpend'));
Route::post('/editExpend', 'AccountController@updateExpend');
Route::get('/EditExpend/{id}', 'AccountController@edit_expend');
Route::get('/DeleteExpend/{id}', 'AccountController@delete_expend');
Route::get('/DeleteIncome/{id}', 'AccountController@delete_income');
Route::post('/editIncome', 'AccountController@updateIncome');
Route::get('/EditIncome/{id}', 'AccountController@edit_income');


Route::get('/Student', 'StudentController@index');
Route::get('/form', 'StudentController@form');
Route::post('/saveStudent', 'StudentController@save');
Route::get('/newstudent', 'StudentController@student');
Route::post('/register', array('uses'=>'StudentController@create'));
Route::get('/EditRow/{id}', 'StudentController@edit');
Route::get('/DeleteRow/{id}', 'StudentController@delete');
Route::post('/updateStudent', 'StudentController@update');
Route::post('search', array('before'=>'csrf', 'uses'=>'StudentController@update'));


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);