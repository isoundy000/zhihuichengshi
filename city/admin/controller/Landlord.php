<?php 
//房东模块
namespace app\admin\controller;
use app\admin\controller\Common;
class Landlord extends Common{

	public function index(){
		$list = db('landlord')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function addedit($id = 0){
		if(request()->isPost()){
			$data = input('post.');
			if($id){
				if($data['password']){
					$data['password'] = md5($data['password']);
				}else{
					unset($data['password']);
				}
				if(db('landlord')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				if(db('landlord')->where('username',$data['username'])->count()){
					$this->error('用户名已经存在');
				}
				$data['password'] = md5($data['password']);
				$data['addtime'] = time();
				if(db('landlord')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		if($id){
			$res = db('landlord')->find($id);
			$this->assign('res',$res);
		}
		return $this->fetch();
	}

	public function del($id){
		if(db('landlord')->delete($id)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}