<?php
namespace app\staff\controller;
use think\Controller;
use think\Url;
class Common extends Controller{
	
	public function _initialize(){
		Url::root('/staff.php');
		$c = request()->controller();
		$a = request()->action();
		if(!cookie('?islogin')&&$a!='login'){
			return $this->redirect('Index/login');
		}
	}
}