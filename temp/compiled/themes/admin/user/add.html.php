<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
    <div class="tabs-border">
    	<a href="<?php echo $this->_var['appadmin']; ?>?m=user" class="item active">用户管理</a>
        <a href="<?php echo $this->_var['appadmin']; ?>?m=user&a=add" class="item">用户添加</a>
    </div>
    <div class="main-body w98">
<form method="post" action="<?php echo APPADMIN; ?>?m=user&a=save">
<input type="hidden" name="userid" value="<?php echo $this->_var['data']['userid']; ?>">
<table class="table table-bordered" width="100%">

<tr>
    	<td class="w90">账号：</td>
        <td width=""><input type="text" name="username" value="<?php echo $this->_var['data']['username']; ?>"></td>
    </tr>
	<tr>
    	<td >昵称：</td>
        <td><input type="text" name="nickname" value="<?php echo $this->_var['data']['nickname']; ?>"></td>
    </tr>
    
   
    <tr>
	  <td>手机：</td>
	  <td><input name="telephone" type="text" id="telephone" value="<?php echo $this->_var['data']['telephone']; ?>"></td>
	  </tr>
	<tr>
    
    <tr>
    	<td>密码：</td>
        <td><input type="text" name="password" /></td>
    </tr>
    <tr>
    	<td>重复密码：</td>
        <td><input type="text" name="password2" /></td>
    </tr>
    
    <tr>
    	<td>头像</td>
        <td>
        <div class="upload-row">
        <div class="btn-upload">
        上传文件
        <input type="file" name="upimg" id="upimg" class="btn-upload-file" onChange="uploadImg('upimg')">
        </div>
      <label class="upload-loading" style="color:red; display:none;">正在上传中...</label>
      <input type="hidden" name="user_head" class="upload-field" id="imgurl" value="<?php echo $this->_var['data']['user_head']; ?>">
      <span class="upload-show">
      <?php if ($this->_var['data']['user_head']): ?>
      <img src="<?php echo IMAGES_SITE($this->_var['data']['user_head']); ?>.100x100.jpg">
      <?php endif; ?>
      </span></td>
    </tr>
    
	 
	<tr>
	  <td>账户状态：</td>
	  <td><select name="bstatus">
      	<option  value="10" <?php if ($this->_var['data']['bstatus'] == 99): ?> selected<?php endif; ?>>已禁止</option>
      	<option value="1" <?php if ($this->_var['data']['bstatus'] == 1): ?> selected<?php endif; ?>>已通过</option>
        <option value="0"  <?php if ($this->_var['data']['bstatus'] == 0): ?> selected<?php endif; ?>>待审核</option>
      </select></td>
	  </tr>
	 
	<tr>
	  <td>&nbsp;</td>
	  <td><input type="submit" name="button" id="button" class="btn btn-success" value="保存"></td>
	  </tr>
    
    
</table>
</form>

</div>
 
 

<?php echo $this->fetch('footer.html'); ?>
</body>
</html>