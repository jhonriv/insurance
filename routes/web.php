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

Route::resource('usuarios', 'App\Http\Controllers\UsuarioController');

Route::post('usuarios/{id}/getestados', 'App\Http\Controllers\UsuarioController@getestados')->name('usuarios.getestados');
Route::post('usuarios/{id}/getciudades', 'App\Http\Controllers\UsuarioController@getciudades')->name('usuarios.getciudades');
Route::post('usuarios/{id}/getedit', 'App\Http\Controllers\UsuarioController@getedit')->name('usuarios.getedit');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
