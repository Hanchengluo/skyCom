<!DOCTYPE html>
<html>
<?php echo $this->fetch('head.html'); ?>

<body>

 <div class="header">
     
    <div class="title">首页</div>
    
  </div>
  <link href="/plugin/flexslider/flexslider.css" rel="stylesheet">
<div class="main-body">
  
   <div class="row">
        	 
            	 <section class="slider" >
        <div class="flexslider ">
          <ul class="slides">
          <?php $this->assign("t_c",M("ad")->listbyno("index_flash",4)); ?>
               <?php $_from = $this->_var['t_c']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');$this->_foreach['t1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['t1']['total'] > 0):
    foreach ($_from AS $this->_var['c']):
        $this->_foreach['t1']['iteration']++;
?>
              <li><a href="<?php echo $this->_var['c']['link1']; ?>"  ><img src="<?php echo IMAGES_SITE($this->_var['c']['imgurl']); ?>" alt="<?php echo $this->_var['c']['title']; ?>" /></a></li>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          </ul>
        </div>
      </section>

        </div>
 
 <?php $this->assign("nv",M("navbar")->navlist(5)); ?>
 <div class="ind_subnav">
 	<ul class="list">
    <?php $_from = $this->_var['nv']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
    	<li>
        	<a href="<?php echo R("".$this->_var["c"]["link_url"]."");?>"><img class="img" src="<?php echo images_site($this->_var['c']['logo']); ?>"><br>
            <?php echo $this->_var['c']['title']; ?></a>
        </li>   
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>     
     </ul>
 </div>    
    
 
 
 
  
    <div class="tabs-item active" id="article">
    	<?php $this->assign("tc",M("article")->onList(0,50)); ?>
             <div class="data-list"> 
             <?php $_from = $this->_var['tc']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
            <?php echo $this->fetch('li_item.html'); ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
            </div>
    </div>
    
     
 
   
</div>
<?php echo $this->fetch('footer.html'); ?>
<script src="/plugin/flexslider/jquery.flexslider-min.js"></script>
 <script>
 $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: "100%",
        itemMargin: 5,
        pausePlay: true,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
 
 </script>
</body>
</html>
