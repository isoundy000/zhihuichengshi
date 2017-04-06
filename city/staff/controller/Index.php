<?php
namespace app\staff\controller;
use app\staff\controller\Common;
class Index extends Common{
	
	public function index(){
		
		return $this->fetch();
	}

	public function home(){
		$usercnt = db('user')->count();

		$this->assign('usercnt',$usercnt);
		return $this->fetch();
	}

	public function login(){
		if(request()->isPost()){
			$username = input('username');
			$password = input('password');
			if(!$res = db('landlord')->where('username',$username)->find()){
				$this->error("用户名不存在");
			}
			if($res['password']!=md5($password)){
				$this->error("用户名或密码错误");
			}
			cookie('islogin',true);
			cookie('userid',$res['id']);
			cookie('username',$username);
			$this->success("登录成功");
		}
		return $this->fetch();
	}

	public function logout(){
		cookie('islogin',null);
		cookie('userid',null);
		cookie('username',null);
		$this->redirect('login');
	}
}