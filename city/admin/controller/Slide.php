<?php 
namespace app\admin\controller;
use app\admin\controller\Common;
class Slide extends Common{

	public function index(){
		$list = db('slide')->paginate(10);
		$this->assign('list',$list);
		return $this->fetch();
	}

	//添加幻灯
	public function addedit($id = 0){
		if($id){
			$res = db('slide')->find($id);
			$this->assign('res',$res);
		}
		if(request()->isPost()){
			$data = input('post.');
			$data['link'] = trim($data['link']);
			$file = request()->file('file');
			$url = '';
			if($file){
				$info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'slide');
				$savename = $info->getSaveName();
				$savename = str_replace("\\","/",$savename);
				$url = "/public/uploads/slide/".$savename;
			}
			if($id){
				if($url){
					@unlink('.'.$res['image_url']);
					$data['image_url'] = $url;
				}
				if(db('slide')->update($data)){
					$this->success('编辑成功');
				}else{
					$this->error('编辑失败或未更改');
				}
			}else{
				$data['image_url'] = $url;
				if(db('slide')->insert($data)){
					$this->success("添加成功！");
				}else{
					$this->error("添加失败");
				}
			}
		}
		return $this->fetch();
	}

	public function edit($id){
		if(request()->isPost()){
			$data = request()->post();
			unset($data['image']);
			if(db('slide')->where("id",$id)->update($data)){
				return json(['status'=>1,'msg'=>'更新成功！']);
			}else{
				return json(['status'=>0,'msg'=>'更新失败！']);
			}
		}
		$slide = db('slide')->where("id",$id)->find();
		$this->assign('slide',$slide);
		return $this->fetch();
	}

	public function del($id){
		$res = db('slide')->where("id",$id)->find();
		if(db('slide')->where("id",$id)->delete()){
			@unlink('.'.$res['image_url']);
			return json(['status'=>1,'msg'=>'删除成功！']);
		}else{
			return json(['status'=>0,'msg'=>'删除失败！']);
		}
	}
}