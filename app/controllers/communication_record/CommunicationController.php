<?php
namespace CommunicationRecord;
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/6
 * Time: 17:33
 */
use BaseController, Form, Input, Redirect, Sentry, View,User,Auth,Customers,SetType,TypeRecord,Provinces,Citys;
// 客户通讯录
class CommunicationController extends \BaseController{

    public function home(){
        $i_us = Auth::user()->identity;
        if($i_us == 1){
            $cust = Customers::all();

            $custs = array();
            $i = 0;
            foreach ($cust as $cus) {
                $custs[$i]['id'] = $cus->id;
                $custs[$i]['company'] = $cus->company;
                $custs[$i]['contact'] = $cus->contact;
                $custs[$i]['position'] = $cus->position;
                $custs[$i]['sex'] = $cus->sex;

                $custs[$i]['telephone'] = $cus->telephone;
                $custs[$i]['phone'] = $cus->phone;
                $custs[$i]['email'] = $cus->email;
                $custs[$i]['qq'] = $cus->qq;
                $custs[$i]['wechat'] = $cus->wechat;

                //$custs[$i]['identity'] = $cus->identiy;

                $custs[$i]['registration_time'] = $cus->registration_time;

                $custs[$i]['province'] = $cus->province;

                $custs[$i]['city'] = $cus->city;

                $custs[$i]['address'] = $cus->address;
                $custs[$i]['reason'] = $cus->reason;

                $custs[$i]['remarks'] = $cus->remarks;
                $custs[$i]['release_time'] = $cus->release_time;
                $custs[$i]['editor'] = $cus->editor;
                $i++;
            }
            return View::make('communication_record.list')->with(array('custs' => $custs));
        }else{
            $us_na = Auth::user()->name;
            $cust = Customers::where('editor', '=', $us_na)->take(10)->get();

            $custs = array();
            $i = 0;
            foreach ($cust as $cus) {
                $custs[$i]['id'] = $cus->id;
                $custs[$i]['company'] = $cus->company;
                $custs[$i]['position'] = $cus->position;
                $custs[$i]['sex'] = $cus->sex;
                $custs[$i]['telephone'] = $cus->telephone;
                $custs[$i]['phone'] = $cus->phone;
                $custs[$i]['email'] = $cus->email;
                $custs[$i]['qq'] = $cus->qq;
                $custs[$i]['provin'] = $cus->wechat;
                $custs[$i]['identity'] = $cus->identiy;

                $custs[$i]['relationship_between_state'] = $cus->relationship_between_state;

                $custs[$i]['province'] = $cus->province;

                $custs[$i]['city'] = $cus->city;

                $custs[$i]['address'] = $cus->address;
                $custs[$i]['reason'] = $cus->reason;
                $custs[$i]['remarks'] = $cus->remarks;
                $custs[$i]['release_time'] = $cus->release_time;
                $custs[$i]['editor'] = $cus->editor;
                $i++;
            }
            return View::make('communication_record.list')->with(array('custs' => $custs));

        }

    }
    //  添加页面视图组装
    protected function addview(){
        $cust = SetType::where('type_name', '=','合作状态')->take(10)->get();
      //  $cus=array();
        $stid='';
        foreach($cust as $cuso) {
            $stid = $cuso->id;
        }
        $stype = TypeRecord::where('setup_id','=',$stid)->take(10)->get();

       $trec = array();
        $i=0;
            foreach($stype as $styer){

            $trec[$i]['id'] = $styer->id;
            $trec[$i]['type'] = $styer->type;
            $i++;
        }

        $pros = Provinces::all();
        $proar = array();
        $i = 0;
        foreach($pros as $prory){
            $proar[$i]['id'] = $prory->province_id;
            $proar[$i]['pname'] = $prory->province_name;
            $i++;
        }

        return View::make('communication_record.add')->with(array('sty'=>$trec,'province'=>$proar));
    }

    protected function add(){

        $name = Auth::user()->name;

        $reason = Customers::create(array('company' => $_POST['company'],'contact'=>$_POST['contact'],'position'=> $_POST['position'],'sex'=> $_POST['sex'],'telephone'=> $_POST['telephone'],'phone'=> $_POST['phone'],'email'=> $_POST['email'],'relationship_between_state'=> $_POST['rbs'],'province'=> $_POST['province'],'city'=> $_POST['city'],'address'=> $_POST['address'],'reason'=> $_POST['reason'],'remarks'=>$_POST['remarks'],'editor'=>$name));
    }

    protected function edit(){
        $type = $_POST['type'];
        $id = $_POST['id'];
        $meun = $_POST['meun'];

        $tr = TypeRecord::find($id);
        $tr->type = $type;
        if($tr->save()){
            return Redirect::to('setup?meun='.$meun.'');
        }else{
            return '修改不成功！';
        }
    }
}
