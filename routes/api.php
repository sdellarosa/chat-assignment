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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Messages API
 */

Route::post(
    'messages', 
    [
        'uses' => 'API\MessageController@store',
        'as' => 'messages.store',
    ]
);

Route::get(
    'messages/{user}', 
    [
        'uses' => 'API\MessageController@index',
        'as' => 'messages.index',
    ]
);

Route::get(
    'messages/{user1}/{user2}', 
    [
        'uses' => 'API\MessageController@retrieve',
        'as' => 'messages.retrieve',
    ]
);

/* for JSON-API compliance
Route::get(
    'messages/{message}', 
    [
        'uses' => 'API\MessageController@show',
        'as' => 'messages.show',
    ]
);

Route::get(
    'messages/{message}/relationships/author',
    [
        'uses' => 'API\MessageRelationshipController@author',
        'as' => 'messages.relationships.author',
    ]
);

Route::get(
    'messages/{message}/author',
    [
        'uses' => 'API\MessageRelationshipController@author',
        'as' => 'messages.author',
    ]
);

Route::get(
    'messages/{message}/relationships/recipient',
    [
        'uses' =>  'API\MessageRelationshipController@recipient',
        'as' => 'messages.relationships.recipient',
    ]
);

Route::get(
    'messages/{message}/recipient',
    [
        'uses' =>  'API\MessageRelationshipController@recipient',
        'as' => 'messages.recipient',
    ]
);
*/