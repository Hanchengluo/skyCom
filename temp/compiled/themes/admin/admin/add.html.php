<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>

<?php echo $this->fetch('admin/nav.html'); ?>

<div class="rbox">
<form action="<?php echo $this->_var['appadmin']; ?>?m=admin&a=save" method="post" autocomplete="off">
<input type="hidden" name="id" value="<?php echo $this->_var['data']['id']; ?>">
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="table table-bordered">
  <tr>
    <td class="w90" height="25" align="right">管理员：</td>
    <td  ><input name="username" type="text" id="username" value="<?php echo $this->_var['data']['username']; ?>" size="40" /></td>
  </tr>
   
  <tr>
    <td height="25" align="right">密码：</td>
    <td><input name="password" type="password" id="password" size="40" /></td>
  </tr>
  <tr>
    <td height="25" align="right">确认密码：</td>
    <td><input name="password2" type="password" id="password2" size="40" /></td>
  </tr>
   
  <tr>
    <td height="25" align="right">&nbsp;</td>
    <td><input type="submit" name="button" id="button" value="提交" class="btn" /></td>
  </tr>
</table>

</form>
</div> 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>