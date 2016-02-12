<?php

Route::group(['prefix' => 'auth','middleware' => 'web'], function ()
{
	$auth_controller = 'Lostgdi\\Admin\\App\\Auth\\AuthController';
	Route::get('/', [ 'uses' => $auth_controller.'@index']);
	Route::post('login', [ 'uses' => $auth_controller.'@postLogin']);
	Route::get('logout', [ 'uses' => $auth_controller.'@getLogout']);
});

$admin_controller = 'Lostgdi\\Admin\\App\\Http\\Controllers\\AdminController';

Route::get('admin_account/welcome', [ 'uses' => $admin_controller.'@welcome']);

Route::resource('admin_account', $admin_controller);


