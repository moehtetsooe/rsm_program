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
    return redirect('admin/login');
});

Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('user-lists','adminController@index');
  Route::get('change/user-status','adminController@chaneUserStatus');
  /*Route::get('user/create','adminController@create');
  Route::post('user/create','adminController@store');*/

  Route::resource('user', 'adminController');
  Route::resource('role', 'RoleController');
  Route::resource('job-assign', 'JobAssignController');


  //************ Statrt Operator ************//
  Route::get('operator', 'OperatorController@index');
  Route::get('job-detail/{id}', 'OperatorController@detail');
  Route::get('download', 'OperatorController@download');
  //************ End Operator ************//

});
