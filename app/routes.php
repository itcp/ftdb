<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//  先判断用户是否登录，如已登录-重定向跳转到管理后台的首页，没有登录则重定向跳转到登录页

Route::get('/', function()
{
    if(Auth::check()){
        return Redirect::to('home');
    }else{
        return Redirect::to('admin/login');
    }

});

Route::get('admin/login',function(){
    return View::make('dbadmin.login');
});

Route::get('setup/ro',function(){
    return View::make('setup.index');
});

Route::get('dbadmin/in', array('uses' => 'Dbadmin\LoginController@postIndex'));
Route::get('setup',array('before'=>'login_n',function()
{
    return View::make('setup.index');
}));

Route::group(array('namespace'=>'CommunicationRecord'),function(){
    Route::get('home','CommunicationController@home');


});
//  管理员栏目组
Route::group(array('namespace'=>'Dbadmin'),function(){

    Route::post('admin/login','LoginController@postIndex');
    Route::get('logout','LoginController@getLogout');
    Route::get('adminset','UserManageController@index');
    Route::post('useradd','UserManageController@add');
    Route::post('userup','UserManageController@update');
    Route::post('usered','UserManageController@edit');
    Route::get('useris','UserManageController@index2');

});
//  设置组
Route::group(array('namespace'=>'Setup'),function(){
    Route::post('setupadd','GoSetupController@typeAdd');
    Route::get('setup','GoSetupController@typeView');
    Route::post('setuped','GoSetupController@typeModify');
});

//  会议活动组
Route::group(array('namespace'=>'Meeting'),function(){

});

//  客户通讯录组
Route::group(array('namespace'=>'CommunicationRecord'),function(){
    Route::get('cus/add','CommunicationController@addView');
    Route::post('cuspro','CommunicationController@pos');
    Route::post('cusadd','CommunicationController@add');
});

//  客户跟进组
Route::group(array('namespace'=>'CustomerTracking'),function(){

});