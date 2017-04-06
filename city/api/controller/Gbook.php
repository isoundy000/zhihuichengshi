<?php 
namespace app\api\controller;
class Gbook{

	public function add(){
		if(request()->isPost()){
			$data = input('post.');
			$data['addtime'] = time();
			if(db('gbook')->insert($data)){
				return json(['status'=>1,'msg'=>'您的信息已提交，感谢您的支持！']);
			}else{
				return json(['status'=>0,'msg'=>'不好意思，交通有些阻塞了，请稍后再试.']);
			}
		}
	}
}