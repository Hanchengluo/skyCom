<div style="height:50px;"></div>
<div  id="footer">

	<div class="footer-bar  li4">
   
    	 <?php $this->assign("nv",M("navbar")->navlist(6)); ?>
    	<?php $_from = $this->_var['nv']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
        <?php if ($this->_var['k'] < 4): ?>
    	<li>
        	<a href="<?php echo R("".$this->_var["c"]["link_url"]."");?>" class="<?php if (get ( 'm' ) == $this->_var['c']['m'] && get ( 'a' ) == $this->_var['c']['a']): ?><?php if ($this->_var['c']['aclabel']): ?><?php if (get ( $this->_var['c']['aclabel'] ) == $this->_var['c']['acvalue']): ?>active<?php endif; ?><?php else: ?>active<?php endif; ?><?php endif; ?>">
            	<img class="img" src="<?php echo images_site($this->_var['c']['logo']); ?>" width="20"><br>
                <?php echo $this->_var['c']['title']; ?>
            </a>
        </li>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
         
        <div class="clearfix"></div>
    </div>

</div>

