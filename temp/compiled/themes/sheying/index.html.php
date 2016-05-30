<!DOCTYPE >
<html>
<?php echo $this->fetch('head.html'); ?>
<body>
<div class="wrap clearfix">
<!-- left nav start -->
  <?php echo $this->fetch('inc/sidebar.html'); ?>
<!-- left nav end-->
  <div class="index_right fr">
  <?php $this->assign("banner",M("ad")->listbyno("index_flash",1)); ?>
    <div class="banner"><img src="<?php echo images_site($this->_var['banner']['0']['imgurl']); ?>" /></div>
    <div class="main">
    
    <!--服务项目 start-->
     <div class="index_obj">
       <div class="title">服务项目 / Service Project</div>
       <div class="index_obj_img clearfix">
       	<?php $this->assign("procats",M("category")->children(SKINS_PROCAT)); ?>
         <ul>
         	<?php $_from = $this->_var['procats']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
            <?php if ($this->_var['k'] < 3): ?>
           <li class="<?php if ($this->_var['k'] == 2): ?>no_mar<?php endif; ?>"><img src="<?php echo images_site($this->_var['c']['logo']); ?>"  height="200"/><a href="/index.php?m=article&a=list&catid=<?php echo $this->_var['c']['catid']; ?>"><span><?php echo $this->_var['c']['cname']; ?></span></a></li>
           <?php endif; ?>
           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
           
         </ul>
       </div>
     </div>
    <!--服务项目 end-->
    
    <!--关于我们 start-->
    <div class="index_about">
      <div class="title">关于我们 / About Us</div>
      <div class="index_about_con">
      <?php $this->assign("about",M("html")->getword('关于我们')); ?>
        <?php echo $this->_var['about']['info']; ?>
      </div>
    </div>
    <!--关于我们 end-->
    
    
    <!--产品展示 start-->
    <div class="index_show">
      <div class="title">作品展示 / Work Display</div>
      
      <div class="projects-holder clearfix">
         <?php $this->assign("pics",M("article")->recommendList(SKINS_PROCAT,6)); ?>
         <?php $_from = $this->_var['pics']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
          <div class="col-md-4 col-sm-6 fl">
              <div class="project-item">
                  <img src="<?php echo images_site($this->_var['c']['imgurl']); ?>"  height="218">
                  <div class="project-hover">
                      <div class="inside">
                          <h5><a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>"><?php echo $this->_var['c']['title']; ?></a></h5>
                          <p><?php echo $this->_var['c']['description']; ?></p>
                      </div>
                  </div>
              </div>
          </div>
          <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
          
      </div>
      
    </div>
    <!--产品展示 end-->
     
    <!--资讯中心 start-->
    <div class="index_news">
      <div class="title">资讯中心  / Information Center</div>
      <ul>
      	<?php $this->assign("arts",M("article")->recommendList(SKINS_ATRCAT,8)); ?>
        
        <li class="clearfix mar_b">
          <div class="index_news_img fl"><img src="<?php echo images_site($this->_var['arts']['0']['imgurl']); ?>.small.jpg"  height="270"/></div>
          <div class="index_news_list fr">
            <h4><?php echo $this->_var['arts']['0']['title']; ?></h4>
            <div class="news_desc"><?php echo $this->_var['arts']['0']['description']; ?></div>
            <ul>
            <?php $_from = $this->_var['arts']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
            	<?php if ($this->_var['k'] > 0 && $this->_var['k'] < 4): ?>
              <li><a href="/index.php?m=article&a=show&id=<?php echo $this->_var['c']['id']; ?>"><?php echo $this->_var['c']['title']; ?></a></li>
              
              <?php endif; ?>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
        </li>
       
        
        <li class="clearfix mar_b">
          <div class="index_news_list fl">
            <h4><?php echo $this->_var['arts']['4']['title']; ?></h4>
            <div class="news_desc"><?php echo $this->_var['arts']['4']['description']; ?></div>
            <ul>
              <?php $_from = $this->_var['arts']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('k', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['k'] => $this->_var['c']):
?>
            	<?php if ($this->_var['k'] > 4 && $this->_var['k'] < 8): ?>
              <li><a href=""><?php echo $this->_var['c']['title']; ?></a></li>
              
              <?php endif; ?>
               <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
          </div>
          
          <div class="index_news_img fr"><img src="<?php echo $this->_var['skins']; ?>images/showpic05.jpg"  height="270"/></div>
        </li>
        
        
      </ul>
    </div>
    <!--资讯中心 end-->
    
    <!--footer start-->
    <div class="link">
      友情链接： 
      <?php $this->assign("links",M("link")->select(array("limit"=>5,"order"=>"orderindex"))); ?>
      <?php $_from = $this->_var['links']; if (!is_array($_from) && !is_object($_from)) { $_from=array();}; $this->push_vars('', 'c');if (count($_from)):
    foreach ($_from AS $this->_var['c']):
?>
      <a href="<?php echo $this->_var['c']['link_url']; ?>" target="_blank"><?php echo $this->_var['c']['title']; ?></a>
      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </div>
    <?php echo $this->fetch('footer.html'); ?>
    <!--footer end-->
  </div>  

</div>  
  
</div>
</body>
</html>
