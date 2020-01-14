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
// 闭包路由
Route::get('/hello', function () {
    return view('hello');
});
// 控制器方法路由
Route::get('/aa','IndexController@test');
// 路由视图
Route::view('/nina','hello',['name' => '妮娜']);

// Route::view('/login','login');
// Route::match(['get','post'],'/login','IndexController@login');
// 支持多种路由的方法
Route::any('/login','IndexController@login');
Route::post('/dologin','IndexController@dologin');

// 必填路由
// Route::get('/goods/{id}', function($id) {
//   return $id;
// });

// Route::get('/goods/{id}','IndexController@goods')->where('id','\d+');
//可选参数
Route::get('/goods/{id}/{name?}','IndexController@getgoods')->where('id','\d+');

// 品牌
Route::prefix('brand')->middleware('checklogin')->group(function(){
    Route::get('create','BrandController@create');
    Route::post('store','BrandController@store');
    Route::get('/','BrandController@index');
    Route::get('edit/{id}','BrandController@edit');
    Route::post('update/{id}','BrandController@update');
    // Route::get('del/{id}','BrandController@destroy');
     Route::post('del/{id}','BrandController@destroy');
      // ajax验证唯一性
    Route::get('checkOnly','BrandController@checkOnly');

});
// 考试
Route::prefix('student')->group(function(){
   Route::get('create','StudentsController@create');
   Route::post('store','StudentsController@store');
   Route::get('/','StudentsController@index');

});
// 考试
Route::prefix('yuangong')->group(function(){
    Route::get('create','YuangongController@create');

});

// 考试
Route::get('/list','StudentController@lists');

//考试
Route::prefix('book')->group(function(){
    Route::get('create','BookController@create');
    Route::post('store','BookController@store');
    Route::get('/','BookController@index');
});

// 分类

Route::prefix('category')->group(function(){
    Route::get('create','CategoryController@create');
    Route::post('store','CategoryController@store');
    Route::get('/','CategoryController@index');
    Route::get('edit/{id}','CategoryController@edit');
    Route::post('update/{id}','CategoryController@update');
    Route::get('del/{id}','CategoryController@destroy');
});

//新闻
Route::prefix('news')->group(function(){
    Route::get('create','NewsController@create');
    Route::post('store','NewsController@store');
    Route::get('/','NewsController@index');
});

//登录
Route::get('login/login','LoginController@login');
Route::post('login/do_login','LoginController@do_login');
Route::get('login/login_out','LoginController@login_out');

//文章
Route::prefix('artisan')->group(function(){
    Route::get('create','ArtisanController@create');
    Route::post('store','ArtisanController@store');
    Route::get('/','ArtisanController@index');
    Route::get('edit/{id}','ArtisanController@edit');
    Route::post('update/{id}','ArtisanController@update');
    Route::get('del/{id}','ArtisanController@destroy');
});
//商品
Route::prefix('shop')->group(function(){
    Route::get('create','ShopController@create');
    Route::post('store','ShopController@store');
    Route::get('/','ShopController@index');
    Route::get('edit/{id}','ShopController@edit');
    Route::post('update/{id}','ShopController@update');
    Route::get('del/{id}','ShopController@destroy');
    //  Route::post('del/{id}','ShopController@destroy');
});


// 商品
Route::prefix('goods')->group(function(){
    Route::get('create','GoodsController@create');
    Route::post('store','GoodsController@store');
    Route::get('/','GoodsController@index');
    Route::get('edit/{id}','GoodsController@edit');
    Route::post('update/{id}','GoodsController@update');
    Route::get('del/{id}','GoodsController@destroy');
    Route::get('show/{id}','GoodsController@show');
    Route::post('addcart','GoodsController@addcart');
});


// 发送邮件
Route::get('send','GoodsController@sendemail');