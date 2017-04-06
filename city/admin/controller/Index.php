<?php
namespace app\admin\controller;
use app\admin\controller\Common;
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
			if(!$res = db('admin')->where('username',$username)->find()){
				$this->error("用户名不存在");
			}
			if($res['password']!=md5($password)){
				$this->error("用户名或密码错误");
			}
			session('islogin',true);
			session('userid',$res['id']);
			session('username',$username);
			$this->success("登录成功");
		}
		return $this->fetch();
	}

	public function logout(){
		session('islogin',null);
		session('userid',null);
		session('username',null);
		$this->redirect('login');
	}
}