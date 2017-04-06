<?php 
namespace app\index\controller;
use think\Controller;
class News extends Controller{

	public function detail($id = 0){
		$news = db('news')->find($id);
		$this->assign('news',$news);
		return $this->fetch();
	}
}