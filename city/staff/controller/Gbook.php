<?php 
namespace app\admin\controller;
use app\admin\controller\Common;
class Gbook extends Common{

	public function index(){
		$where = [];
		$list = db('gbook')
				->alias('a')
				->where($where)
				->join('__USER__ b','a.uid=b.id','LEFT')
				->field('a.*,b.nickname')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function del($id=0){
		if(db('gbook')->where('id',$id)->delete()){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}