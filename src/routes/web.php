<?php

use Illuminate\Support\Facades\Route;

use splittlogic\packagemaker\Http\Controllers\packagemakerController;

/*
|--------------------------------------------------------------------------
| Routes must be passed through the web middleware to allow for
|   validation errors and flash messages to be displayed.
|--------------------------------------------------------------------------
*/

Route::get(
  'splittlogic/packagemaker',
  [
    'middleware' => 'web',
    'uses' => 'splittlogic\packagemaker\Http\Controllers\packagemakerController@index'
  ]
)->name('splittlogic.packagemaker');

Route::post(
  'splittlogic/packagemaker/store',
  [
    'middleware' => 'web',
    'uses' => 'splittlogic\packagemaker\Http\Controllers\packagemakerController@store'
  ]
)->name('splittlogic.packagemaker.store');
