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

Route::get('/', function() {
	return view('welcome');
});

Route::get('/about', 'PagesController@about');


Auth::routes();

Route::get('/home3', function() {
	return view('home3');
});

Route::get('/home', 'HomeController@index');
Route::get('/setLocation/{city}', 'HomeController@setLocation');
Route::get('/home2', 'HomeController@index2')->name('home');
Route::get('/teamBuild', 'HomeController@teamBuild');

Route::post('/processTeam', 'HomeController@processTeam');

Route::get('/showTeams', 'HomeController@showTeams');

Route::get('/updateTeam/{id}', 'HomeController@updateTeam');

Route::post('/updateTeamSave/{id}', 'HomeController@updateTeamSave');


Route::get('/selectDomain', 'HomeController@selectDomain');

Route::get('/technicalTeams', 'HomeController@technicalTeams');

Route::get('/culturalTeams', 'HomeController@culturalTeams');

Route::get('/sportTeams', 'HomeController@sportTeams');

Route::get('/teamList', 'HomeController@teamList');

Route::get('/requestTeam/{id}', 'HomeController@requestTeam');

Route::get('/acceptRequest/{id}', 'HomeController@acceptRequest');

Route::get('/rejectRequest/{id}', 'HomeController@rejectRequest');

Route::get('/enterYourLocation/', 'HomeController@enterYourLocation');