<?php
/**
*Author 雷日锦 362606856@qq.com
*model 自动生成
*/				
class helloModel extends model{
	public $base;
	public function __construct(&$base){
		parent::__construct($base);
		$this->base=$base;
		$this->table="hello";
	}
	/**
	*按照id为键值返回数组
	**/
	public function idlist($option){
		$res=$this->select($option);
		$data=array();
		if($res){
			foreach($res as $rs){
				$data[$rs['id']]=$rs;
			}
		}
		return $data;
	}
	
}

?>