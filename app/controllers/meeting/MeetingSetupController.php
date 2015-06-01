<?php
namespace Meeting;
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/26
 * Time: 11:34
 */
use BaseController, Form, Input, Redirect, Sentry, View,User,Auth,Customers,SetType,TypeRecord,Provinces,Citys,Request,Meeting;
class MeetingSetupController extends \BaseController{
    //
    protected function meetingList(){
        $meeob=Meeting::all();

        $meear = array();

        $mi=0;
        foreach($meeob as $meeobr){
            $meear[$mi]['id'] = $meeobr->id;
            $meear[$mi]['activity'] = $meeobr->activity_name;
            $meear[$mi]['meeting_type'] = $meeobr->meeting_type;
            $meear[$mi]['channels'] = $meeobr->channels;
            $meear[$mi]['op_ty'] = $meeobr->customer_type;
            $meear[$mi]['customer'] = $meeobr->customer;
            $meear[$mi]['salesman'] = $meeobr->salesman;
            $meear[$mi]['activity_head'] = $meeobr->activity_head;
            $meear[$mi]['tpro'] = $meeobr->the_province;
            $meear[$mi]['place'] = $meeobr->place;
            $meear[$mi]['activity_start_time'] = $meeobr->activity_start_time;
            $meear[$mi]['activity_finish_time'] = $meeobr->activity_finish_time;
            $meear[$mi]['scale'] = $meeobr->scale;
            $meear[$mi]['meetings_cycle'] = $meeobr->meetings_cycle;
            $meear[$mi]['actst'] = $meeobr->the_active_state;

            $meear[$mi]['editor'] = $meeobr->editor;
            $meear[$mi]['write_time'] = $meeobr->write_time;
            $meear[$mi]['remarks'] = $meeobr->remarks;
            //$meear[$mi]['id'] = $meeobr->id;
            $mi++;

        }
        return View::make('meeting.list')->with(array('mees'=>$meear));
    }

    //
    protected function addView(){

        //  省份数据组装
        $pros = Provinces::all();
        $proar = array();
        $i = 0;
        foreach($pros as $prory){
            $proar[$i]['id'] = $prory->province_id;
            $proar[$i]['pname'] = $prory->province_name;
            $i++;
        }

        $metyid = 3;    //  会议类型ID
        $metyob = TypeRecord::where('setup_id','=',$metyid)->take(10)->get();

        $metyar = array();
        $i = 0;
        foreach($metyob as $metyobr){
            $metyar[$i]['id'] = $metyobr->id;
            $metyar[$i]['pname'] = $metyobr->type;
            $i++;
        }

        $reid = 8;  // 项目来源ID
        $optyob = TypeRecord::where('setup_id','=',$reid)->take(10)->get();
        $optyar = array();
        $ir =0;
        foreach($optyob as $optyobr){
            $optyar[$ir]['id'] = $optyobr->id;
            $optyar[$ir]['type'] = $optyobr->type;
            $ir++;
        }

        $xpid = 2;
        $xpstob = TypeRecord::where('setup_id','=',$xpid)->take(10)->get();
        $xpar = array();
        $ir =0;
        foreach($xpstob as $xpstobr){
            $xpar[$ir]['id'] = $xpstobr->id;
            $xpar[$ir]['type'] = $xpstobr->type;
            $ir++;
        }

        $reid = 6;  //  会议活动状态来源ID
        $mestob = TypeRecord::where('setup_id','=',$reid)->take(10)->get();
        $mear = array();
        $ir =0;
        foreach($mestob as $mestobr){
            $mear[$ir]['id'] = $mestobr->id;
            $mear[$ir]['type'] = $mestobr->type;
            $ir++;
        }
        return View::make('meeting.add')->with(array('optyar'=>$optyar,'proar'=>$proar,'mestar'=>$mear,'metyar'=>$metyar,'xpar'=>$xpar));
    }
    //
    protected function add(){

    }

    //
    protected function editView(){

    }
    //
    protected function edit(){

    }
}