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

Route::get('/','HomeController@index');

Auth::routes();



Route::get('/addcatagori', 'categorycontroller@insertcat')->middleware('auth');
Route::post('/addcatagori', 'categorycontroller@addcaragori')->middleware('auth');

Route::get('/categoryilist', 'categorycontroller@listcat')->middleware('auth');

Route::get('/Delete/cat/{id}','categorycontroller@delete')->middleware('auth');

Route::get('/edit/cat/{id}','categorycontroller@edit')->middleware('auth');
Route::post('/edit/cat/{id}','categorycontroller@updatedata')->middleware('auth');

Route::get('/addproduct', 'productcontroller@insertpro')->middleware('auth');
Route::post('/addproduct', 'productcontroller@addproduct')->middleware('auth');

Route::get('/productilist', 'productcontroller@productilist')->middleware('auth');

Route::get('/Delete/pro/{id}','productcontroller@delete')->middleware('auth');
Route::get('/show/pro/{id}','productcontroller@show')->middleware('auth');

Route::get('/edit/pro/{id}','productcontroller@edit')->middleware('auth');
Route::post('/edit/pro/{id}','productcontroller@updatedata')->middleware('auth');

Route::get('/delete/pro/image/{id}','productcontroller@deletesubimag')->middleware('auth');
route::get('/pro/image/{id}','productcontroller@insertotherimage')->middleware('auth');
route::post('/pro/image/{id}','productcontroller@insertimg')->middleware('auth');

route::get('/pro/active/{id}','productcontroller@active')->middleware('auth');

route::get('/register/user','usercontroller@index')->middleware('auth');
route::post('/register/user','usercontroller@user')->middleware('auth');

route::GET('/userlist','usercontroller@tabel')->middleware('auth');

route::GET('/verified/user/{id}','usercontroller@verified')->middleware('auth');


Route::get('/Delete/user/{id}','usercontroller@delete')->middleware('auth');

Route::get('/edit/user/{id}','usercontroller@edit')->middleware('auth');
Route::post('/edit/user/{id}','usercontroller@updatedata')->middleware('auth');


Route::get('/slider/add','slider@upload')->middleware('auth');
Route::post('/slider/add','slider@uploaddata')->middleware('auth');

Route::get('/listslider','slider@index')->middleware('auth');

Route::get('/Delete/slider/{id}','slider@delete')->middleware('auth');

Route::get('/edit/slider/{id}','slider@edit')->middleware('auth');
Route::post('/edit/slider/{id}','slider@updatedata')->middleware('auth');

Route::get('/review/add','reviewcontroller@add')->middleware('auth');
Route::post('/review/add','reviewcontroller@insert')->middleware('auth');

Route::get('/reviewlist','reviewcontroller@index')->middleware('auth');

Route::get('/Delete/review/{id}','reviewcontroller@delete')->middleware('auth');
Route::get('/show/review/{id}','reviewcontroller@show')->middleware('auth');

Route::get('/edit/review/{id}','reviewcontroller@edit')->middleware('auth');
Route::post('/edit/review/{id}','reviewcontroller@updatedata')->middleware('auth');

Route::get('/review/active/{id}','reviewcontroller@activate')->middleware('auth');

Route::get('/news','newscontroller@index')->middleware('auth');
Route::post('/news','newscontroller@inser')->middleware('auth');


// Route::get('/listnews','newscontroller@listnews')->middleware('auth');
Route::get('listnews', [
    'uses' => 'newscontroller@listnews',
    'as' => 'student-list'
]);

Route::get('/news/show/{id}','newscontroller@show')->middleware('auth');

Route::get('/test','testmodulcontroller@addmoduls')->middleware('auth');
Route::post('/test','testmodulcontroller@insertdata')->middleware('auth');

Route::get('/testlist','testmodulcontroller@index')->middleware('auth');

Route::get('/Delete/test/{id}','testmodulcontroller@delete')->middleware('auth');

Route::get('/edit/test/{id}','testmodulcontroller@edit')->middleware('auth');
Route::post('/edit/test/{id}','testmodulcontroller@updatedata')->middleware('auth');

Route::get('/show/test/{id}','testmodulcontroller@show')->middleware('auth');

Route::get('/settings','settings@get')->middleware('auth');
Route::post('/settings','settings@updatedata')->middleware('auth');


Route::get('/dashboard','dashboard@index')->middleware('auth');




Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','HomeController@products');

Route::post('/addcart/{id}','HomeController@addcart');

Route::get('/cart','cart@view');
Route::get('/removecat/{id}','cart@delete');
Auth::routes();


Route::get('admin', 'dashboard@index')->name('admin.route')->middleware('admin');


Route::get('/products/select/{id}','select@products');

Route::post('search','select@select');
Route::get('/addregister','HomeController@register');
Route::post('/addregister','HomeController@addregister');

Route::get('/search','HomeController@search');
Route::get('/contact','HomeController@contact');

Route::post('/contactmsg','HomeController@contactmsg');

Route::get('/checkout','checkout@index');

Route::post('/checkoutinsert','checkout@checkoutinsert');

Route::get('/orderlist','showorder@index');

Route::get('/Delete/order/{id}','showorder@delete');

Route::get('/PDF/{id}','productcontroller@PDF');

Route::get('file-import-export', 'UserController@fileImportExport');
Route::post('file-import', 'UserController@fileImport')->name('file-import');
Route::get('file-export', 'UserController@fileExport')->name('file-export');