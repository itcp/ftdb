<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

    //  城市列表的获取： 1、以省级id获得城市名返回
    protected function proIdcity(){
        if(Request::ajax()){
            $proid = Input::get('proid');
            $cityob = Citys::where('province_id','=',$proid)->get();

            $cityar = array();
            $i=0;
            foreach($cityob as $citob){
                $cityar[$i]['city_id'] = $citob->city_id;
                $cityar[$i]['city_name'] = $citob->city_name;
                $i++;
            }

            return json_encode($cityar);
            exit;
        }
    }

    //  城市列表的获取： 1、以省级 name 获得城市名返回
    protected function proNamecity(){
        if(Request::ajax()){
            $proid = Input::get('proname');
            $pro = Provinces::where('province_name','=',$proid)->get();

            foreach($pro as $pror){
                $proid=$pror->province_id;
            }

            $cityob = Citys::where('province_id','=',$proid)->get();

            $cityar = array();
            $i=0;
            foreach($cityob as $citob){
                $cityar[$i]['city_id'] = $citob->city_id;
                $cityar[$i]['city_name'] = $citob->city_name;
                $i++;
            }
            echo json_encode($cityar);
            exit;
        }
    }


}
