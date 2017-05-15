<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::group(['prefix'=>'admin']);
Route::group([], function(){
    Route::match(['get', 'post'], '/', ['uses' => 'IndexController@execute', 'as' => 'home']);
    Route::get('/page/{alias}', ['uses' => 'PageController@execute', 'as' => 'page']);
    Route::auth();
});
Route::group(['prefix'=>'/admin', 'middleware'=> 'auth'],function(){
    Route::get('/', function(){
        if(view()->exists('admin.index')){
            return view('admin.index', ['title'=> 'Панель администратора']);
        }
    });

    //admin/pages
    Route::group(['prefix' => '/pages'], function(){
        Route::get('/', ['uses' => 'PagesController@execute', 'as' => 'pages']);
        //admin/pages/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PagesAddController@execute', 'as'=> 'pagesAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{page}', ['uses' => 'PagesEditController@execute', 'as'=> 'pagesEdit']);
    });
    //admin/portfolio
    Route::group(['prefix' => '/portfolios'], function(){
        Route::get('/', ['uses' => 'PortfoliosController@execute', 'as' => 'portfolios']);
        //admin/portfolios/add
        Route::match(['get', 'post'], '/add', ['uses' => 'PortfoliosAddController@execute', 'as'=> 'portfoliosAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{portfolio}', ['uses' => 'PortfoliosEditController@execute', 'as'=> 'portfoliosEdit']);
    });
    //admin/portfolio
    Route::group(['prefix' => '/services'], function(){
        Route::get('/', ['uses' => 'ServicesController@execute', 'as' => 'services']);
        //admin/portfolios/add
        Route::match(['get', 'post'], '/add', ['uses' => 'ServicesAddController@execute', 'as'=> 'servicesAdd']);
        Route::match(['get', 'post', 'delete'], '/edit/{services}', ['uses' => 'ServicesEditController@execute', 'as'=> 'servicesEdit']);
    });


});
Route::auth();

Route::get('/home', 'HomeController@index');
