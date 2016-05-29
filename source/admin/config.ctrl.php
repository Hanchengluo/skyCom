<?php
class configControl extends skymvc{
	
	function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
	 
		$data=M("config")->selectRow();
		$this->smarty->assign(array(
			"data"=>$data,
		));
		$this->smarty->display("config/index.html");
	}
	
	public function onsave(){
		$data=M("config")->postData();
		
		$this->loadmodel("config");
		if(M("config")->selectRow()){
			M("config")->update($data,"1=1");
		}else{
			M("config")->insert($data);
		}
		$this->configfile();
		$this->goall("保存成功");
	}
	
	 
	public function configfile()
	{
		$rs=M("config")->selectRow();
		 
		unset($rs['id']);
		$str='<?php'."\r\n";
		foreach($rs as $key=>$val)
		{
			$str.='define("'.strtoupper($key).'",'."\"{$val}\");\r\n";
			
		}
		$str.='?>';
		file_put_contents(ROOT_PATH."/config/setconfig.php",$str);
	}
	
	 
	
}

?>