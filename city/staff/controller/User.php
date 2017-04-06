<?php 
namespace app\admin\controller;
use app\admin\controller\Common;
class User extends Common{

	public function index(){
		$where = [];
		$list = db('user')
				->where($where)
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function attr($status=0,$id=0){
		if(db('user')->where('id',$id)->update(['status'=>$status])){
			$this->success('操作成功');
		}else{
			$this->error('操作失败');
		}
	}
}