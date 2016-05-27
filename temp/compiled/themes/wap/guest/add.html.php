<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
 <div class="header">
 <div  class="left-btn goback"><span class="iconfont icon-back"></span></div>
 	<div class="title">留言添加</div>
 </div>
<?php echo $this->fetch('guest/nav.html'); ?>
      <form method="post" action="index.php?m=guest&a=save">
        <input type="hidden" name="id" style="display:none;" value="<?php echo $this->_var['data']['id']; ?>" >
        <table class="table table-border-row"  width="100%">
          <tr>
            <td width="70">主题：</td>
            <td><input type="text" name="title" id="title" value="<?php echo $this->_var['data']['title']; ?>" ></td>
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
            <td><input type="email" name="email" id="email" value="<?php echo $this->_var['data']['email']; ?>" ></td>
          </tr>
          <tr>
            <td>QQ：</td>
            <td><input type="text" name="qq" id="qq" value="<?php echo $this->_var['data']['qq']; ?>" ></td>
          </tr>
          <?php if ($this->_var['data']): ?>
          <tr>
            <td>留言时间：</td>
            <td><?php echo date("Y-m-d H:m",$this->_var['data']['dateline']); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td>留言内容：</td>
            <td><textarea name="content" id="content" style="width:98%; height:100px;"><?php echo $this->_var['data']['content']; ?></textarea></td>
          </tr>
           <?php if ($this->_var['data']): ?>
          <tr>
            <td>回复内容：</td>
            <td><textarea  name="reply_content" id="reply_content"  style="width:98%; height:100px;"><?php echo $this->_var['data']['reply_content']; ?></textarea></td>
          </tr>
          <?php endif; ?>
         <?php if ($this->_var['data']['reply_time']): ?>
          <tr>
            <td>回复时间：</td>
            <td><?php echo date("Y-m-d H:m",$this->_var['data']['reply_time']); ?></td>
          </tr>
          <?php endif; ?>
          <tr>
            <td></td>
            <td><input type="submit" value="保存" class="btn btn-success"></td>
          </tr>
        </table>
      </form>
  
<?php echo $this->fetch('footer.html'); ?>
</body>
</html>