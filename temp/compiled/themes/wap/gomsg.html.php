<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<script language="javascript">
function movenew()
{
	document.location='<?php echo $this->_var['url']; ?>';
}
setTimeout(movenew,2000);

</script>
<body>
<div data-role="page">
	 <div class="header">
  
 	<div class="title">页面跳转中...</div>
 </div>
    <div data-role="content" id="content"><div style="border:5px solid #ccc; border-radius:5px; padding:10px; position:absolute; top:50px; left:0px; right:0px;"><?php echo $this->_var['message']; ?>，如果没有自动跳转请点击 <a href="<?php echo $this->_var['url']; ?>">跳转</a></div></div>
    <?php echo $this->fetch('footer.html'); ?>
</div>
</body>
</html>