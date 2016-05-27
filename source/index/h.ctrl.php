<?php
 class helloControl extends skymvc{
	 
	public function __construct(){
		parent::__construct();
	}
	/***前置方法***/
	public function onInit(){
		
	}
	/**默认 Action**/
	public function onDefault(){
		$this->smarty->display("hello/index.html");
	}
	/**列表Action***/
	public function onList(){
	
		$this->smarty->display("hello/list.html");
	}
	/**详情Action***/
	public function onShow(){
		 
		$this->smarty->display("hello/show.html");
	}
	/**我的 Action***/
	public function onMy(){
		 
		$this->smarty->display("hello/my.html");
	}
	/**添加 Action***/
	public function onAdd(){
		 
		$this->smarty->display("hello/add.html");
	}
	/**保存 Action***/
	public function onSave(){
		 
	}
	/**删除 Action***/
	public function onDelete(){
		 
	}
	
	
 }
?>