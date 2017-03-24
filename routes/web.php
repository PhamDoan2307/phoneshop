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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@getAll']);

//
//                          GroupProduct
    Route::group(['prefix' => 'groupproduct'], function () {
//        show list group
        Route::get('/', ['as' => 'admin.groupproduct.getList', 'uses' => 'Admin\GroupProductController@getList']);
//        Route::post('/', ['as' => 'admin.groupproduct.postList', 'uses' => 'Admin\GroupProductController@postList']);

        Route::post('/checkName', ['as' => 'admin.groupproduct.checkName', 'uses' => 'Admin\GroupProductController@checkName']);
//          Add group
        Route::get('add', ['as' => 'admin.groupproduct.getAdd', 'uses' => 'Admin\GroupProductController@getAdd']);
        Route::post('add', ['as' => 'admin.groupproduct.postAdd', 'uses' => 'Admin\GroupProductController@postAdd']);
//          Edit group
        Route::get('edit/{id}', ['as' => 'admin.groupproduct.getEdit', 'uses' => 'Admin\GroupProductController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.groupproduct.postEdit', 'uses' => 'Admin\GroupProductController@postEdit']);
    });
//
//                              Color
    Route::group(['prefix' => 'color'], function () {
//        show list group
        Route::get('/', ['as' => 'admin.color.getList', 'uses' => 'Admin\ColorController@getList']);
//          Add group
        Route::get('add', ['as' => 'admin.color.getAdd', 'uses' => 'Admin\ColorController@getAdd']);
        Route::post('add', ['as' => 'admin.color.postAdd', 'uses' => 'Admin\ColorController@postAdd']);
//          Edit group
        Route::get('edit/{id}', ['as' => 'admin.color.getEdit', 'uses' => 'Admin\ColorController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.color.postEdit', 'uses' => 'Admin\ColorController@postEdit']);
    });
    //
//                              COMPANY
    Route::group(['prefix' => 'company'], function () {
//        show list group
        Route::get('/', ['as' => 'admin.company.getList', 'uses' => 'Admin\CompaniesController@getList']);
//          Add group
        Route::get('add', ['as' => 'admin.company.getAdd', 'uses' => 'Admin\CompaniesController@getAdd']);
        Route::post('add', ['as' => 'admin.company.postAdd', 'uses' => 'Admin\CompaniesController@postAdd']);
//          Edit group
        Route::get('edit/{id}', ['as' => 'admin.company.getEdit', 'uses' => 'Admin\CompaniesController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.company.postEdit', 'uses' => 'Admin\CompaniesController@postEdit']);
    });
    //
//                              Product
    Route::group(['prefix' => 'product'], function () {
//        show list group
        Route::get('/', ['as' => 'admin.product.getList', 'uses' => 'Admin\ProductController@getList']);
//          Add group
        Route::get('add', ['as' => 'admin.product.getAdd', 'uses' => 'Admin\ProductController@getAdd']);
        Route::post('add', ['as' => 'admin.product.postAdd', 'uses' => 'Admin\ProductController@postAdd']);
//          Edit group
        Route::get('edit/{id}', ['as' => 'admin.product.getEdit', 'uses' => 'Admin\ProductController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.product.postEdit', 'uses' => 'Admin\ProductController@postEdit']);
//        delete img_detail
        Route::post('show',['uses'=>'Admin\ProductController@showById']);

    });
    Route::get('test',function(){
       return view('admin.test');
    });
    Route::post('/delImg',['as'=>'delImg', 'uses' => 'Admin\ProductController@postDelImg']);

    //
//                              Menu Admin
    Route::group(['prefix' => 'menu'], function () {
//        show list group
        Route::get('/', ['as' => 'admin.menu.getList', 'uses' => 'Admin\AdminMenuController@getList']);
//          Add group
        Route::get('add', ['as' => 'admin.menu.getAdd', 'uses' => 'Admin\AdminMenuController@getAdd']);
        Route::post('add', ['as' => 'admin.menu.postAdd', 'uses' => 'Admin\AdminMenuController@postAdd']);
//          Edit group
        Route::get('edit/{id}', ['as' => 'admin.menu.getEdit', 'uses' => 'Admin\AdminMenuController@getEdit']);
        Route::post('edit/{id}', ['as' => 'admin.menu.postEdit', 'uses' => 'Admin\AdminMenuController@postEdit']);
    });

});
Route::get('add1', [ 'uses' => 'Admin\AdminMenuController@getAdd1']);
Route::post('add1', ['uses' => 'Admin\AdminMenuController@postAdd1']);
//Route::get('test', ['as' => 'getAll', 'uses' => 'Admin\GroupProductController@getAll']);