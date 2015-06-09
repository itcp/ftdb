<?php
namespace Setup;
/**
 * Created by PhpStorm.
 * User: it长青
 * Date: 2015/5/12
 * Time: 17:55
 */
use BaseController, Form, Input, Redirect, Sentry, View,Request,Auth,Reason,DB,Config,TypeRecord,SetType,Provinces,Citys;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class GoSetupController extends \BaseController{

    //  视图加载
    protected function typeView(){
        if(isset($_GET['do'])&&$_GET['do']=='delete'){
            $meun = $_GET['meun'];
            $id = $_GET['id'];
            if($this ->typeDelete($id)){
                return '删除不成功！';
            }else{

                return Redirect::to('setup?meun='.$meun.'');
            }
        }elseif(isset($_GET['do'])&&$_GET['do']=='edit'){   // 编辑修改的视图数据组装
            $meun = $_GET['meun'];
            $ype = SetType::find($meun);
            $type_name = $ype->type_name;

            $type = TypeRecord::where('id','=',$_GET['id'])->get();
            $typ = array();
            foreach ($type as $re) {
                $typ['id'] = $re->id;
                $typ['type'] = $re->type;
                $typ['editor'] = $re->editor;
                $typ['editor_time'] = $re->editor_time;
            }
            return View::make('setup.edit')->with(array('type' => $typ, 'type_name' => $type_name));
        }else{
            $meun = $_GET['meun'];

            //  分类栏目的名称
            $ype = SetType::find($meun);
            $type_name = $ype->type_name;


            //  取得相应栏目的数据，并把数据对象转换成数组格式

            $type = TypeRecord::where('setup_id', '=', $meun)->get();

            $i = 0;
            $typ = array();
            foreach ($type as $re) {
                $typ[$i]['id'] = $re->id;
                $typ[$i]['type'] = $re->type;
                $typ[$i]['editor'] = $re->editor;
                $typ[$i]['editor_time'] = $re->editor_time;
                $i++;
            }
            $this->layout->title='类型设置';
            $this->layout->content= View::make('setup.index')->with(array('type' => $typ, 'type_name' => $type_name));
        }

    }
    //  类型增加功能
    protected function typeAdd(){

        if(Request::ajax()){
            $typev = Input::get('type');
            $meun = Input::get('meun');

            $name = Auth::user()->name;

            $reason = TypeRecord::create(array('type' => $typev,'setup_id'=>$meun,'editor'=>$name));

            if($reason==true){
                echo '增加成功！';

            }else{
                echo '添加失败';
            }
        }

    }

    //  类型字段编辑修改
    protected function typeModify(){

        $type = Input::get('type');
        $id = Input::get('id');
        $meun = Input::get('meun');

        $tr = TypeRecord::find($id);
        $tr->type = $type;
        if($tr->save()){
            return Redirect::to('setup?meun='.$meun.'');
        }else{
            return '修改不成功！';
        }
    }
    //  类型删除
    protected function typeDelete($id){
        $tr = TypeRecord::find($id);
        $tr ->delete();
    }



}