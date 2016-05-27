<?php
function a(){
	 
}

function set_cookie($key,$val,$expire,$path="/",$domain=DOMAIN){
	setcookie($key,$val,time()+$expire,$path,$domain);
}

function get_cookie($key){
	return $_COOKIE[$key];
}

function set_session($key,$val){
	$_SESSION[$key]=$val;
}

function get_session($key){
	return $_SESSION[$key];
}

function del_session($key){
	unset($_SESSION[$key]);
}


function sess_read($id){		
		$row=setDB('dbsession')->getRow("select * from ".TABLE_PRE."dbsession WHERE id='".$id."'");
		return base64_decode($row['data']);
	}
	
	function sess_write($id,$data){
		setDB('dbsession')->query("replace into ".TABLE_PRE."dbsession set data='".base64_encode($data)."',dateline=".time()." ,id='".$id."' ");
	}
	
	function sess_destroy($id){
		setDB('dbsession')->query("DELETE FROM ".TABLE_PRE."dbsession WHERE id='".$id."' ");
	}
	function sess_gc($t){
		setDB('dbsession')->query("DELETE FROM ".TABLE_PRE."dbsession WHERE dateline<".(time()-$t)." "); 
	}
?>