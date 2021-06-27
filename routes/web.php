<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['setlocale'])
    ->prefix('{locale}')
    -> group(function () {
    Route::prefix('cv')->group(function () {
        Route::get('', function () {
            return view('cv', ['withMail' => filter_var(request('withMail', false), FILTER_VALIDATE_BOOLEAN)]);
        });
        Route::get('pdf', function () {
            return PDF::loadView('cv', ['isPdf' => true, 'withMail' => true])->download('CV-Lingyong-Sun.pdf');
        });
    });
});

Route::get('/{webBase?}/{any?}', function () {
    return view('home');
})->where([
    'webBase' => '^(?!api)\w*$',
    'any' => '.*'
]);
