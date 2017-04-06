<?php 
namespace app\admin\controller;
use app\admin\controller\Common;
use think\Request;
use think\Config;
class System extends Common{

	//基本设置
	public function base(){
		if(Request::instance()->isPost()){
			$arrstr = "<?php\n";
			$arrstr .= "return array(";
			foreach($_POST as $k=>$v){
				$str = str_replace("'","\'",$v);
				$arrstr.="'".$k."'=>'".$str."',";
			}
			$arrstr.=");";
			if(file_put_contents(APP_PATH."/extra/base.php",$arrstr)){
				$this->success('更新配置成功！');
			}else{
				$this->error('更新配置失败！请检查目录权限'.APP_PATH.'/extra/');
			}
		}
		return $this->fetch();
	}

	//支付宝设置
	public function alipay(){
		if(Request::instance()->isPost()){
			$arrstr = "<?php\n";
			$arrstr .= "return array(";
			foreach($_POST as $k=>$v){
				$str = str_replace("'","\'",$v);
				$arrstr.="'".$k."'=>'".$str."',";
			}
			$arrstr.=");";
			if(file_put_contents(APP_PATH."/extra/alipay.php",$arrstr)){
				$this->success('更新配置成功！');
			}else{
				$this->error('更新配置失败！请检查目录权限'.APP_PATH.'/extra/');
			}
		}
		return $this->fetch();
	}

	//短信设置
	public function sms(){

		if(Request::instance()->isPost()){
			$arrstr = "<?php\n";
			$arrstr .= "return array(";
			foreach($_POST as $k=>$v){
				$str = str_replace("'","\'",$v);
				$arrstr.="'".$k."'=>'".$str."',";
			}
			$arrstr.=");";
			if(file_put_contents(APP_PATH."/extra/sms.php",$arrstr)){
				$this->success('更新配置成功！');
			}else{
				$this->error('更新配置失败！请检查目录权限'.APP_PATH.'/extra/');
			}
		}
		$this->assign('sms',sms_query());
		return $this->fetch();
	}

}