<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
  <?php echo $this->fetch('html/nav.html'); ?>
  <div class="main-body w98">
    <form method='post' action='admin.php?m=html&a=save'>
      <input type='hidden' name='id' style='display:none;' value='<?php echo $this->_var['data']['id']; ?>' >
      <table class='table table-bordered' width='100%'>
        <tr>
          <td width="100">标题：</td>
          <td><input type='text' name='title' id='title' class="w98" value='<?php echo $this->_var['data']['title']; ?>' ></td>
        </tr>
        <tr>
          <td>唯一代号：</td>
          <td><input type='text' name='word' id='word' value='<?php echo $this->_var['data']['word']; ?>' ></td>
        </tr>
         
        <tr>
          <td>简介：</td>
          <td> <script type="text/plain" id="info" name="info" ><?php echo $this->_var['data']['info']; ?></script></td>
        </tr>
        <?php if ($this->_var['data']): ?>
        <tr>
          <td>添加时间：</td>
          <td><?php echo date("Y-m-d H:m",$this->_var['data']['dateline']); ?></td>
        </tr>
        <?php endif; ?>
        <tr>
          <td>状态：</td>
          <td><input type="radio" name="bstatus" value="1" <?php if ($this->_var['data']['bstatus'] == 1): ?> checked="checked"<?php endif; ?> />隐藏 &nbsp; 
          <input type="radio" name="bstatus" value="2" <?php if ($this->_var['data']['bstatus'] == 2): ?> checked="checked"<?php endif; ?> />显示</td>
        </tr>
        <tr>
          <td>内容：</td>
          <td> <script type="text/plain" id="content" name="content" ><?php echo $this->_var['data']['content']; ?></script></td>
        </tr>
        
        <tr>
          <td></td>
          <td><input type='submit' value='保存' class='btn btn-success'></td>
        </tr>
      </table>
    </form>
  </div>
 <?php loadEditor();;?>
 <script>
 	var editor=UE.getEditor('content',options);
	var infoEdit=UE.getEditor('info',options);
 </script>
<?php echo $this->fetch('footer.html'); ?>