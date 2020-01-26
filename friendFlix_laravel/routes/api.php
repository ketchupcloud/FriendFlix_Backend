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
//NOTA: ao fazer request no postman para update==PUT, usar a aba BODY URLENCODED
Route::get('listUsers', 'UserController@listUsers');
Route::get('getUser/{id}', 'UserController@getUser');
Route::post('createUser', 'UserController@createUser');
Route::put('updateUser/{id}', 'UserController@updateUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');

Route::get('listSeries', 'SeriesController@listSeries');
Route::get('seriesId/{id}', 'SeriesController@seriesId');
Route::post('createSeries', 'SeriesController@createSeries');
Route::put('updateSeries/{id}', 'SeriesController@updateSeries');
Route::delete('deleteSeries/{id}', 'SeriesController@deleteSeries');

Route::post('createComment', 'CommentController@createComment');

Route::post('createEpisode', 'EpisodeController@createEpisode');
Route::put('updateEpisode/{id}', 'EpisodeController@updateEpisode');
Route::delete('deleteEpisode/{id}', 'EpisodeController@deleteEpiosde');

