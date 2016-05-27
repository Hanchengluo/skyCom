<?php
class loginControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onInit(){
		
	}
	
	public function onDefault(){
		$this->smarty->assign(array(
			"backurl"=>$_SERVER['HTTP_REFERER']
		));
		$this->smarty->display("login/index.html");
	}
	
	public function onloginSave(){
		$username=post('username','h');
		$password=post('password','h');
		$user=M("user")->selectRow("username='".$username."'");
		if(!$user){
			$this->goAll('账号不存在',1,"",$_SERVER['HTTP_REFERER']);
		}
		if($user['password']!=umd5($password.$user['salt'])){
			$this->goall("密码出错了",1,"",$_SERVER['HTTP_REFERER']);
		}
	 
		$this->set_session('ssuser',$user);
		$authcode=jiami($user['userid']."|".umd5($user['password']));
		if(ISWAP or post('autologin')){ 
			 
			$this->set_cookie("authcode",$authcode,3600);
		}
		$redata=array(
			"authcode"=>$authcode
		);
		$this->goAll("登录成功",0,$redata,get_post('backurl'));
		
	}
	
	public function onLogout(){
		 
		 $this->del_session("ssuser");
		 $this->set_cookie("authcode","",time()-10);	
		$this->goall("注销成功",0,0,"/index.php");
	}
	
	
	
	
}

?>