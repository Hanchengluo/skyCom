<?php
 
define("MYSQL_CHARSET","utf8");
define("TABLE_PRE","sky_");

$dbconfig["master"]=array(
	"host"=>"localhost","user"=>"root","pwd"=>"123","database"=>"skycom"
);

/*缓存配置*/
$cacheconfig=array(
	"file"=>true,
	"php"=>true,
	"mysql"=>true,
	"memcache"=>false
);
/*用户自定义函数文件*/
$user_extends=array(
	"ex_fun.php"
);
/*Session配置 1为自定义 0为系统默认*/
define("SESSION_USER",0);
define("REWRITE_ON",0); 
//rewrite pathinfo
define("REWRITE_TYPE","rewrite");
define("TESTMODEL",0);//开发测试模式
define("SQL_SLOW_LOG",0);//记录慢查询
?>