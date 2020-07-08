<?php
use App\User;
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
Route::get('/user', 'UserController@index');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//USERS API
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});Route::get('userss','UserController@index');
Route::get('/user', function (Request $request) {
    return $request->user();
});

//USERS API for the user these are the routes
        
// to diplay all the users in the data base in json format
Route::get('userss','UserController@index');
//display single user by id
Route::get('userss/{id}','UserController@show');
//delete a user by id
Route::delete('userss/{id}','UserController@destroy');
//update user by id
Route::put('userss/{id}','UserController@edit');




