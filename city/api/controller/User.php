<?php 
namespace app\api\controller;
class User{

	public function update_field($id = 0,$field='',$value=''){
		if(db('user')->where('id',$id)->update([$field=>$value])){
			$data = db('user')->find($id);
			$data['head_pic'] = make_head($data['head_pic']);
			return json(['status'=>1,'data'=>$data]);
		}else{
			return json(['status'=>0]);
		}
	}

	//修改密码
	public function editpwd(){
		$id = input('post.id');
		$oldpwd = input('post.oldpwd');
		$newpwd = input('post.newpwd');
		$renewpwd = input('post.renewpwd');
		$data = db('user')->where("id",$id)->find();
		if($data['password']!=md5($oldpwd)){
			return json(['status'=>0,'msg'=>'原始密码输入错误！']);
		}

		if(db('user')->where("id",$id)->update(['password'=>md5($newpwd)])){
			return json(['status'=>1,'msg'=>'密码修改成功！']);
		}else{
			return json(['status'=>0,'msg'=>'密码修改失败！']);
		}
	}

	//上传照片
	public function upload_head($id){
		if(!$data = db('user')->where(array('id'=>$id))->find()){
			return json(['status'=>0,'msg'=>'error']);
		}
		
		// 获取表单上传文件 例如上传了001.jpg
	    $file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下
	    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'head');
	    if($info){
	    	$url = "/public/uploads/head/".$info->getSaveName();
	    	$url = str_replace("\\", "/", $url);
	    	@unlink(".".$data['head_pic']);
	    	db('user')->where(array('id'=>$id))->update(['head_pic'=>$url]);
	    	return json(['status'=>1,'msg'=>'上传成功！','data'=>make_head($url)]);
	        // 成功上传后 获取上传信息
	        // 输出 jpg
	        echo $info->getExtension();
	        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	        echo $info->getSaveName();
	        // 输出 42a79759f284b767dfcb2a0197904287.jpg
	        echo $info->getFilename(); 
	    }else{
	        // 上传失败获取错误信息
	        return json(['status'=>0,'msg'=>$file->getError()]);
	        echo $file->getError();
	    }		
	}

	public function myclassinfo($page = 1,$limit = 10,$uid=''){
		$where = [];
		if($uid){
			$where['uid'] = $uid;
		}
		$list = db('classinfo')
				->where($where)
				->page($page,$limit)
				->select();
		foreach($list as $k=>$v){
			$thumb = db('classinfo_files')->where('classid',$v['id'])->value('filepath');
			$list[$k]['thumb'] = make_head($thumb);
		}
		return json(['status'=>1,'msg'=>'success','data'=>$list,'count'=>count($list)]);
	}

	//删除二手
	public function del_classinfo(){
		$data = input('post.');
		if(db('classinfo')->where($data)->delete()){
			$files = db('classinfo_files')->where('classid',$data['id'])->field('filepath')->select();
			foreach($files as $v){
				@unlink('.'.$v['filepath']);
			}
			return json(['status'=>1]);
		}else{
			return json(['status'=>0]);
		}
	}
}