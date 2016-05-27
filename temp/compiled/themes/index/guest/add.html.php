<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<?php echo $this->fetch('header.html'); ?>

 <div class="main-body box960">
     <div class="tabs-border">
        <a class="item " href="<?php echo R("/index.php?m=guest");?>">留言板</a>
        <a class="item active" href="<?php echo R("/index.php?m=guest&a=add");?>">添加留言</a>
        <a class="item"  href="<?php echo R("/index.php?m=guest&a=my");?>"> 我的留言</a>
    </div>
      <form method='post' action='index.php?m=guest&a=save'>
        <input type='hidden' name='id' style='display:none;' value='<?php echo $this->_var['data']['id']; ?>' >
        <table class='table table-border-row' width='100%'>
          <tr>
            <td width="100">主题：</td>
            <td><input type='text' name='title' id='title' value='<?php echo $this->_var['data']['title']; ?>' ></td>
          </tr>
          <tr>
            <td>类型：</td>
            <td><select name="catid">
            	<?php $_from = $this->_var['catlist']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
            	<option value="<?php echo $this->_var['k']; ?>" <?php if ($this->_var['data']['catid'] == $this->_var['k']): ?> selected="selected"<?php endif; ?>><?php echo $this->_var['c']; ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select></td>
          </tr>
          <tr>
            <td>邮箱：</td>
            <td><input type='text' name='email' id='email' value='<?php echo $this->_var['data']['email']; ?>' ></td>
          </tr>
          <tr>
            <td>QQ：</td>
            <td><input type='text' name='qq' id='qq' value='<?php echo $this->_var['data']['qq']; ?>' ></td>
          </tr>
          <?php if ($this->_var['data']): ?>
          <tr>
            <td>留言时间：</td>
            <td><?php echo date("Y-m-d H:m",$this->_var['data']['dateline']); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td>留言内容：</td>
            <td><textarea name='content' id='content' style="width:400px; height:100px;"><?php echo $this->_var['data']['content']; ?></textarea></td>
          </tr>
            
          <tr>
            <td></td>
            <td><input type='submit' value='保存' class='btn btn-success'></td>
          </tr>
        </table>
      </form>
</div>  
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>