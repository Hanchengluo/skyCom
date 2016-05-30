<!DOCTYPE >
<html>
<?php $this->assign('nvactive','article'); ?>
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
     <div class="locat">当前位置：<a href="">首页</a> > <a href="">新闻中心</a></div>
     
     <div class="newslist">
      <ul class="clearfix">
      <?php $_from = $this->_var['list']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
       <li class="<?php if (k % 2 == 1): ?>no_mar<?php endif; ?>">
        <div class="newslist_img fl"><a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>" ><img src="<?php echo $this->_var['skins']; ?>images/objpic02.jpg" /></a></div>
        <div class="newslist_txt fr">
          <h4><a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>" ><?php echo $this->_var['c']['title']; ?></a></h4>
          <h5>data：<?php echo date("Y-m-d",$this->_var['c']['dateline']); ?></h5>
          <div class="newslist_txt_con"><?php echo $this->_var['c']['description']; ?></div>
        </div>
      </li>
      <?php if (k % 2 == 1): ?>
      <div class="bor_bot"></div>
      <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
      
        
      
       
      
       <div class="bor_bot"></div>
       </ul>
      </div>
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
