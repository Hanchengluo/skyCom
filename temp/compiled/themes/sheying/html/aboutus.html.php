<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>

<body>
<div class="wrap clearfix">
<!-- left nav start -->
  <?php echo $this->fetch('inc/sidebar.html'); ?>
<!-- left nav end-->
<?php $this->assign("data",M("html")->getword('关于我们')); ?>
<!--right-->
  <div class="show_right fr">
    <?php echo $this->fetch('inc/banner.html'); ?>
    <div class="main">
     <div class="locat">当前位置：<a href="">首页</a> > <a href=""><?php echo $this->_var['data']['title']; ?></a></div>
     
    <div class="content clearfix"> 
   
  <div class="contact_left fl">
    <h3>关于我们 / Contact Us</h3>
    <h4><?php echo $this->_var['site']['sitename']; ?></h4>
    <div class="cont_lxwm">
      <?php echo $this->_var['data']['content']; ?>
    </div>
    
  </div>
  </div>
    
    
     <!--footer start-->
    <?php echo $this->fetch('footer.html'); ?>
    <!--footer end--> 
   </div>
  </div>
 </div>
</body>
</html>
