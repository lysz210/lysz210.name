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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/webhook', function (Request $req) {
    if ($req->input('hub.mode') === 'subscribe' && $req->input('hub.verify_token') === 'sh_web_hook_key') {
        return $req->input('hub.challenge');
    } else {
	throw new \Exception('Failed validation. Make sure the validation tokens match.');
    }
});

