<?php


Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');
Route::get('/sanpham',['as'=>'sanpham','uses'=>'HomeController@sanpham']);
Route::get('sanpham/{idsp?}','HomeController@laySanPhamTheoDanhMuc');

Route::get('chitietsanpham/{idsp}',[
    'as'=>'chitietsanpham',
    'uses'=>'HomeController@getChitiet'
]);

Route::get('dathang',[
    'as'=>'pages.dathang',
    'uses'=>'HomeController@datHang'
]);
Route::get('dathang/{idsp}',[
    'as'=>'pages.muahang',
    'uses'=>'HomeController@muaHang'
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
Route::get('/lienhe',['as'=>'lienhe','uses'=>'HomeController@lienhe']);



Auth::routes();

Route::group(['prefix' => 'admin'],function(){
    Route::get('dashboard', 'ProductController@dashboard');
    Route::get('AnhBanner','HomeController@getAnhBanner');
    Route::post('AnhBanner','HomeController@postAnhBanner');

    Route::group(['prefix'=>'cate'],function(){
        Route::get('list',['as'=>'admin.cate.list','uses'=>'CateController@getList']);
        Route::get('add',['as'=>'admin.cate.getAdd', 'uses'=>'CateController@getAdd']);
        Route::post('add',['as'=>'admin.cate.postAdd', 'uses'=>'CateController@postAdd']);
        Route::post('edit',['as'=>'admin.cate.edit', 'uses'=>'CateController@editDanhMucAction']);
        Route::get('edit/{madm}',['as'=>'admin.cate.getEdit', 'uses'=>'CateController@suaDanhMuc']);
//        Route::post('edit/{madm}',['as'=>'admin.cate.postEdit', 'uses'=>'CateController@postEdit']);
//        Route::get('delete/{madm}',['as'=>'admin.cate.getDelete', 'uses'=>'CateController@getDelete']);
    });

    Route::group(['prefix'=>'product'],function(){
        Route::get('list',['as'=>'admin.product.list','uses'=>'ProductController@getList']);
        Route::get('add',['as'=>'admin.product.getAdd', 'uses'=>'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd', 'uses'=>'ProductController@postAdd']);
//        Route::get('delete/{idsp}',['as'=>'admin.product.getDelete', 'uses'=>'ProductController@getDelete']);
        Route::get('edit/{idsp}',['as'=>'admin.product.getEdit', 'uses'=>'ProductController@getEdit']);
        Route::post('edit/{idsp}',['as'=>'admin.product.postEdit', 'uses'=>'ProductController@postEdit']);
        Route::get('AddAnh/{idsp}',['as'=>'admin.product.getAddAnh', 'uses'=>'ProductController@getAddAnh']);
        Route::post('AddAnh/{idsp}',['as'=>'admin.product.postAddAnh', 'uses'=>'ProductController@postAddAnh']);
    });

    Route::group(['prefix'=>'order'],function(){
        Route::get('listOrder',['as'=>'admin.order.listOrder','uses'=>'ProductController@listOrder']);
        Route::get('listOrder_detail/{mahd}',['as'=>'admin.order.listOrder_detail', 'uses'=>'ProductController@listOrder_detail']);
//        Route::get('delete/{mahd}',['as'=>'admin.order.getDelete', 'uses'=>'ProductController@DeleteOrder']);
        Route::post('updateStatusOrder/{mahd}',['as'=>'admin.order.update_status', 'uses'=>'ProductController@updateStatusOrder']);

    });
});






