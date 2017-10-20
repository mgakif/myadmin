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

Route::get('/', array(
    'as' => 'home', 'uses' => 'HomeController@homepage'
));
Route::get('example-1/{model}/{id}', ['as' => 'upload', 'uses' => 'ImageController@getUpload']);
Route::post('upload/{model}/{id}', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
Route::post('{page}/{modul}/upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);
Route::get('/delete-image/{id}', ['as' => 'delete-image', 'uses' =>'ImageController@deleteImage']);

Route::get('example-2/{model}/{id}', ['as' => 'upload-2', 'uses' => 'ImageController@getServerImagesPage']);
Route::get('server-images/{model}/{id}', ['as' => 'server-images', 'uses' => 'ImageController@getServerImages']);
Route::get('example-3/{model}/{id}', ['as' => 'upload-3', 'uses' => 'ImageController@getUpload3']);
Route::get('yasemin', array(
    'as' => 'yasemin', 'uses' => 'HomeController@yasemin'
));
Route::get('/sayfa/{page}', array(
    'as' => 'page', 'uses' => 'StaticPageController@staticpage'
));

Route::get('/auth/login', array(
        'as' => 'signInForm', 'uses' => 'UsersController@signInForm'
));

Route::post('/auth/login', array(
    'as' => 'signIn', 'uses' => 'UsersController@signIn'
));

Route::get('/auth/logout', array(
        'as' => 'logout', 'uses' => 'UsersController@logout'
));