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
    return redirect()->route('teams');
});

Route::get('/teams', 'TeamsController@list')->name('teams');
Route::get('/teams/{team}', 'TeamsController@show')->name('team.show');

Route::get('/packages', 'PackagesController@list')->name('packages');
Route::get('/packages/assign/{team?}', 'PackagesController@assignment')->name('package.assignment');
Route::post('/packages/assign', 'PackagesController@assign')->name('package.assign');
Route::get('/packages/{package}', 'PackagesController@show')->name('package.show');
Route::get('/packages/terminate/{teamPackage}', 'PackagesController@terminate_check')->name('package.terminate_check');
Route::post('/packages/terminate/{teamPackage}', 'PackagesController@terminate')->name('package.terminate_confirm');
