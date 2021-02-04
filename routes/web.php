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
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web','is_admin','auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/','HomeController@Index' )->name('Home');

Route::group([
    'prefix'=>'admin',
    'namespace'=> 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth','is_admin']
],function(){
    Route::get('/users', 'UserController@index')->name('updateUser');
    Route::get('/users/toggleAdmin/{user}', 'UserController@toggleAdmin')->name('toggleAdmin');
    
    Route::get('/test1','IndexController@test1')->name('test1');
    Route::get('/test2','IndexController@test2')->name('test2');

    Route::get('/parser','ParserController@index')->name('parser');

    Route::get('/','NewsController@index')->name('index');
    Route::match(['get','post'],'/create','NewsController@create')->name('create');
    Route::get('/edit/{news}', 'NewsController@edit')->name('edit');
    Route::post('/update/{news}', 'NewsController@update')->name('update');
    Route::get('/destroy/{news}', 'NewsController@destroy')->name('destroy');
});

Route::match(['post','get'], '/profile', 'ProfileController@update')->name('updateProfile');

Route::get('/auth/vk','LoginController@loginVk')->name('vklogin');
Route::get('/auth/vk/response','LoginController@responseVk')->name('vkResponse');

Route::get('/auth/fb','LoginController@loginFb')->name('fblogin');
Route::get('/auth/fb/response','LoginController@responseFb')->name('fbResponse');

Route::group([
    'prefix'=> 'news',
    'as'=> 'news.'
],function(){
    
    Route::get('/','NewsController@index')->name('index');
    Route::get('/one/{news}','NewsController@show')->name('show'); //news - имя модели, типо ожидается объект
    Route::group([
        'as'=>'category.'
    ],function(){
    Route::get('/categories', 'CategoryController@index')->name('index');
    Route::get('/category/{name}', 'CategoryController@show')->name('show');
    });
    

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
