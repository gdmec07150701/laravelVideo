<?php
header("Access-Control-Allow-Origin: *");
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
require __DIR__.'/api/content.php';
Route::get('/', function () {
    return view('welcome');
});

Route::any('/component/uploader','Component\UploadController@uploader');
Route::any('/component/filesLists','Component\UploadController@filesLists');
Route::any('/component/oss','Component\OssController@sign');
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    //后台登录页面
    Route::get('/login', 'EntryController@loginForm');
    //后台验证
    Route::post('/login', 'EntryController@login');
    //后台首页展示
    Route::get('/index', 'EntryController@index');
    //退出账号
    Route::get('/logout', 'EntryController@logout');
    //修改密码
    Route::get('/changePassword', 'MyController@passwordForm');
    Route::post('/changePassword', 'MyController@changePassword');
    //标签
    Route::resource('tag', 'TagController');
    //lesson
    Route::resource('lesson', 'LessonController');
    
    
});


Route::get('/user/{name?}', function ($name = 'jjjj') {
    return 'hijj';
});

Route::get('/user/{name?}', function ($name = 'guodong') {
    return 'hi' . $name;
})->where('name', '[0-9]+');