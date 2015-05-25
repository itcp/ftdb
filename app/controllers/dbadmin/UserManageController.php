<?php
namespace Dbadmin;
//trying to get property of non-object array to string conversion
use BaseController, Form, Input, View,Request,Auth,DB,User,Hash,Redirect,Reason;
class UserManageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /dbadmin/usermanage
	 *
	 * @return Response
	 */
	public function index()
	{

        if(isset($_GET['do'])&&$_GET['do']=='delete'){
            $id = $_GET['id'];
            $this->delete($id);
        }else if(isset($_GET['do'])&&$_GET['do']=='edit'){
            $id = $_GET['id'];
            $user =User::find($id);

            return View::make('dbadmin.aedit')->with(array('urs'=>$user));
        }else{
            $user = User::all();

            $udt = array();
            $i = 0;
            foreach ($user as $userdt) {
                $udt[$i]['id'] = $userdt->id;
                $udt[$i]['username'] = $userdt->username;
                $udt[$i]['name'] = $userdt->name;
                $udt[$i]['sex'] = $userdt->sex;
                $udt[$i]['telephone'] = $userdt->telephone;
                $udt[$i]['phone'] = $userdt->phone;
                $udt[$i]['email'] = $userdt->email;
                $udt[$i]['qq'] = $userdt->qq;
                $udt[$i]['wechat'] = $userdt->wechat;
                $udt[$i]['identity'] = $userdt->identiy;
                $udt[$i]['registration_time'] = $userdt->registration_time;
                $udt[$i]['lalt'] = $userdt->last_login_time;
                $i++;
            }
            return View::make('dbadmin.list')->with(array('users' => $udt));
        }
	}
    //  我的信息设置的视图组装
    protected function index2(){

        $id = Auth::user()->id;
        $user = User::find($id);

        return View::make('dbadmin.useris')->with(array('users'=>$user));
    }

	/**
	 * Show the form for creating a new resource.
	 * GET /dbadmin/usermanage/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /dbadmin/usermanage
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /dbadmin/usermanage/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /dbadmin/usermanage/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function add()
    {
        //if(Request::ajax()){

            $username = $_POST['username'];
            $name = $_POST['name'];
            $password = $_POST['password'];
            $password = Hash::make($password);
            $sex = $_POST['sex'];
            $phone = $_POST['phone'];
            $identity = $_POST['identity'];

            $reason = User::create(array('username' => $username,'name'=>$name,'password'=>$password,'sex'=>$sex,'phone'=>$phone,'identity'=>$identity));

            if($reason==true){
                echo '增加成功！';
                sleep(4);
                return Redirect::to('adminset');
            }else{
                echo '添加失败';
            }
       // }

    }

	public function edit()
	{
        $id = $_POST['id'];
        $username = $_POST['username'];
        $name = $_POST['name'];

        $sex = $_POST['sex'];
        $phone = $_POST['phone'];
        $identity = $_POST['identity'];

        $ured = User::find($id);

        $ured->username = $username;
        $ured->name = $name;
        $ured->sex = $sex;
        $ured->phone = $phone;
        $ured->identity = $identity;


        if($ured->save()){
            return Redirect::to('adminset');
        }else{
            return '修改不成功！';
        }
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /dbadmin/usermanage/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
        $id = $_POST['id'];
        $username = $_POST['username'];
        $name = $_POST['name'];

        $sex = $_POST['sex'];
        $telephone = $_POST['telephone'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $qq = $_POST['qq'];
        $wechat = $_POST['wechat'];

        $ured = User::find($id);

        $ured->username = $username;
        $ured->name = $name;
        $ured->sex = $sex;
        $ured->phone = $phone;
        $ured->telephone = $telephone;
        $ured->email = $email;
        $ured->qq = $qq;
        $ured->wechat = $wechat;

        if($ured->save()){
            return Redirect::to('useris');
        }else{
            return '修改不成功！';
        }
	}


	protected function delete($id)
	{
        $tr = User::find($id);
        $tr ->delete();
	}

}