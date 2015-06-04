<?php
namespace Meeting;
/**
 * Created by PhpStorm.
 * User: bb
 * Date: 2015/5/26
 * Time: 11:34
 */
use BaseController, Form, Input, Redirect, Sentry, View,User,Auth,Customers,SetType,TypeRecord,Provinces,Citys,Request,Meeting,ServiceDescription;
class MeetingSetupController extends \BaseController{
    //
    protected function meetingList(){
        $title = '会议活动列表页';
        $meeob=Meeting::all();

        $meear = array();

        $mi=0;
        foreach($meeob as $meeobr){
            $meear[$mi]['id'] = $meeobr->id;
            $meear[$mi]['activity'] = $meeobr->activity_name;
            $meear[$mi]['meeting_type'] = $meeobr->meeting_type;
            $meear[$mi]['channels'] = $meeobr->channels;
            $meear[$mi]['op_ty'] = $meeobr->source_type;
            $meear[$mi]['customer'] = $meeobr->customer;
            $meear[$mi]['salesman'] = $meeobr->salesman;
            $meear[$mi]['activity_head'] = $meeobr->activity_head;
            $meear[$mi]['tpro'] = $meeobr->the_province;
            $meear[$mi]['address'] = $meeobr->place;
            $meear[$mi]['s_time'] = $meeobr->activity_start_time;
            $meear[$mi]['f_time'] = $meeobr->activity_finish_time;
            $meear[$mi]['scale'] = $meeobr->scale;
            $meear[$mi]['meetings_cycle'] = $meeobr->meetings_cycle;
            $meear[$mi]['actst'] = $meeobr->the_active_state;

            $meear[$mi]['editor'] = $meeobr->editor;
            $meear[$mi]['write_time'] = $meeobr->write_time;
            $meear[$mi]['remarks'] = $meeobr->remarks;
            //$meear[$mi]['id'] = $meeobr->id;
            $mi++;

        }
        return View::make('meeting.list')->with(array('mees'=>$meear,'title'=>$title));
    }

    //
    protected function addView(){
        $title = '会议活动添加页';

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
        return View::make('meeting.add')->with(array('optyar'=>$optyar,'proar'=>$proar,'mestar'=>$mear,'metyar'=>$metyar,'xpar'=>$xpar,'title'=>$title));
    }
    //
    protected function add(){
        if(Request::ajax()){
            $editor = Auth::user()->name;
            //  Meeting 为会议活动详情表模型
            //  ServiceDescriptior 为服务需求记录表模型

            $acttf= Meeting::where('activity_name','=',Input::get('act_name'))->take(10)->get();
            $actn = '';
            foreach($acttf as $acttfr){
                $actn=$acttfr->activity_name;
            }
            if($actn==$_POST['act_name']){
                echo "此会议同名记录已有，请确认后填写！";
                exit;
            }

            $place=$_POST['province'].$_POST['city'].$_POST['address'];

            $meein = Meeting::create(array('activity_name'=>Input::get('act_name'),'meeting_type'=>
            $_POST['meetype'],'channels'=>$_POST['channels'],'source_type'=>$_POST['source_ty']
            ,'customer'=>$_POST['company'],'salesman'=>$_POST['customer'],'activity_head'=>$_POST['act_head'],
                'the_province'=>$_POST['thepr'],'place'=>$place,'activity_start_time'
            =>$_POST['stime'],'activity_finish_time'=>$_POST['ftime'],'scale'=>$_POST['scale'],
                'meetings_cycle'=>$_POST['cycle'],'the_active_state'=>$_POST['me_star'],'editor'
            =>$editor,'remarks'=>$_POST['remarks']));
            $meeid='';
            if($meein){
                $actnt=Input::get('act_name');
                $mear = Meeting::where('activity_name','=',$actnt)->take(10)->get();
                foreach($mear as $meart){
                    $meeid=$meart->id;
                }
            }

            $xpar = json_decode(Input::get('xpli'));
            $xpco = count($xpar);
            for($i=0;$i<$xpco;$i++){
                $serin = ServiceDescription::create(array('meeting_id'=>$meeid,'service_id'=>$xpar[$i][0],'service_name'=>$xpar[$i][1],'conent'=>$xpar[$i][2]));

                if(serin==false){
                    echo "保存服务要求记录失败！";
                    exit;
                }
            }
            echo 1;

        }

    }

    //
    protected function editView(){

    }
    //
    protected function edit(){

    }
}