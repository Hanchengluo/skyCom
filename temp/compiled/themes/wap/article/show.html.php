<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
 

<body style=" background-color:#EBEBEB;">
<div class="page">
<?php echo $this->fetch('article/panel.html'); ?>
<div class="header" style="">
<div  class="left-btn goback"><span class="iconfont icon-back"></span></div>
<div class="title">内容</div>

</div>

<div class="main-body" style="background-color:#fff; padding-top:10px;">
<h3 style="margin-bottom:10px; padding-left:10px;"><?php echo $this->_var['data']['title']; ?></h3>
<div class="d-tool"> <?php echo $this->_var['data']['author']['nickname']; ?>&nbsp;&nbsp; <?php echo timeago($this->_var['data']['dateline']); ?></div>
<div class="d-content" >
<?php echo $this->_var['data']['content']; ?>
</div>
  
</div>

<?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>
