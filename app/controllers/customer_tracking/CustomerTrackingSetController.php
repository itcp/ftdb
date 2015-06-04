<?php
namespace CustomerTracking;
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/26
 * Time: 11:40
 */
use BaseController, Form, Input, Redirect, Sentry, View,User,Auth,Customers,SetType,TypeRecord,Provinces,Citys,Request,CustomerTracking,Situation;

class CustomerTrackingSetController extends \BaseController{

    protected function listView(){
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
        return View::make('tracking.list')->with(array('tracar'=>$tracar,'title'=>$title));
    }

    protected function add(){
        $title = '';
        return View::make('tracking.list')->with(array('tracar'=>$tracar,'title'=>$title));

    }
}