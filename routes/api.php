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
Route::get('users', 'api\UserController@index');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', 'api\UserController@login');
    Route::post('register', 'api\UserController@register');
    Route::post('logout', 'api\UserController@logout');
    Route::post('refresh', 'api\UserController@refresh');
    Route::get('user-profile', 'api\UserController@userProfile');
    Route::post('update-profile/{id}', 'api\UserController@update_profile');
    Route::post('add-cart', 'api\CartController@addcart');
    Route::post('remove-cart', 'api\CartController@removecart');
    Route::get('product', 'api\ProductController@getproduct');
    Route::post('product-by-cat', 'api\ProductController@getproductbycat');
    Route::post('product-by-search', 'api\ProductController@getproductbysearch');

});


