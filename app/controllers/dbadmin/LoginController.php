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

        if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password')), true))
        {
            return Redirect::to('home');
        }

	}

	/**
	 * Show the form for creating a new resource.
	 * GET
	 *  注销
	 * @return Response
	 */
    public function getLogout()
    {
        Sentry::logout();
        return Redirect::to('admin/login');
    }


}