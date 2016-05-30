<!DOCTYPE >
<html>
<?php $this->assign('nvactive','product'); ?>
<?php echo $this->fetch('head.html'); ?>

<body>
<div class="wrap clearfix">
<!-- left nav start -->
  <?php echo $this->fetch('inc/sidebar.html'); ?>
<!-- left nav end-->
  
  <!--right-->
  <div class="show_right fr">
   <?php echo $this->fetch('inc/banner.html'); ?>
    <div class="main">
     <div class="locat">当前位置：<a href="">首页</a> > <a href="/index.php?m=article&a=list&catid=1">作品展示</a></div>
      <!--分类-->
      <div class="show_fenl clearfix">
         <ul>
         <?php $this->assign("procats",M("category")->children(SKINS_PROCAT)); ?>
         <?php $_from = $this->_var['procats']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
           <li class="<?php if ($this->_var['k'] == 0): ?>no_mar<?php endif; ?>"><a href="/index.php?m=article&a=list&catid=<?php echo $this->_var['c']['catid']; ?>"><?php echo $this->_var['c']['cname']; ?></a></li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>  
            
         </ul>
       </div>
      <!--图片-->
      <div class="showpic clearfix">
        <ul>
         <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
          <li class="<?php if ($this->_var['k'] % 3 == 2): ?>no_mar<?php endif; ?>"><a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>"><img src="<?php echo images_site($this->_var['c']['imgurl']); ?>"  /><span><?php echo $this->_var['c']['title']; ?></span></a></li>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
           
        </ul>
      <!--分页-->  
      <div class="Page clearfix">
     <?php echo $this->_var['pagelist']; ?>
  </div>
  
     <!--footer start-->
    <?php echo $this->fetch('footer.html'); ?>
    <!--footer end-->
      
      </div>
    </div>

</div>
</body>
</html>
