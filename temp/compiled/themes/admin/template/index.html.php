<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 
<div class="tabs-border">
	<a class="item active" href="<?php echo APPADMIN; ?>?m=template">本地模板</a>
    <a  class="item" href="<?php echo APPADMIN; ?>?m=template&a=online">在线模板</a>
</div>
<div class="row">
<?php $_from = $this->_var['skinslist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 't');if (count($_from)):
    foreach ($_from AS $this->_var['t']):
?>
<div class="col-12-3"> 
<table  class="table table-bordered">
  <tr>
    <td height="166"><a href="<?php echo $this->_var['t']['skinsimg']; ?>" target="_blank"><img src="<?php echo $this->_var['t']['skinsimg']; ?>" style="width:200px; height:160px;"  /></a></td>
    </tr>
  <tr>
    <td height="20">&nbsp;&nbsp;风格名称：<?php echo $this->_var['t']['skinsname']; ?></td>
    </tr>
  <tr>
  <tr>
  	<td height="20">&nbsp;&nbsp;价格：<?php if ($this->_var['t']['skinsprice']): ?><?php echo $this->_var['t']['skinsprice']; ?><?php else: ?>免费<?php endif; ?></td>
  </tr>
    <td height="20">&nbsp;&nbsp;风格作者：<a href="<?php echo $this->_var['t']['skinsauthorsite']; ?>" target="_blank"><?php echo $this->_var['t']['skinsauthor']; ?></a></td>
  </tr>
  <tr>
    <td height="20">&nbsp;&nbsp;适合版本：<?php echo $this->_var['t']['skinsversion']; ?> <?php if ($this->_var['t']['skinstype'] == 'wap'): ?>手机版<?php endif; ?></td>
  </tr>
  <tr>
    <td height="20">&nbsp;&nbsp;<?php echo $this->_var['t']['using']; ?>  </td>
  </tr>
</table>

</div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
</div>
</div> 
<?php echo $this->fetch('footer.html'); ?>