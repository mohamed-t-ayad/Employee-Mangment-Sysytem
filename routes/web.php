<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', Backend\UserController::class);
Route::post('users/{user}/change-password', 'Backend\ChangPasswordController@change_password')->name('users.change.password');

// Country Route
Route::resource('countries', Backend\CountryController::class);
// State Route
Route::resource('states', Backend\StateController::class);
// Cities Route
Route::resource('cities', Backend\CityController::class);
// Departments Route
Route::resource('departments', Backend\DepartmentController::class);
// Employees Route
Route::get('{any}', function(){
    return view('employees.index');
})->where('any','.*');



