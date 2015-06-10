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
        $tracar = array();

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

        }
        $this->layout->content = View::make('tracking.list');
        $this->layout->content->tracar = $tracar;
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
        $this->layout->content->act_head=$mid;
        $this->layout->content->company=$company;
        $this->layout->content->customer = $customer;
        $this->layout->content->act_head=$act_head;
        $this->layout->title=$title;
    }

    protected function add(){
        if(Request::ajax()){
            //
            $trazt = new CustomerTracking();
            $trazt->meeting_name = Input::get('');
            $trazt->meeting_id = Input::get('mid');
            $trazt->customer_name = Input::get('');
            $trazt->customer_manager = Input::get('');
            $trazt->merchandiser = Input::get('');
            $trazt->contract_price = Input::get('');
            $trazt->visit = Input::get('');
            $trazt->summary_reason = Input::get('');

            $trazt->save();

            //
        }
    }

}