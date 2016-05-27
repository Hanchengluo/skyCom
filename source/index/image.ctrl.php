<?php
class imageControl extends skymvc{
	
	public function __construct(){
		parent::__construct();
	}
	
	public function onDefault(){
		
		$this->smarty->display("image/default.html");
	}
	public function onYzm(){
		$yzm=strtolower(post('yzm','h'));
		
		if($yzm!=strtolower($this->get_session('checkcode'))){
			$this->goAll("验证码出错",1);
		}else{
			$this->goAll("验证码成功");
		}
	}
	
	public function onImage(){
		$this->loadClass("image");
		//生成文件质量
		$this->image->quality=75;
		//makethumb($dstimg,$img,$dstw,$dsth=999,$all=false)
		$img="attach/1.png";
		$this->image->makeThumb("attach/1.100x100.jpg",$img,100,100,1);
		$this->image->makeThumb("attach/1.small.jpg",$img,100,100);
		
		/**
		增加水印
		
		$config=array(
			"dstimg"=>"要打水印的图片",
			//打水印的位置 0随机 1左上 2中上 3右上 4左中 5中中 6右中 7左下 8中下 9右下  
			"warterpos"=>0,
			"img"=>"水印图片",
			"str"=>"水印文字",
			"size"=>文字大小,
			"font"=>"字体文件",
			"color"=>"文字颜色",
			"show"=>0,//0保存文件 1直接输出,
			"type"=>1,//水印类型 1 文字 0图片
		)
		*/
		$config=array(
			"dstimg"=>"attach/logofont.jpg",
			"warterpos"=>9,
			"img"=>"attach/1.100x100.jpg",
			"str"=>"水印文字",
			"size"=>14,
			"color"=>"#333",
			"show"=>0,//直接输出
			"type"=>1
		);
		$this->image->addwater($config);
		$config['type']=0;
		$config['dstimg']="attach/logoimg.jpg";
		$this->image->addwater($config);
		$this->goAll( "图片处理完毕");
	}
	
	public function onCheckCode(){
		$this->loadClass("checkcode");
		//setimg($type=1,$width=80,$height=25)
		$this->checkcode->setimg(1);
	}
	
}

?>