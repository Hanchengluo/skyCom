<?php
class uploadControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		
		$this->smarty->display("upload/default.html");
	}
	
	public function onInit(){
		if(!$this->get_session("ssuser") or $this->get_session('ssadmin')){
			exit(json_encode(array("err"=>"请先登录",1))); 
		}
	}
	
	public function onUpload(){
		
		$this->loadClass("upload");
		//上传的文件目录
		$this->upload->uploaddir="attach/my/";
		//允许上传的文件大小
		$this->upload->maxsize=4194304000;
		//是否上传图片
		$this->upload->upimg=true;
		//设置允许上传的文件类型
		$this->upload->sysallowtype=array('gif','jpg','bmp','png','jpeg','txt','mpeg','avi','rm','rmvb','wmv','flv','mp3','wav','wma','swf','doc','pdf','zip','tar','svg');
		$this->upload->allowtype=$this->upload->sysallowtype;
		//根据Id存储
		$this->upload->iddir=0;
		$data=$this->upload->uploadfile("upimg");
		//print_r($data);
		echo json_encode($data);	
		
	}
	
	public function onImg(){
		$_GET['ajax']=1;
		
		$this->loadClass("upload");
		$this->upload->uploaddir="attach/";
		$this->upload->upimg=true;
		$data=$this->upload->uploadfile("upimg");
		if($data['err']==''){
			$this->loadConfig("image");
			$this->loadClass("image");
			$data['imgurl']=$data['filename'];
			$data['trueimgurl']=$data['truefilename']=IMAGES_SITE($data['filename']);
			$cfs=$this->config_item("thumb");
			foreach($cfs as $k=>$v){
				$this->image->makeThumb($data['filename'].$v['name'],$data['filename'],$v['w'],$v['h'],$v['all']);
			}
			$this->goAll("success",0,$data);
		}
		$this->goAll($data['err'],0);
		
	}
	
	
	
}

?>