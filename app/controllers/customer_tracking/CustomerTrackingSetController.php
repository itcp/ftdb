<?php
namespace CustomerTracking;
/**
 * Created by PhpStorm.
 * User: it长青
 * Date: 2015/5/26
 * Time: 11:40
 */
use BaseController, Form, Input, Redirect, Sentry, View,User,Auth,Customers,SetType,TypeRecord,Provinces,Citys,Request,CustomerTracking,Situation,Meeting,ServiceDescription,VisitingRecord;

class CustomerTrackingSetController extends \BaseController{

    public function listView(){
        $title = '客户跟进列表页';
        $trac = CustomerTracking::all();
        $tracr = array();

        $ti=0;
        foreach($trac as $tract){
            $tracr[$ti]['id'] = $tract->id;
            $tracr[$ti]['customer'] = $tract->customer_name;
            $tracr[$ti]['manager'] = $tract->customer_manager;
            $tracr[$ti]['merchandiser'] = $tract->merchandiser;
            $tracr[$ti]['price'] = $tract->contract_price;
            $tracr[$ti]['accepted'] = $tract->offer_not_accepted;
            $tracr[$ti]['visit'] = $tract->visit;
            $tracr[$ti]['summary'] = $tract->summary_reason;
            $tracr[$ti]['editor'] = $tract->editor;
            $tracr[$ti]['editor_time'] = $tract->editor_time;
            $ti++;

        }
        $this->layout->content = View::make('tracking.list');
        $this->layout->content->tracr = $tracr;
        $this->layout->title = $title;

    }

    protected function addView(){
        $act_name = '';
        $company = '';
        $customer = '';
        $act_head = '';
        $mid = '';

        if(isset($_GET['id'])){
            $base = Meeting::find($_GET['id']);
            $act_name = 'value="'.$base['activity_name'].'"';
            $company = 'value="'.$base['customer'].'"';
            $customer = 'value="'.$base['salesman'].'"';
            $act_head = 'value="'.$base['activity_head'].'"';
            $mid = $_GET['id'];
        }

        $title = '添加跟进页';
        $statid=1;
        $statop = TypeRecord::where('setup_id','=',$statid)->get();
        $statar=array();
        $si=0;
        foreach($statop as $statopr){
            $statar[$si]['id'] = $statopr->id;
            $statar[$si]['type'] = $statopr->type;
            $si++;
        }

        $this->layout->content= View::make('tracking.add')->with(array('statar'=>$statar,'act_name'=>$act_name));
        $this->layout->content->mid=$mid;
        $this->layout->content->company=$company;
        $this->layout->content->customer = $customer;
        $this->layout->content->act_head=$act_head;
        $this->layout->title=$title;
    }

    protected function add(){
        if(Request::ajax()){
            $editor = Auth::user()->name;
            $inid = 0;
            //

            $trazt = new CustomerTracking();

            $trazt->meeting_name = Input::get('act_name');
            $trazt->meeting_id = Input::get('mid');
            $trazt->customer_name = Input::get('cou_name');
            $trazt->customer_manager = Input::get('salesman');
            $trazt->merchandiser = Input::get('act_head');
            $trazt->contract_price = Input::get('price');
            $trazt->visit = Input::get('vsummary');
            $trazt->summary_reason = Input::get('summary');
            $trazt->editor=$editor;
            if(!$trazt->save()){
                echo '添加不成功';
                exit;
            }
            //$trazt->save();
            $inid = $trazt->id;
            //  拜访记录增加
            $visit = new VisitingRecord();
            $visit->meeting_id = Input::get('mid');
            $visit->tracking_id = $inid;
            $visit->access_theme= Input::get('acc_theme');
            $visit->visiting_start_time= Input::get('bs_time');
            $visit->visiting_finish_time= Input::get('bf_time');
            $visit->visiting_object= Input::get('cou_object');
            $visit->account_manager= Input::get('manager');
            $visit->content= Input::get('content');
            $visit->summary= Input::get('vsummary');
            $visit->editor= $editor;

            $visit->save();

            //跟进情况
            $situ =new Situation();
            $situ->tracking_id = $inid;
            $stidop = TypeRecord::where('type','=',Input::get('stat'))->get();
            $stid ='';
            foreach($stidop as $stidr){
                $stid=$stidr->id;
            }
            $situ->type =$stid;
                $situ->stat = Input::get('stat');
            $situ->content = Input::get('situation');

            if($situ->save()){
                echo '添加成功';
                exit;
            }
        }
    }

    protected function editView(){
        $id = $_GET['id'];

        $tracar = CustomerTracking::find($id);


        $statid=1;
        $statop = TypeRecord::where('setup_id','=',$statid)->get();
        $statar=array();
        $si=0;
        foreach($statop as $statopr){
            $statar[$si]['id'] = $statopr->id;
            $statar[$si]['type'] = $statopr->type;
            $si++;
        }

        $this->layout->content=View::make('tracking.edit');
        $this->layout->content->tracar = $tracar;
        $this->layout->content->trid = $id;
        $this->layout->content->statar = $statar;

    }

    protected function edit(){
        if(Request::ajax()){
            $editor = Auth::user()->name;
            $inid = 0;
            //
            $trid = Input::get("trid");
            $trazt = CustomerTracking::find($trid);

            $trazt->meeting_name = Input::get('act_name');
            $trazt->meeting_id = Input::get('mid');
            $trazt->customer_name = Input::get('cou_name');
            $trazt->customer_manager = Input::get('salesman');
            $trazt->merchandiser = Input::get('act_head');
            $trazt->contract_price = Input::get('price');
            $trazt->visit = Input::get('vsummary');
            $trazt->summary_reason = Input::get('summary');
            $trazt->editor=$editor;
            if(!$trazt->save()){
                echo '添加不成功';
                exit;
            }
            //$trazt->save();
            $inid = $trazt->id;
            //  拜访记录增加
            $visit = new VisitingRecord();
            $visit->meeting_id = Input::get('mid');
            $visit->tracking_id = $trid;
            $visit->access_theme= Input::get('acc_theme');
            $visit->visiting_start_time= Input::get('bs_time');
            $visit->visiting_finish_time= Input::get('bf_time');
            $visit->visiting_object= Input::get('cou_object');
            $visit->account_manager= Input::get('manager');
            $visit->content= Input::get('content');
            $visit->summary= Input::get('vsummary');
            $visit->editor= $editor;

            $visit->save();

            //跟进情况
            $situ =new Situation();
            $situ->tracking_id = $trid;
            $stidop = TypeRecord::where('type','=',Input::get('stat'))->get();
            $stid ='';
            foreach($stidop as $stidr){
                $stid=$stidr->id;
            }
            $situ->type =$stid;
            $situ->stat = Input::get('stat');
            $situ->content = Input::get('situation');

            if($situ->save()){
                echo '添加成功';
                exit;
            }
        }

    }

    protected function details(){
        $id = $_GET['id'];

        $tracar =  CustomerTracking::find($id);

        $situ = Situation::where('tracking_id','=',$id);

        $situar = array();
        $i=0;
        foreach($situ as $situr){
            $situar[$i]['stat'] = $situr->stat;
            $situar[$i]['content'] = $situr->content;
            $situar[$i]['editor_time'] = $situr->editor_time;
            $i++;
        }

        $visi = VisitingRecord::where('tracking_id','=',$id);
        $visiar = array();
        foreach($visi as $visir){
            $visiar[$i]['acc_th']= $visir->access_theme;
            $visiar[$i]['s_time']= $visir->visiting_start_time;
            $visiar[$i]['f_time']= $visir->visiting_finish_time;

            $visiar[$i]['v_object']= $visir->visiting_object;
            $visiar[$i]['manager']= $visir->account_manager;
            $visiar[$i]['content']= $visir->content;
            $visiar[$i]['summary']= $visir->summary;
            $visiar[$i]['editor']= $visir->editor;
            $visiar[$i]['editor_time']= $visir->editor_time;

            $i++;
        }

        $this->layout->content=View::make('tracking.details');
        $this->layout->content->tracar =$tracar;
        $this->layout->content->situar =$situar;
        $this->layout->content->visiar =$visiar;
    }
}















