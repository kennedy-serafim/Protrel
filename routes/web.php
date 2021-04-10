<?php

use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([
	'register' => false
]);

//===================== Not Authentication Required =====================

Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

// ===================== Authentication Required =====================

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', UserController::class, ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

	Route::get('/companies', [CompaniesController::class, 'index'])->name('companies.index');

});

// ===================== Administrators =====================

Route::group(['middleware' => 'role:Administrador'], function () {
	Route::prefix('administrator')->group(function () {
		Route::get('/employees', [EmployeesController::class, 'index'])->name('employees.index');
	});
});
