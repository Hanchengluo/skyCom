<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 <div class="header">
 <a  class="left-btn" href="<?php echo R("/index.php");?>"><span class="iconfont icon-back"></span></a>
 	<div class="title">留言板</div>
 </div>
 <?php echo $this->fetch('guest/nav.html'); ?>
 <div class="guestlist">
	<?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
    	<div class="item">
        	<div class="title"><?php echo $this->_var['c']['title']; ?> <small><?php echo $this->_var['catlist'][$this->_var['c']['catid']]; ?></small></div>
            <div class="row">邮箱：<?php echo $this->_var['c']['email']; ?> QQ:<?php echo $this->_var['c']['qq']; ?></div>
            <div class="row">留言时间：<?php echo date("Y-m-d H:m:i",$this->_var['c']['dateline']); ?></div>
            <div class="row">留言内容：</div>
            <div class="content"><?php echo $this->cutstr($this->_var['c']['content'],32,'...'); ?></div>
            <?php if ($this->_var['c']['reply_time']): ?>
            	<div class="row">回复时间：<?php echo date("Y-m-d H:m",$this->_var['c']['reply_time']); ?></div>
            	<div class="content"><?php echo $this->cutstr($this->_var['c']['reply_content'],32,'..'); ?></div>
            	
            <?php else: ?>
            	<div class="content">暂无回复</div>
            <?php endif; ?>
             
        </div>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>

</div>
<div><?php echo $this->_var['pagelist']; ?></div>
 
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>