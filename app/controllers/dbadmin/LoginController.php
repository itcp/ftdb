<?php
namespace Dbadmin;

use Auth, BaseController, Form, Input, Redirect, Sentry;

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dbadmin/login
	 *  登录
	 * @return Response
	 */
	public function postIndex()
    {
        //$password = Hash::make(Input::get('password'));
echo Input::get('username').'<br />88'.Input::get('password');
/*
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => $password)))
        {
                return Redirect::to('home');

            return '登录不成功，请确认用户或密码！';
        }
/*
        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
        {
            return Redirect::to('home');

            return '登录不成功，请确认用户或密码！';
        }
*/


    }

	/**
	 * Show the form for creating a new resource.
	 * GET
	 *  注销
	 * @return Response
	 */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('admin/login');
    }


}