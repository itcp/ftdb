<?php
// use SetType;

class BaseController extends Controller {

    protected $layout = '_layouts.frame';
	/**identity
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);

            $identity = Auth::user()->identity;

            $sety = SetType::all();
            $si = 0;
            $setar=array();
            $title='';
           $this->layout->title='';
            $this->layout->content='';
            foreach($sety as $setyop){
                $setar[$si]['id'] = $setyop->id;
                $setar[$si]['name'] = $setyop->type_name;
                $si++;
            }
            if($identity === 1){
                $this->layout->nav = View::make('_layouts.headnav');
                $this->layout->nav->yy=Auth::user()->name;
                $this->layout->nav->type = $setar;
            }else{
                $this->layout->nav = View::make('_layouts.headnav2');
                $this->layout->nav->yy=Auth::user()->name;
            }


		}
	}

}



