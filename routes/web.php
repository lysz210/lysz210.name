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

Route::view('/cv', 'cv');

Route::get('/{webBase?}/{any?}', function () {
    return view('home');
})->where([
    'webBase' => '^(?!api)\w*$',
    'any' => '.*'
]);

// Route::redirect('/{any?}', '/app')->where('any', '.*');
