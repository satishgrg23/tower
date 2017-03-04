<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/viewReportTable', 'AdminController@viewTable');

/*
*
*Authentication routes
*
*/

Route::group(['middleware'=>'visitors'], function (){
    Route::get('/login', 'LoginController@create');
    Route::post('/login', 'LoginController@validateUser');
});

Route::post('/logout', 'LoginController@logout');

Route::get('/broadcast', 'AdminController@broadcast');



/*
*
*Admin routes
*
*/
Route::get('/admin/dashboard','AdminController@index');
Route::get('/admin/towerReport','AdminController@towerReport');
Route::resource('admin/users','UserController');
Route::resource('admin/towerlink','TowerLinkController');
Route::get('admin/exportReport','AdminController@exportReport');
Route::get('admin/exportPhotos','AdminController@exportPhotos');
Route::get('admin/exportSpecificPhoto/{name}','AdminController@exportSpecificPhoto');
Route::get('admin/showDirectory','AdminController@showDirectory');


/*
*
*User routes
*
*/
Route::get('/user/dashboard','EndUserController@index');
Route::resource('admin/towerlink','TowerLinkController');
Route::resource('user/towerReport','TowerReportController');
Route::get('user/towerReport/view/{id}/','TowerReportController@view');
Route::get('/profile', 'EndUserController@profile');
// Route::get('/editProfile', 'EndUserController@editProfile');
Route::get('/changePassword', 'EndUserController@changePassword');
Route::put('/updatePassword/{id}', 'EndUserController@updatePassword');


Route::resource('/downloads','DownloadController');
Route::get('/downloadFile/{file}','DownloadController@downloadFile');

