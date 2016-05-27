<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
 
<?php $this->assign("data",M("html")->getWord("关于我们")); ?>
<body>
<div class="page">
<div class="header" style="">
<div  class="left-btn goback"><span class="iconfont icon-back"></span></div>
<div class="title"><?php echo $this->_var['data']['title']; ?></div>
 
</div>
<div class="main-body">


 
    <div class="d-content"><?php echo $this->_var['data']['content']; ?></div>
    <div class="clearfix"></div>

</div>

<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>
