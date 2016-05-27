<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="tabs-border"> <a class="item" href="<?php echo $this->_var['appadmin']; ?>?m=navbar">导航管理</a> <a class="item active " href="<?php echo $this->_var['appadmin']; ?>?m=navbar&a=add">导航添加</a> </div>
<div class="rbox">
<form action="admin.php?m=navbar&a=save" method="post">
  <input type="hidden" name="id" value="<?php echo $this->_var['nav']['id']; ?>">
  <table width="100%" border="0" cellspacing="1" cellpadding="0" class="table table-bordered">
     
    <tr>
      <td class="w90" align="right" >打开方式：</td>
      <td><select name="target" id="target">
          <option value="_self">当前窗口</option>
          <option value="_blnk" <?php if ($this->_var['nav']['target'] == '_blank'): ?> selected="selected"<?php endif; ?>>新窗口</option>
        </select></td>
    </tr>
    
    <?php if ($this->_var['parent']): ?>
    <tr>
      <td    height="30" align="right">上级分类：</td>
      <td  ><input type="hidden" name="pid" value="<?php echo $this->_var['parent']['id']; ?>">
        <?php echo $this->_var['parent']['title']; ?></td>
    </tr>
    <?php endif; ?>
    <tr>
      <td   align="right">名称：</td>
      <td><input name="title" type="text" value="<?php echo $this->_var['nav']['title']; ?>" />
      </td>
    </tr>
    <tr>
      <td height="30" align="right">链接：</td>
      <td><input name="link_url" type="text" id="link_url" value="<?php echo $this->_var['nav']['link_url']; ?>" size="40" /></td>
    </tr>
    <?php if (! $this->_var['parent']): ?>
    <tr>
      <td height="30" align="right">位置：</td>
      <td><select name="group_id" id="group_id">
          
    	<?php $_from = $this->_var['group_list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'g');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['g']):
?>
        
          <option value="<?php echo $this->_var['k']; ?>" <?php if ($this->_var['k'] == $this->_var['nav']['group_id']): ?> selected<?php endif; ?>><?php echo $this->_var['g']; ?></option>
          
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
        </select></td>
    </tr>
    <?php endif; ?>
    <tr>
      <td align="right">图标：</td>
      <td><div class="btn-upload"> <i class="iconfont icon-upload"></i>上传文件
          <input type="file" name="upimg" class="btn-upload-file" id="upimg" >
        </div>
        <label  id="loading" style="color:red; display:none;">正在上传中...</label>
        <input type="hidden" name="logo" id="imgurl" value="<?php echo $this->_var['nav']['logo']; ?>">
        <span id="imgShow"> <?php if ($this->_var['nav']['logo']): ?> <img src="/<?php echo $this->_var['nav']['logo']; ?>"> <?php endif; ?> </span></td>
    </tr>
    <tr>
      <td height="30" align="right">m： </td>
      <td><input name="m" type="text" id="m" value="<?php echo $this->_var['nav']['m']; ?>" /></td>
    </tr>
    <tr>
      <td height="30" align="right">a：</td>
      <td><input name="a" type="text" id="a" value="<?php echo $this->_var['nav']['a']; ?>" /></td>
    </tr>
    
    <tr>
      <td height="30" align="right">激活标签： </td>
      <td><input name="aclabel" type="text" id="aclabel" value="<?php echo $this->_var['nav']['aclabel']; ?>" /></td>
    </tr>
    <tr>
      <td height="30" align="right">激活值：</td>
      <td><input name="acvalue" type="text" id="acval" value="<?php echo $this->_var['nav']['acvalue']; ?>" /></td>
    </tr>
    
    <tr>
      <td height="30" align="right">排序：</td>
      <td><input name="orderindex" type="text" id="orderindex" value="<?php echo $this->_var['nav']['orderindex']; ?>" /></td>
    </tr>
    <tr>
      <td height="30" align="right">&nbsp;</td>
      <td><input type="submit" name="button" id="button" value="保存" class="btn" /></td>
    </tr>
  </table>
</form>
<script language="javascript">
	$(document).on("change","#upimg",function(){
		skyUpload("upimg","/index.php?m=upload&a=img",function(e){
			var data=eval("("+e.target.responseText+")");
			if(data.error)
			{
				skyToast(data.message);
			 }else
			 {
				 $("#imgShow").html("<img src='"+data.data.truefilename+".100x100.jpg' width='50'>");
				 $("#imgurl").val(data.data.filename);
			}
		});
	});
    
</script> 
<?php echo $this->fetch('footer.html'); ?>
