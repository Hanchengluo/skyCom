<!DOCTYPE >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登陆</title>
<script src="/plugin/skyweb/jquery.js"></script>

</head>

<body>
<style type="text/css">
*{font-size:14px; margin:0;}
.txt{height:18px;}
body{background-image:url(<?php echo $this->_var['skins']; ?>images/index_bg.jpg);}
.tb{ margin:0 auto; width:640px; height:300px; background:url(<?php echo $this->_var['skins']; ?>images/index_bg2.jpg); font-size:13px; color:#FFF; margin-top:130px;}
.alpha{filter:alpha(opacity=70);}
</style>
<table width="640" border="0" align="center" cellpadding="0" cellspacing="0" class="tb">
  <tr>
    <td width="296" height="117">&nbsp;</td>
    <td width="344">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><form action="<?php echo $this->_var['appadmin']; ?>?m=login&a=login_save" id="login-form" method="post" target="_parent"><table width="300" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="31%" height="30" align="right">用户名：</td>
        <td width="69%"><input type="text" name="username" id="username" class="txt" /></td>
      </tr>
      <tr>
        <td height="30" align="right">密码：</td>
        <td><input type="password" name="password" id="password" class="txt"  /></td>
      </tr>
      <tr>
        <td height="30" align="right">校验码：</td>
        <td valign="middle"><input name="checkcode" type="text" id="checkcode" size="8" class="txt"  /><img src="/index.php?m=checkcode" height="25" align="absmiddle" id="img" onclick="img.src='/index.php?m=checkcode?'+Math.random()" /></td>
      </tr>
      <tr>
        <td height="25" align="right">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="25" align="right">&nbsp;</td>
        <td><input type="button" name="button" id="login_submit" value="登陆" style="padding:6px 10px;" />
          <input type="reset" name="button2" id="button2" value="取消"  style="padding:6px 10px;" /></td>
      </tr>
    </table></form></td>
  </tr>
</table>
<script>
$(function(){
	$(document).on("click","#login_submit",function(){
		$.post("<?php echo $this->_var['appadmin']; ?>?m=login&a=save&ajax=1",$("#login-form").serialize(),function(data){
			if(data.error==0){
				
				window.location=data.url
			}else{
				alert(data.message);
			}
		},"json");
	});
});
</script>

</body>
</html>