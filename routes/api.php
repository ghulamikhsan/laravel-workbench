<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();

// });

// Route::post('register', 'UserApiController@register');
// Route::post('login', 'UserApiController@login');
// Route::get('user_id', 'AuthUserController@user_id');

// DB
Route::get('userall', 'AuthUserController@userAuth')->middleware('jwt.verify');
Route::get('user', 'UserApiController@getAuthenticatedUser')->middleware('jwt.verify');

//Login with google
Route::post('register', 'Api\AuthAPIController@register');
Route::post('login', 'Api\AuthAPIController@login');
Route::post('login-google', 'Api\AuthAPIController@google');
Route::resource('user', 'Api\UserAPIController')->middleware('jwt.verify');

//Job
Route::middleware('jwt.verify')->group( function(){
    Route::get('/jobs', 'JobApiController@index');
    Route::get('jobs/{$id}', 'JobApiController@show');
    Route::post('/jobs/create', 'JobApiController@create');
    Route::put('jobs/{jobs}', 'JobApiController@update');
    Route::delete('jobs/{jobs}', 'JobApiController@delete');
});

//status
Route::get('/status', 'StatusApiController@index');
