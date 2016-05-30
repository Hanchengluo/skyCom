 <?php $this->assign("banner",M("ad")->listbyno("index_flash",1)); ?>
    <div class="banner_n"><img src="<?php echo images_site($this->_var['banner']['0']['imgurl']); ?>" /></div>