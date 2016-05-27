<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
<div class="page">

<?php echo $this->fetch('article/panel.html'); ?>
<div class="header" style="">
<div  class="left-btn goback"><span class="iconfont icon-back"></span></div>
<div class="title">文章中心</div>
<div class="right-btn panel-btn"><span class="iconfont icon-menu"></span></div>
</div>
<div class="main-body">
<ul class="data-list">
 
          <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
          <?php echo $this->fetch('li_item.html'); ?>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>
</div>

<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>
