<?php 
namespace app\api\controller;
class Ajax{
	
	public function getcode($phone){
		$tpl = "您的注册验证码为：{code}，请及时验证";
		$code = rand(1000,9999);
		$content = str_replace("{code}",$code,$tpl);
		$res = send_sms($phone,$content);
		$status = $res=='短信发送成功'?1:0;
		return json(['status'=>$status,'msg'=>$res,'data'=>$code]);
	}

	public function register(){
		$data = input('post.');
		if(!$data['phone']){
			return json(['status'=>0,'msg'=>'请输入手机号码']);
		}
		if(!$data['password']){
			return json(['status'=>0,'msg'=>'请设置密码']);
		}
		if(db('user')->where('phone',$data['phone'])->count()){
			return json(['status'=>0,'msg'=>'手机号码已存在']);
		}
		$data['addtime'] = time();
		$data['nickname'] = $data['phone'];
		$data['password'] = md5($data['password']);
		$data['status'] = 1;
		if($id = db('user')->insertGetid($data)){
			$_data = db('user')->where('id',$id)->find();
			return json(['status'=>1,'data'=>$_data,'msg'=>'注册成功']);
		}else{
			return json(['status'=>0,'msg'=>'注册失败']);
		}
	}

	public function login($phone = '',$password = ''){
		if(request()->isPost()){
			if(!$phone){
				return json(['status'=>0,'msg'=>'数据错误.']);
			}
			if(!$password){
				return json(['status'=>0,'msg'=>'数据错误.']);
			}
			if($user = db('user')->where("phone",$phone)->find()){
				if($user['password']!=md5($password)){
					return json(['status'=>0,'msg'=>'用户名或密码错误.','data'=>$user]);
				}
				$token = md5(time());
				db('user')->where("phone",$phone)->update(['token'=>$token]);
				$user['token'] = $token;
				$user['head_pic'] = make_head($user['head_pic']);
				return json(['status'=>1,'msg'=>'登录成功！','data'=>$user]);
			}else{
				return json(['status'=>0,'msg'=>'用户名或密码错误..']);
			}

		}else{
			return json(['status'=>0,'msg'=>'登录失败！','data'=>'']);
		}
	}
}