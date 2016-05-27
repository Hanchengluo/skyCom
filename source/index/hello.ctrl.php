<?php
 class helloControl extends skymvc{
	 
	public function __construct(){
		parent::__construct();
	}
	
	public function onInit(){
		
	}
	
	public function onCheckLogin(){
		$ssuser=$this->get_session('ssuser');
		if(!$ssuser){
			$this->goAll("请先登录",1,0,"/index.php?m=login");
		}
		echo "你已经成功登录";
	}
	
	public function onLogin(){
		$this->set_session('ssuser',array("userid"=>1));
		$this->goAll("登录成功",0,0,"/index.php?m=hello&a=checklogin");
	}
	
	public function onsetSc(){
		$k="hello";
		$v="这是hello".date("Y-m-d H:i:s");
		$this->set_cookie($k,$v,10);
		//$this->set_cookie($k,$v,-300);	
		$_SESSION[$k]=$v;
		$this->set_session($k,$v);
		//$this->del_session($k);
		 
		echo "设置cookie session 值：$v <a href=\"/index.php?m=hello&a=getSc\" target=\"_blank\">查看session cookie</a>";
	}
	public function ongetSc(){
		$k="hello";
		echo "--cookie--<br>";
		//$_COOKIE[$k];
		echo $this->get_cookie($k);
		echo "<br>---session----<br>";
		//echo $_SESSION[$k]."<br>";
 
		echo $this->get_session($k);
	}
	
	public function onView(){
		$this->smarty->assign("str","我是字符串");
		$this->smarty->goassign(array(
			"str"=>"我是字符串",
			"arr"=>array("我是数组1","我是数组2","我是数组3","我是数组4")
		));
		$this->smarty->html("hello/view.html");
		//$this->smarty->fetch("hello/view.html");
		$this->smarty->display("hello/view.html");
	}
	
	public function  Api(){
		return M("hello")->select();
	}
	
	public function onModel(){
		/****
		//select
		M("hello")->select()
		//selectRow
		M("hello")->selectRow();
		//insert
		M("hello")->insert($data);
		//update
		M("hello")->update($data);
		//delete
		M("hello")->delete($data);
		*/
		$option=array(
			"where"=>" bstatus<11 ",
			"start"=>0,
			"limit"=>2,
			"fields"=>"*",
			"order"=>"id DESC"
		);
		/*
		$rscount=true;
		//select
		$data=M("hello")->select($option,$rscount);
		echo "\r\n----select----\r\n";
		print_r($data);
		echo "\r\n".$rscount;
		//复杂查询
		echo  "\r\n-------get------\r\n";
		$data=M("hello")->getAll("select * from ".table('hello')." where bstatus<11 order by id desc limit 0,2 ");
		$rscount=M("hello")->getOne(" select count(1) from ".table('hello')." where bstatus<11 ");
		echo "\r\n----select----\r\n";
		print_r($data);
		echo "\r\n".$rscount;
		
		//selectRow
		$option['limit']=1;
		$row=M("hello")->selectRow($option);
		print_r($row);
		//简单查询
		M("hello")->selectRow("id=".$row['id']);
		M("hello")->getRow("select * from ".table('hello')." where bstatus<11 order by id desc limit 1");
		
		
		//selectCols
			$option['fields']="id";
			$cols=M("hello")->selectCols($option);
			M("hello")->getCols("select id from ".table('hello')." where bstatus<11 order by id desc limit 2");
			print_r($cols);
		
		
		//selectOne
			$option['limit']=1;
			$one=M("hello")->selectOne($option);
			print_r($one);
			M("hello")->getOne("select id from ".table('hello')." where bstatus<11 order by id desc limit 2");
		 
		//changenum
			$option['limit']=1;
			$row=M("hello")->selectRow($option);
			print_r($row);
			M("hello")->changenum("bstatus",-1,"id=".$row['id']);
			$row=M("hello")->selectRow($option);
			print_r($row);
		 */
		$option=array(
			"where"=>" bstatus<11 ",
			"start"=>0,
			"limit"=>2,
			"fields"=>"*",
			"order"=>"id DESC"
		);
		$idlist=M("hello")->idlist($option);
		print_r($idlist);
		
			
	}
	
	public function onDefault(){
		$start=get('per_page','i');
		$limit=24;
		$url="/index.php?m=hello";
		$where=" bstatus<11 ";
		$order=" id DESC";
		$option=array(
			"where"=>$where,
			"start"=>$start,
			"limit"=>$limit,
			"order"=>$order
		);
		$rscount=true;
		$data=M("hello")->select($option,$rscount);
		$pagelist=$this->pagelist($rscount,$limit,$url);
		$next_page=($start+$limit);
		$next_page=$next_page>$rscount?0:$next_page;
		$this->smarty->goassign(array(
			"data"=>$data,
			"limit"=>$limit,
			"next_page"=>$next_page,
			"url"=>R("/index.php?m=hello&a=my&k=1&f=2")
		));
		
		//$this->smarty->html("hello/default.html");
		//$this->smarty->fetch("hello/default.html");
		$this->smarty->display("hello/default.html");
	}
	
	public function onList(){
		$start=get('per_page','i');
		$limit=24;
		$url="/index.php?m=hello";
		$where=" bstatus<11 ";
		$order=" id DESC";
		$option=array(
			"where"=>$where,
			"start"=>$start,
			"limit"=>$limit,
			"order"=>$order
		);
		$rscount=true;
		$data=M("hello")->select($option,$rscount);
		$pagelist=$this->pagelist($rscount,$limit,$url);
		$next_page=($start+$limit);
		$next_page=$next_page>$rscount?0:$next_page;
		$this->smarty->goassign(array(
			"data"=>$data,
			"limit"=>$limit,
			"next_page"=>$next_page,
		));
		$this->smarty->display("hello/list.html");
	}
	
	public function onShow(){
		$id=get_post('id','i');
		$data=M("hello")->selectRow("id=".$id);
		$this->smarty->goassign(array(
			"data"=>$data
		));
		$this->smarty->display("hello/show.html");
	}
	
	public function onMy(){
		$start=get('per_page','i');
		$limit=24;
		$url="/index.php?m=hello";
		$where=" bstatus<11 ";
		$order=" id DESC";
		$option=array(
			"where"=>$where,
			"start"=>$start,
			"limit"=>$limit,
			"order"=>$order
		);
		$rscount=true;
		$data=M("hello")->select($option,$rscount);
		$pagelist=$this->pagelist($rscount,$limit,$url);
		$next_page=($start+$limit);
		$next_page=$next_page>$rscount?0:$next_page;
		$this->smarty->goassign(array(
			"data"=>$data,
			"limit"=>$limit,
			"next_page"=>$next_page,
		));
		$this->smarty->display("hello/my.html");
	}
	
	public function onAdd(){
		$id=get_post('id','i');
		
		$data=M("hello")->selectRow("id=".$id);
		
		$this->smarty->assign(array(
			"data"=>$data
		));
		$this->smarty->display("hello/add.html");
	}
	
	public function onSave(){
		$id=get_post('id','i');
		//简单获取post
		$data=M("hello")->postData();
		unsert($data['bstatus']);
		/*
		$data['title']=post('title','h');
		$data['content']=post('content','h');
		$data['bstatus']=post('bstatus','i');
		*/
		if($id){
			M("hello")->update($data,"id=".$id);
		}else{
			$data['dateline']=time();
			M("hello")->insert($data);
		}
		$this->goAll("保存成功");
	}
	
	public function onDelete(){
		$id=get('id','i');
		M("hello")->update(array("bstatus"=>11),"id=".$id);
		/**
		M("hello")->delete("id=".$id);
		**/
		$this->goAll("删除成功");
	}
	
	
 }
?>