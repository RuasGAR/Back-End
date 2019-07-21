<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('mostraTeam/{id}','ClubeController@showTeam');
Route::get('mostraFan/{id}', 'OnlookerController@showFan');
Route::get('listaTeam', 'ClubeController@listTeam');
Route::get('listaFan', 'OnlookerController@listFan');
Route::post('criaTeam', 'ClubeController@createTeam');
Route::post('criaFan', 'OnlookerController@createFan');
Route::put('attTeam{id}', 'ClubeController@updateTeam');
Route::put('attFan{id}', 'OnlookerController@updateFan');
Route::delete('deletaTeam{id}','ClubeController@deleteFan');
Route::delete('deletaFan{id}','OnlookerController@deleteFan');