<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>
<div class="main-body">
	<?php if (! $this->_var['ssadmin']): ?>
     <div style="width:480px; margin:0 auto;">
     <form method="post"  action="/admin.php?m=login&a=save">
     	<div class="input-row">
        	<input type="text" name="adminname" value="" placeholder="用户名">
        </div>
        
        <div class="input-row">
        	<input type="text" name="password" value="" placeholder="密码">
        </div>
        
        <div class="">
        	<button class="btn btn-row">登录</button>
        </div>
        
     </form>
     </div>
	<?php else: ?>
    	<div style="width:600px; text-align:center; margin: 0 auto; background-color:#C4E6A2; margin-top:100px; height:400px; line-height:40px; ">
     
   欢迎你，<?php echo $this->_var['ssadmin']['adminname']; ?>  [<a href="<?php echo R("/admin.php?m=login&a=logout");?>">注销</a>]<br>
    <?php $_from = $this->_var['who']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'w');if (count($_from)):
    foreach ($_from AS $this->_var['w']):
?>
    <?php echo $this->_var['w']; ?><br>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
    <?php echo $this->_var['hook_indata']; ?><br>
    <?php echo $this->_var['hook_redata']; ?><br>
    <?php echo $this->_var['skins']; ?>
    </div>
    
    <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>
</body>

</html>