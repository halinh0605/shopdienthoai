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

//Route::get('/index', function () {
//    return view('welcome');
//});
Route::get('admin/login','LoginController@getLogin');
Route::post('login_submit','LoginController@postLogin');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@dashboard');

Route::group(['prefix' => 'admin'],function(){
    Route::group(['prefix'=>'cate'],function(){
        Route::get('list',['as'=>'admin.cate.list','uses'=>'CateController@getList']);
        Route::get('add',['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
        Route::post('add',['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
    });
});
Route::group(['prefix' => 'admin'],function(){
    Route::group(['prefix'=>'product'],function(){
        Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);
        Route::get('add',['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
        Route::get('delete/{idsp}',['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
        Route::get('edit/{idsp}',['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        Route::post('edit/{idsp}',['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);

    });
});

Route::get('','HomeController@getIndex');

Route::get('sanpham',['as'=>'sanpham','uses'=>'HomeController@sanpham']);
Route::get('sanpham/{idsp?}','HomeController@getSanPham');

Route::get('chi-tiet-san-pham/{idsp}',[
    'as'=>'chitietsanpham',
    'uses'=>'HomeController@getChitiet'
]);

