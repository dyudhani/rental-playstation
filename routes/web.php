<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\TypeController;
use App\Http\Livewire\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\StorageController;
use App\Http\Livewire\EmployeeController;
use App\Http\Livewire\PositionController;
use App\Http\Livewire\PlaystationLivewire;

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

Route::get('/user', UserController::class)->name('user');

Route::get('/employee', EmployeeController::class)->name('employee');
Route::get('/employee/position', PositionController::class)->name('position');
// Route Playstation
Route::get('/playstation', PlaystationLivewire::class)->name('playstation');
Route::get('/playstation/type', TypeController::class)->name('type');
Route::get('/playstation/storage', StorageController::class)->name('storage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

