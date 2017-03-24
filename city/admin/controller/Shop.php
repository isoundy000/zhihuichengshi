<?php 
//楼下商家
namespace app\admin\controller;
use app\admin\controller\Common;
class Shop extends Common{

	public function index(){
		$list = db('shop')
				->paginate(15);
		$this->assign('list',$list);
		return $this->fetch();
	}

	public function addedit($id = 0){
		if($id){
			$res = db('shop')->find($id);
			$this->assign('res',$res);
		}
		if(request()->isPost()){
			$data = input('post.');
			$file = request()->file('file');
			$url = '';
			if($file){
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'shop');
				$savename = $info->getSaveName();
				$savename = str_replace("\\","/",$savename);
				$url = "/public/uploads/shop/".$savename;
			}
			if($id){
				if($url){
					@unlink('.'.$res['shop_pic']);
					$data['shop_pic'] = $url;
				}
				if(db('shop')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				if(db('shop')->where('shop_name',$data['shop_name'])->count()){
					$this->error('商家已经存在');
				}
				$data['shop_pic'] = $url;
				$data['addtime'] = time();
				if(db('shop')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		
		return $this->fetch();
	}

	public function del($id){
		$shop_pic = db('shop')->where('id',$id)->value('shop_pic');
		if(db('shop')->delete($id)){
			@unlink('.'.$shop_pic);
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}
}