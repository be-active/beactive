<?php

// home page:
Route::get('/', 'AuthController@home');

// about page:
Route::get('about', function() { return view('about');  });

// login page:
Route::get('/login', ['middleware' => 'guest', 'uses' => 'AuthController@getLogin']);
Route::post('/login', ['middleware' => 'guest', 'uses' => 'AuthController@postLogin']);

// logout page:
Route::get('/logout', ['middleware' => 'auth', 'uses' => 'AuthController@logout']);

// user:
Route::resource('user', 'UserController', ['except' => ['index', 'show', 'destroy']]);

// dashboard:
Route::resource('dashboard', 'DashboardController', ['middleware' => 'auth']);

// geolocation:
Route::resource('geolocation', 'GeolocationController', ['middleware' => 'auth']);

// to-do: 
Route::resource('todo', 'TodoController', ['middleware' => 'auth']);

// appointments:
Route::resource('appointments', 'AppointmentsController', ['middleware' => 'auth']);
Route::resource('show', 'AppointmentsController@show', ['middleware' => 'auth']);

// bmi:
Route::resource('bmi', 'bmiController', ['middleware' => 'auth']);

// healthy quotes:
Route::resource('HealthyQuotes', 'HealthyQuotesController');

// weight:
Route::resource('weight', 'WeightController', ['middleware' => 'auth']);

// geolocation:
Route::resource('geo', 'GeoController', ['middleware' => 'auth']);
