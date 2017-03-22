<?php
namespace app\admin\controller;
use app\admin\controller\Common;
class Index extends Common{
	
	public function index(){
		
		return $this->fetch();
	}

	public function login(){

		return $this->fetch();
	}
}