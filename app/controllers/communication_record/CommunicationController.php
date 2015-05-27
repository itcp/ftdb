<?php
namespace CommunicationRecord;
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/6
 * Time: 17:33
 */
use BaseController, Form, Input, Redirect, Sentry, View,User,Auth,Customers,SetType,TypeRecord,Provinces,Citys,Request;
// 客户通讯录
class CommunicationController extends \BaseController{
//  通讯录的列表页面数据组装
    public function home(){
        $i_us = Auth::user()->identity;
        if($i_us == 1){
            $cust = Customers::all();

            $custs = array();
            $i = 0;
            foreach ($cust as $cus){
                $custs[$i]['id'] = $cus->id;
                $custs[$i]['company'] = $cus->company;
                $custs[$i]['contact'] = $cus->contact;
                $custs[$i]['position'] = $cus->position;
                $custs[$i]['sex'] = $cus->sex;

                $custs[$i]['telephone'] = $cus->telephone;
                $custs[$i]['phone'] = $cus->phone;
                $custs[$i]['email'] = $cus->email;

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
            /*
             * @foreach($city as $ciy)
                                    <option value="{{ $ciy['id'] }}">{{ $ciy['city_name'] }}</option>
                                @endforeach
             * */
            return View::make('communication_record.list')->with(array('custs' => $custs));
        }else{
            $us_na = Auth::user()->name;
            $cust = Customers::where('editor', '=', $us_na)->take(10)->get();

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
    protected function addView(){

        $reid = 5;  //  客户来源ID
        $reas = TypeRecord::where('setup_id','=',$reid)->take(10)->get();
        $rear = array();
        $ir =0;
        foreach($reas as $reass){
            $rear[$ir]['id'] = $reass->id;
            $rear[$ir]['type'] = $reass->type;
            $ir++;
        }

        $stid = 7;  // 合作状态ID
        $stype = TypeRecord::where('setup_id','=',$stid)->take(10)->get();

       $trec = array();
        $i=0;
            foreach($stype as $styer){

            $trec[$i]['id'] = $styer->id;
            $trec[$i]['type'] = $styer->type;
            $i++;
        }
        //  省份数据组装
        $pros = Provinces::all();
        $proar = array();
        $i = 0;
        foreach($pros as $prory){
            $proar[$i]['id'] = $prory->province_id;
            $proar[$i]['pname'] = $prory->province_name;
            $i++;
        }

        return View::make('communication_record.add')->with(array('sty'=>$trec,'province'=>$proar,'rear'=>$rear));
    }
//  添加功能
    protected function add(){
        if(Request::ajax()){

            $name = Auth::user()->name;

            $proob = Provinces::where('province_id','=',$_POST['province']) ->take(10)->get();
            $prona = '';
            foreach($proob as $proobr){
                $prona = $proobr->province_name;
            }

            $citob = Citys::where('city_id','=',$_POST['city']) ->take(10)->get();
            $citna = '';
            foreach($citob as $citobr){
                $citna = $citobr->city_name;
            }

            $address =$prona.$citna.$_POST['address'];
            $couadd = Customers::create(array('company' => $_POST['company'],'contact'=>$_POST['contact'],'position'=> $_POST['position'],'sex'=> $_POST['sex'],'telephone'=> $_POST['telephone'],'phone'=> $_POST['phone'],'email'=> $_POST['email'],'relationship_between_state'=> $_POST['rbs'],'province'=> $_POST['province'],'city'=> $_POST['city'],'address'=> $address,'reason'=> $_POST['reason'],'editor'=>$name,'remarks'=>$_POST['remarks']));
            if($couadd==true){
                echo 1;
            }else{
                echo 2;
            }

        }
    }
//  二组联动菜单的数据组装
    protected function pos(){
        if(Request::ajax()){
            $proid = $_POST['proid'];
            $cityob = Citys::where('province_id','=',$proid) ->take(10)->get();

            $cityar = array();
            $i=0;
            foreach($cityob as $citob){
                $cityar[$i]['city_id'] = $citob->city_id;
                $cityar[$i]['city_name'] = $citob->city_name;
                $i++;
            }
            echo json_encode($cityar);
        }
    }
    //  编辑修改页面的视图组装
    protected function editView(){
        $cusid = $_GET['id'];
        $cus = Customers::find($cusid);

        $reid = 5;  //  客户来源ID
        $reas = TypeRecord::where('setup_id','=',$reid)->take(10)->get();
        $rear = array();
        $ir =0;
        foreach($reas as $reass){
            $rear[$ir]['id'] = $reass->id;
            $rear[$ir]['type'] = $reass->type;
            $ir++;
        }

        $stid = 7;  // 合作状态ID
        $stype = TypeRecord::where('setup_id','=',$stid)->take(10)->get();

        $trec = array();
        $i=0;
        foreach($stype as $styer){

            $trec[$i]['id'] = $styer->id;
            $trec[$i]['type'] = $styer->type;
            $i++;
        }
        //  省份数据组装
        $pros = Provinces::all();
        $proar = array();
        $i = 0;
        foreach($pros as $prory){
            $proar[$i]['id'] = $prory->province_id;
            $proar[$i]['pname'] = $prory->province_name;
            $i++;
        }

        return View::make('communication_record.edit')->with(array('sty'=>$trec,'province'=>$proar,'rear'=>$rear,'cus'=>$cus));
    }

    protected function edjson(){
        if(Request::ajax()) {
            $cusid = $_POST['id'];
            $cus = Customers::find($cusid);

            echo json_encode($cus);
        }
    }

// 编辑修改功能
    protected function edit(){
        if(Request::ajax()) {
           // echo $_POST['company'].'d';
            $name = Auth::user()->name;
            $id = $_POST['id'];

            $tr = Customers::find($id);
            $proob = Provinces::where('province_id','=',$_POST['province']) ->take(10)->get();
            $prona = '';
            foreach($proob as $proobr){
                $prona = $proobr->province_name;
            }

            $citob = Citys::where('city_id','=',$_POST['city']) ->take(10)->get();
            $citna = '';
            foreach($citob as $citobr){
                $citna = $citobr->city_name;
            }

            $address =$prona.$citna.$_POST['address'];

            $tr->company = $_POST['company'];
            $tr->contact = $_POST['contact'];
            $tr->sex = $_POST['sex'];
            $tr->position = $_POST['position'];
            $tr->telephone = $_POST['telephone'];
            $tr->phone = $_POST['phone'];
            $tr->email = $_POST['email'];
            $tr->province = $_POST['province'];
            $tr->city = $_POST['city'];
            $tr->address = $address;
            $tr->relationship_between_state = $_POST['rbs'];
            $tr->remarks = $_POST['remarks'];
            $tr->editor = $name;

            $hz=array();
            if ($tr->save()) {

                $hz['add']=$address;
                $hz['ft']=1;
                //return Redirect::to('setup?meun='.$meun.'');
                return $hz;
            } else {
                $hz['ft']=2;
                return $hz;
            }
        }
    }
}
