<?php

use Illuminate\Http\Request;


Route::group(['middleware'=> ['api']], function(){
    Route::resource('peserta', 'PesertaController');
    Route::resource('kelas', 'KelasController');
    Route::resource('relasi', 'RelasiController');
    Route::post('auth/signup', 'AuthController@signup');
    Route::post('auth/signin', 'AuthController@signin');
    Route::group(['middleware'=> ['jwt.auth']], function(){
      Route::resource('surat', 'SuratController');
      Route::get('keluar', 'SuratController@keluar');
      Route::get('masuk', 'SuratController@masuk');
      Route::get('masuk/{id}', 'SuratController@show_masuk');
    });
});



 // Route::middleware('auth:api')->get('/user', function (Request $request) {
 //     return $request->user();
 // });
