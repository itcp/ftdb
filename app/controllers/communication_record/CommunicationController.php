<?php
namespace CommunicationRecord;
/**
 * Created by PhpStorm.
 * User: it长青
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
            $this->layout->title='客户通迅录';
            $this->layout->content= View::make('communication_record.list')->with(array('custs' => $custs));

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
            $this->layout->title='客户通迅录';
            $this->layout->content=View::make('communication_record.list')->with(array('custs' => $custs));

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
        $this->layout->title='添加客户通迅录';
        $this->layout->content= View::make('communication_record.add')->with(array('sty'=>$trec,'province'=>$proar,'rear'=>$rear));
    }
//  添加功能
    protected function add(){
        if(Request::ajax()){

            $name = Auth::user()->name;

            $proob = Provinces::where('province_id','=',Input::get('province')) ->take(10)->get();
            $prona = '';
            foreach($proob as $proobr){
                $prona = $proobr->province_name;
            }

            $citob = Citys::where('city_id','=',Input::get('city')) ->take(10)->get();
            $citna = '';
            foreach($citob as $citobr){
                $citna = $citobr->city_name;
            }

            $address =$prona.$citna.Input::get('address');
            $couadd = Customers::create(array(
                'company' => Input::get('company'),
                'contact'=>Input::get('contact'),
                'position'=> Input::get('position'),
                'sex'=> Input::get('sex'),
                'telephone'=> Input::get('telephone'),
                'phone'=> Input::get('phone'),
                'email'=> Input::get('email'),
                'relationship_between_state'=> Input::get('rbs'),
                'province'=> Input::get('province'),
                'city'=> Input::get('city'),
                'address'=> $address,
                'reason'=> Input::get('reason'),
                'editor'=>$name,
                'remarks'=>Input::get('remarks')
            ));
            if($couadd==true){
                echo 1;
            }else{
                echo 2;
            }

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
        $this->layout->title='编辑客户通迅录';
        $this->layout->content= View::make('communication_record.edit')->with(array('sty'=>$trec,'province'=>$proar,'rear'=>$rear,'cus'=>$cus));
    }

    protected function edjson(){
        if(Request::ajax()) {
            $cusid = Input::get('
id')
;
            $cus = Customers::find($cusid);

            echo json_encode($cus);
        }
    }

// 编辑修改功能
    protected function edit(){
        if(Request::ajax()) {
           // echo Input::get('company').'d';
            $name = Auth::user()->name;
            $id = Input::get('id')
;

            $tr = Customers::find($id);
            $proob = Provinces::where('province_id','=',Input::get('province')
) ->take(10)->get();
            $prona = '';
            foreach($proob as $proobr){
                $prona = $proobr->province_name;
            }

            $citob = Citys::where('city_id','=',Input::get('city')) ->take(10)->get();
            $citna = '';
            foreach($citob as $citobr){
                $citna = $citobr->city_name;
            }

            $address =$prona.$citna.Input::get('address');

            $tr->company = Input::get('company');
            $tr->contact = Input::get('contact');
            $tr->sex = Input::get('sex');
            $tr->position = Input::get('position');
            $tr->telephone = Input::get('telephone');
            $tr->phone = Input::get('phone');
            $tr->email = Input::get('email');
            $tr->province = Input::get('province');
            $tr->city = Input::get('city');
            $tr->address = $address;
            $tr->relationship_between_state = Input::get('rbs')
;
            $tr->remarks = Input::get('remarks')
;
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
