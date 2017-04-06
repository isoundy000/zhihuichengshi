<?php 
namespace app\api\controller;
class News{

	//推荐新闻
	public function topnews(){
		$limit = 5;
		$list = db('news')->where("is_top",1)->limit($limit)->select();
		if($list){
			return json(['status'=>1,'data'=>$list]);
		}else{
			return json(['status'=>0,'data'=>'']);
		}
	}

	public function detail($id = 0){
		$res = db('news')->find($id);
		if($res){
			$res['time'] = date('Y-m-d H:i:s',$res['addtime']);
			$content = $res['content'];
			$content = preg_replace("/<a href=(.*?)>/", "", $content);
			//匹配图片
			preg_match_all('/<img.*?src=\"\/(.*?)\"/',$content, $img);
			if($img){
				foreach($img[1] as $k=>$v){
					$content = str_replace("/".$v, "http://".$_SERVER['HTTP_HOST'].'/'.$v, $content);
				}
			}
			$res['content'] = $content;
			return json(['status'=>1,'data'=>$res]);
		}else{
			return josn(['status'=>0,'data'=>'']);
		}
	}

	//相关
	public function like(){
		$limit = 5;
		$list = db('news')->order('rand()')->limit($limit)->select();
		if($list){
			return json(['status'=>1,'data'=>$list]);
		}else{
			return json(['status'=>0,'data'=>'']);
		}
	}
}