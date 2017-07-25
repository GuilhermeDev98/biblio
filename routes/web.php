<?php

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){
	Route::group(['prefix' => 'book'], function(){
		Route::get('/', 'BookController@index')->name('book.index');
		Route::get('/create', 'BookController@create')->name('book.create');
		Route::post('/create', 'BookController@store')->name('book.store');
		Route::get('/edit/{book}', 'BookController@edit')->name('book.edit');
		Route::post('/edit/{book}', 'BookController@update')->name('book.edit');
		Route::get('/destroy/{book}', 'BookController@destroy')->name('book.destroy');
		Route::post('/search', 'BookController@search')->name('book.search');

		Route::post('/ajaxSearch', 'BookController@ajaxSearch')->name('book.ajaxSearch');
	});

	Route::group(['prefix' => 'student'], function(){
		Route::get('/', 'StudentController@index')->name('student.index');
		Route::get('/create', 'StudentController@create')->name('student.create');
		Route::post('/create', 'StudentController@store')->name('student.create');
		Route::get('/edit/{user}', 'StudentController@edit')->name('student.edit');
		Route::post('/edit/{user}', 'StudentController@update')->name('student.edit');
		Route::get('/destroy/{user}', 'StudentController@destroy')->name('student.destroy');
		Route::post('/search', 'StudentController@search')->name('student.search');

		Route::post('/ajaxSearch', 'StudentController@ajaxSearch')->name('student.ajaxSearch');

	});

	Route::group(['prefix' => 'loan'], function(){
		Route::get('/', 'LoanController@index')->name('loan.index');
		Route::get('/create', 'LoanController@create')->name('loan.create');
		Route::post('/create', 'LoanController@store')->name('loan.create');
		Route::get('/destroy/{loan}', 'LoanController@destroy')->name('loan.destroy');
		Route::get('/returned/{loan}', 'LoanController@returned')->name('loan.returned');
		Route::get('/notReturned', 'LoanController@notReturned')->name('loan.notReturned');
	});
});