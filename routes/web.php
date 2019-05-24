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

//后台
//登录
Route::get('/adminlogin','Admin\AdminController@admin');
Route::post('/login/do','Admin\UserController@checkLogin');
//管理员列表
Route::get('/adminlist','Admin\UserController@adminList');
//管理员角色
Route::get('/userrole/{uid}','Admin\AdminController@userrole');
//管理员添加
Route::get('/adminadd','Admin\AdminController@adminadd');
Route::post('/add/do','Admin\UserController@adminAddDo');
//管理员修改
Route::get('/adminupdate/{uid}','Admin\AdminController@adminUpdate');
Route::post('/adminupd/do','Admin\UserController@adminUpdateDo');
//管理员删除
Route::post('/adminDel','Admin\UserController@adminDel');
//修改密码
Route::get('/pwd','Admin\AdminController@pwdupdate');
Route::post('/pwd/do','Admin\UserController@adminPwd');
//后台首页
Route::get('/admin','Admin\AdminController@index');
Route::get('/welcome','Admin\AdminController@welcome');
//角色添加
Route::get('/roleadmin','Admin\AdminController@adminrole');
Route::post('/role/do','Admin\UserController@checkRole');
//角色展示
Route::get('/rolelist','Admin\AdminController@rolelist');
//权限添加
Route::get('/poweradd','Admin\AdminController@poweradd');
Route::post('/poweradd/do','Admin\UserController@checkpower');
//权限展示
Route::get('/powerlist','Admin\AdminController@powerlist');
//权限删除
Route::post('/powerDel','Admin\UserController@powerDel');
//导航栏添加
Route::get('/articleadd','Admin\AdminController@articleadd');
Route::post('/articleadd/do','Admin\UserController@checkarticle');
//导航栏展示
Route::get('/articlelist','Admin\AdminController@articlelist');
//导航栏修改
Route::get('/articleupdate/{nav_id}','Admin\AdminController@articleupdate');
Route::post('/articleupdate/do','Admin\UserController@checkupart');
//导航栏删除
Route::post('/navDel','Admin\UserController@navDel');
//分类添加
Route::get('/cateadd','Admin\AdminController@cateadd');
Route::post('/cateadd/do','Admin\UserController@checkcate');
//分类展示
Route::get('/catelist','Admin\AdminController@catelist');
//分类修改
Route::get('/cateupdate/{cate_id}','Admin\AdminController@cateupdate');
Route::post('/cateupdate/do','Admin\UserController@cateupdate');
//分类删除
Route::post('/cateDel','Admin\UserController@cateDel');
//新闻添加
Route::get('/newsadd','Admin\AdminController@newsadd');
Route::post('/newsadd/do','Admin\UserController@checknews');
//新闻展示
Route::get('/newslist','Admin\AdminController@newslist');
//新闻修改
Route::get('/newsupdate/{news_id}','Admin\AdminController@newsupdate');
Route::post('/newsupdate/do','Admin\UserController@newsupdate');
//新闻删除
Route::post('/newsDel','Admin\UserController@newsDel');
//退出
Route::get('/quit','Admin\AdminController@quit');

//前台
Route::get('/index','Index\IndexController@index');
Route::get('/list','Index\IndexController@showlist');
Route::get('/new','Index\IndexController@shownew');
Route::get('/email','Index\IndexController@showemail');
Route::get('/gbook','Index\IndexController@showegbook');