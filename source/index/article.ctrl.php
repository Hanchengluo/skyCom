<?php
	/**
	*Author 雷日锦 362606856@qq.com 
	*控制器自动生成
	*/
	if(!defined("ROOT_PATH")) exit("die Access ");
	class articleControl extends skymvc{
		
		public function __construct(){
			parent::__construct();
		}
		
		public function onDefault(){
			$where=" bstatus=2 ";
			$url="/index.php?m=article&a=default";
			$limit=20;
			$start=get("per_page","i");
			$option=array(
				"start"=>intval(get_post('per_page')),
				"limit"=>$limit,
				"order"=>" id DESC",
				"where"=>$where
			);
			$rscount=true;
			$data=M("article")->select($option,$rscount);
			$pagelist=$this->pagelist($rscount,$limit,$url);
			$this->smarty->goassign(
				array(
					"data"=>$data,
					"pagelist"=>$pagelist,
					"rscount"=>$rscount,
					"url"=>$url
				)
			);
			$this->smarty->display("article/index.html");
		}
		
		public function onList(){
			$parent=$cat_2nd=$cat_3nd=array();
			$catid=get('catid','i');	
			$cat=M("category")->selectRow(array("where"=>"catid=$catid"));
			$cat_top=$cat;
			if($cat['pid']){
				
				$parent=M("category")->selectRow(array("where"=>"catid=".$cat['pid']));
				if($cat['pid']){
					$parent=M("category")->selectRow(array("where"=>array("catid"=>$cat['pid'])));
					if($parent['pid']){
						$cat_2nd=$parent;
						$cat_top=M("category")->selectRow(array("where"=>array("catid"=>$parent['pid'])));
						$cat_3nd=$cat;
					}else{
						$cat_top=$parent;
						$cat_2nd=$cat;
					}			 
				}
				
			}
			if($catid){
				$children=M("category")->children($catid);
				if(empty($children)){
					if($cat['level']>2){
						$children=M("category")->children($parent['catid']);
					}
				}
			}
			$tpl=M("category")->getTpl($cat['catid'],1);
			$tpl=$tpl?$tpl:"article/list.html";
			$this->smarty->assign(array(
				"cat"=>$cat,
				"children"=>$children,
				"parent"=>$parent,
				"cat_top"=>$cat_top,
				"cat_2nd"=>$cat_2nd,
				"cat_3nd"=>$cat_3nd,
			));
			$rscount=true;
			$cids=M("category")->id_family($catid);
			$where=" bstatus=2  ";
			$url="/index.php?m=list&catid=".$catid;
			if(!empty($cids)){
				$where.=" AND catid in("._implode($cids).") ";
			}else{
				$where.=" AND 1=2 ";
			}
			$keyword=get('keyword','h');
			if($keyword){
				$where.=" AND title like '%".$keyword."%' ";
				$ur.="&keyword=".urlencode($keyword);
			}
			$orderby=get('orderby','h');
			if($orderby){
				switch($orderby){
					 
					case "price":
							$order=" price ASC";
						break;
					case  "id":
							$order=" id DESC";
						break;
					case  "sold_num":
							$order=" sold_num DESC";
						break;

					default :
							$order=" grade DESC";
						break;
				}
				$url.="&orderby=".$orderby;
			}
			$start=get_post('per_page','i');
			$limit=20;
			$option=array(
				"where"=>$where,
				"start"=>$start,
				"limit"=>$limit,
				"order"=>$order
			);
			$data=M("article")->select($option,$rscount);
			if($data){
				$t_ids=array();
				foreach($data as $k=>$v){
					$t_ids[]=$v['catid'];
					
				}
				if($t_ids){
					$t_c=M("category")->cat_list(" catid in("._implode($t_ids).")");
				}
				
				foreach($data as $k=>$v){
					$v['cname']=$t_c[$v['catid']];
					
					$data[$k]=$v;
				}
			}
			$pagelist=$this->pagelist($rscount,$limit,$url);
		
			$catlist=M("category")->children($catid) ;
			if(empty($catlist)){
				$catlist=M("category")->children($cat['pid']) ;
			}
			
		
		 	//end分页
			$per_page=$start+$limit;
			$per_page=$per_page>=$rscount?0:$per_page;
			$this->smarty->goassign(array(
				"list"=>$data,
				"rscount"=>$rscount,
				"pagelist"=>$pagelist,
				"catlist"=>$catlist,
				"per_page"=>$per_page
				
			));
			$this->smarty->display($tpl);
		}
		
		public function onShow(){
			$id=get_post("id","i");
			if($id){
				$data=M("article")->selectRow(array("where"=>"id={$id}"));
				
			}
			$category=$cat=M("category")->selectRow("catid=".$data['catid']);
			if($cat['level']==1){
				$cat_top=$cat;
			}
			if($cat['pid']){
				$parent=M("category")->selectRow(array("where"=>array("catid"=>$cat['pid'])));
				if($parent['pid']){
					$cat_2nd=$parent;
					$cat_top=M("category")->selectRow(array("where"=>array("catid"=>$parent['pid'])));
					$cat_3nd=$cat;
				}else{
					$cat_top=$parent;
					$cat_2nd=$cat;
				}			 
			}
			$seo=array(
					"title"=>htmlspecialchars($data['title']),
					"keywords"=>htmlspecialchars($data['keywords']?$data['keywords']:$data['title']),
					"description"=>htmlspecialchars($data['description']?$data['description']:$data['title']),
			);
			/*******获取上下篇*******/
		$cids=M("category")->id_family($data['catid']);
		$cids && $last_rs=M("article")->selectRow(array("where"=>" catid in("._implode($cids).")  AND id<".$data['id']." AND  bstatus =2   ", "order"=>"id DESC") );
		$cids && $next_rs=M("article")->selectRow(array("where"=>" catid in("._implode($cids).")  AND id>".$data['id']." AND  bstatus =2    ", "order"=>"id ASC") );
		/*******End获取上下篇*******/
			$this->smarty->goassign(array(
				"data"=>$data,
				"seo"=>$seo,
				"cat"=>$category,
				"cat_top"=>$cat_top,
				"cat_2nd"=>$cat_2nd,
				"cat_3nd"=>$cat_3nd,
				"last_rs"=>$last_rs,
				"next_rs"=>$next_rs,
			));
			$tpl=M("category")->getTpl($data['catid'],2);
			$tpl=$tpl?$tpl:"article/show.html";
			$tpl=$data['tpl']?$data['tpl']:$tpl;
		 
			$this->smarty->display($tpl);
		}
		
	public function onAddClick(){
		$id=get_post('id','i');
		$row=M("article")->selectRow("id=".$id);
		if($row){
			M("article")->update(array("view_num"=>$row['view_num']+1),"id=".$id);
		}
		 
	 }
		
	}

?>