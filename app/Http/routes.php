<?php
Route::get('/', 'HomeController@index');

// Registration Routes...
Route::resource('/register2', 'RegisterController@reg');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/profil', 'ProfilController@index');

// Route::post('/home/simpan', function(){
//   if(Request::ajax()){
//     return Response::json(Request::all());
//   }
// });

Route::post('/home/simpan', ['as' => 'simpanstatus', 'uses' => 'HomeController@simpan']);

Route::post('/profil/upload', ['as' => 'uploadfoto', 'uses' => 'ProfilController@upload']);

Route::post('/profil/simpanbio', ['as' => 'simpanbio', 'uses' => 'ProfilController@simpanbio']);
