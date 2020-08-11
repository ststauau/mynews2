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


Auth::routes();


Route::get('/', function () {
    return view('welcome');
});

Route::get('/info', 'HomeController@info');



// Route::group(['prefix' => 'admin'], function() {
//      Route::get('news/create', 'Admin\NewsController@add');
//     //    Route::get('XXX', 'AAAController@bbb');

//     // Route::get('profile/create', 'Admin\ProfileController@create');
//     // Route::get('profile/edit', 'Admin\ProfileController@edit');
    
// });



// Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function() {

//     Route::get('profile/create', 'Admin\ProfileController@add');

//     Route::get('profile/edit', 'Admin\ProfileController@edit');

//     Route::get('news/create','Admin\NewsController@add');

// });


// Route::group(['prefix' => 'users', 'middleware'=>'auth'], function() {
//     Route::get('profile/edit', 'Users\ProfileController@edit');
//     Route::get('news/create','Users\NewsController@add');
// });


Route::get('/home', 'HomeController@index')->name('home');



/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    Route::get('/home', 'HomeController@index')->name('home');
});
 
/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');

    // laravel 15で追加
    Route::get('news', 'Admin\NewsController@index');
});
 
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout',   'Admin\LoginController@logout')->name('admin.logout');
    Route::get('home',      'Admin\HomeController@index')->name('admin.home');


    Route::get('news/create', 'Admin\NewsController@add');
    Route::post('news/create', 'Admin\NewsController@create');


    Route::get('profile/create', 'Admin\ProfileController@add');
    Route::post('profile/create', 'Admin\ProfileController@create');


    // 16
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    Route::post('profile/edit', 'Admin\ProfileController@update');

    // 16
    Route::get('profile', 'Admin\ProfileController@index');
    Route::get('profile/delete', 'Admin\ProfileController@delete');

    
// Laravel 15
    Route::get('news/edit', 'Admin\NewsController@edit');
    Route::post('news/edit', 'Admin\NewsController@update');


    Route::get('news/delete', 'Admin\NewsController@delete');


});


Route::get('/', 'NewsController@index');

Route::get('/profile', 'ProfileController@index');