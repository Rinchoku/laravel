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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', 'App\Http\Controllers\Auth\LoginController@authenticate');
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

Route::group([
    'prefix' => 'demo',
], function () {
    Route::get('s3', 'App\Http\Controllers\DemoController@s3');
});

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/test', 'App\Http\Controllers\TestController@index');
});
