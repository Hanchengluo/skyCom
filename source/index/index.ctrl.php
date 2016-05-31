<?php
class indexControl extends skymvc
{
	function __construct()
	{
		parent::__construct();
	}
	
	

	public function onDefault()
	{
		 
		 
		 $data=M("category")->children(0);
	 
		$this->smarty->display("index.html");
	}
}

?>