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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('inbox', 'InboxController');
    //Route::group(['prefix' => 'file-manager'], function () {
    //    \UniSharp\LaravelFilemanager\Lfm::routes();
    //});
    Route::resource('role', 'RoleController');
    Route::resource('user', 'UserController');
    Route::get('/print-pdf', 'InboxController@print_pdf')->name('inbox.print-pdf');
    Route::get('/change-password', 'ChangePasswordController@index')->name('change-password.index');
    Route::post('/change-password', 'ChangePasswordController@change_password')->name('change-password');
});
