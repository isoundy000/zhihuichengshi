<?php
namespace app\admin\controller;
use think\Controller;
use think\Url;
class Common extends Controller{
	
	public function _initialize(){
		Url::root('/index.php');
		$c = request()->controller();
		$a = request()->action();
		if(!session('?islogin')&&$a!='login'){
			return $this->redirect('Index/login');
		}
	}
}