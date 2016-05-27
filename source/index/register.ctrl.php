<?php
class registerControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		
		$this->smarty->display("register/index.html");
	}
	
	public function onRegSave(){
		$password=post('password','h');
		$password2=post('password2','h');
		if($password!=$password2 or empty($password)){
				$this->goall("两次输入的密码不一致",1);		
		}
		$data['username']=post('username','h');
		if(empty($data['username']) ){
			$this->goAll("用户名不能为空",1);
		}
		
		$data['nickname']=post('nickname','h');
		if(empty($data['nickname']) ){
			$this->goAll("昵称不能为空",1);
		}
		$data['gender']=post('gender','i');
		if(M("user")->selectRow(array("where"=>"username='".$data['username']."' "))){
			$this->goall("用户名已经存在",1);
		}
		$data['telephone']=post('telephone','h');
		if(M("user")->selectRow(array("where"=>"nickname='".$data['nickname']."' "))){
			$this->goall("昵称已经存在",1);
		}
		$data['salt']=rand(1000,9999);
		$data['password']=umd5($password.$data['salt']);
		$data['reg_time']=$data['last_time']=date("Y-m-d H:i:s");
		$userid=M("user")->insert($data);
		$this->goAll("注册成功，请登录",0,$user,"/index.php?m=login");
	}
	
}

?>