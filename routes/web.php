<?php
//use Illuminate\Routing\Route;
//use GuzzleHttp\Client;

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

Route::get('/', 'PagesController@landing')->name('landing');
//Route::get('/home','PagesController@home')->name('services');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/services','PagesController@services')->name('services');

Route::get('/contact','PagesController@contact')->name('contact');
Route::post('/contact','PagesController@postcontact')->name('contact');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




