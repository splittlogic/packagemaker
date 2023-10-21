<?php

use Illuminate\Support\Facades\Route;

use [vendor]\[package]\Http\Controllers\[package]Controller;

/*
|--------------------------------------------------------------------------
| Routes must be passed through the web middleware to allow for
|   validation errors and flash messages to be displayed.
|--------------------------------------------------------------------------
*/

Route::get(
  '[vendor]/[package]',
  [[package]Controller::class, 'index']
)->name('[vendor].[package]');
