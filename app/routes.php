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
Route::get('hello','HomeController@showWelcome');

Route::get('/', function()
{
    if(Auth::check()){
        return Redirect::to('home');

    }else{
        return Redirect::to('admin/login');

    }

});

Route::get('admin/login',function(){


    if(Auth::check()){
        return Redirect::to('home');
       // echo '1';
    }else{
        return View::make('dbadmin.login');
      //  echo '2';
    }
});
    //  登录
Route::post('admin/login',function() {
    if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')))) {
        return Redirect::to('home');

        return '登录不成功，请确认用户或密码！';
    }
});

//  退出
Route::get('logout',function(){
   Auth::logout();

    return Redirect::route('admin.login');
}

);
/*******************************/
Route::get('setup/ro',function(){
    return View::make('setup.index');
});

Route::get('dbadmin/in', array('uses' => 'Dbadmin\LoginController@postIndex'));
Route::get('setup',array('before'=>'login_n',function()
{
    return View::make('setup.index');
}));


//  有要调用地区二级菜单时返回城市列表
Route::post('city','HomeController@proIdcity');
Route::post('cityn','HomeController@proNamecity');


//  管理员栏目组
Route::group(array('namespace'=>'Dbadmin'),function(){

    Route::get('logout','LoginController@getLogout');
    Route::get('adminset','UserManageController@index');
    Route::post('useradd','UserManageController@add');
    Route::post('userup','UserManageController@update');
    Route::post('usered','UserManageController@edit');
    Route::get('useris','UserManageController@index2');

});
//  设置组
Route::group(array('before'=>'login_n','namespace'=>'Setup'),function(){
    Route::post('setupadd','GoSetupController@typeAdd');
    Route::get('setup','GoSetupController@typeView');
    Route::post('setuped','GoSetupController@typeModify');

});

//  会议活动组
Route::group(array('before'=>'login_n','namespace'=>'Meeting'),function(){
    Route::get('meeting','MeetingSetupController@meetingList');
    Route::get('mee/add','MeetingSetupController@addView');    //  加载添加页面视图
    Route::get('mee/edit','MeetingSetupController@editView');    //  加载添加页面视图
    Route::get('meetings','MeetingSetupController@details');

    Route::post('meepro','MeetingSetupController@pos');
    Route::post('mee/poadd','MeetingSetupController@add');        //  post添加处理
    Route::post('mee/edit','MeetingSetupController@edit');   // 编辑修改
    Route::post('/mee/dateyz','MeetingSetupController@yz');

});

//  客户通讯录组
Route::group(array('before'=>'login_n','namespace'=>'CommunicationRecord'),function(){
    Route::get('home','CommunicationController@home');
    Route::get('cus/add','CommunicationController@addView');    //  加载添加页面视图
    Route::get('cus/edit','CommunicationController@editView');   // 编辑修改

    Route::post('cusadd','CommunicationController@add');        //  post添加处理
    Route::get('cus/edjson','CommunicationController@edjson');
    Route::post('cus/poed','CommunicationController@edit');

});

//  客户跟进组
Route::group(array('before'=>'login_n','namespace'=>'CustomerTracking'),function(){
    Route::get('custra','CustomerTrackingSetController@listView');
    Route::get('custra/add','CustomerTrackingSetController@addView');
});