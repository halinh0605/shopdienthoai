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

Auth::routes([
    'register' => false,
    'verify' => true,
    'reset' => false
]);

Route::get('admin/login','LoginController@getLogin');
Route::post('login_submit','LoginController@postLogin');

Auth::routes();

Route::get('/home', 'HomeController@index');

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
        Route::get('addAnh/{idsp}',['as'=>'admin.product.getAddAnh', 'uses'=>'ProductController@getAddAnh']);
        Route::post('addAnh/{idsp}',['as'=>'admin.product.postAddAnh', 'uses'=>'ProductController@postAddAnh']);
    });
});

Route::get('/','HomeController@getIndex');

Route::get('/sanpham',['as'=>'sanpham','uses'=>'HomeController@sanpham']);
Route::get('sanpham/{idsp?}','HomeController@getSanPham');

Route::get('chitietsanpham/{idsp}',[
    'as'=>'chitietsanpham',
    'uses'=>'HomeController@getChitiet'
]);

Route::get('dathang',[
    'as'=>'pages.dathang',
    'uses'=>'HomeController@datHang'
]);

Route::get('giohang/{idsp}',[
    'as'=>'giohang',
    'uses'=>'HomeController@giohang'
]);
Route::get('giohang',[
    'as'=>'giohang',
    'uses'=>'HomeController@tranggiohang'
]);
Route::get('xoasanpham/{idsp}',[
    'as' =>'xoasanpham',
    'uses'=>'HomeController@xoasanpham'
]);
Route::post('capnhap-soluong-giohang',[
    'as'=>'capnhap',
    'uses'=>'HomeController@capnhap'
]);
Route::post('addDonhang',[
    'as'=>'addDonhang',
    'uses'=>'HomeController@postDonhang'
]);
Route::post('capnhap-iconGiohang',[
    'as'=>'capnhapicon',
    'uses'=>'HomeController@capnhapicon'
]);



