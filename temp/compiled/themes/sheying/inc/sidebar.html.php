<div class="index_left fl">
    <div class="logo"><img src="<?php echo $this->_var['skins']; ?>images/logo.jpg"  /></div>
    <div class="nav">
      <ul>
        <li <?php if (get ( 'm' ) == 'index'): ?>id="nav_01"<?php endif; ?>><a href="/index.php" >网站首页</a></li>
        <li  <?php if ($this->_var['nvactive'] == 'article'): ?>id="nav_01"<?php endif; ?>><a href="/index.php?m=article&a=list&catid=7" >资讯中心</a></li>
        <li <?php if ($this->_var['nvactive'] == 'product'): ?>id="nav_01"<?php endif; ?>><a href="/index.php?m=article&a=list&catid=1" >产品展示</a></li>
        <li <?php if (get ( 'a' ) == 'aboutus'): ?>id="nav_01"<?php endif; ?>><a href="/index.php?m=html&a=aboutus" >关于我们</a></li>
        <li <?php if (get ( 'm' ) == 'guest'): ?>id="nav_01"<?php endif; ?>><a href="/index.php?m=guest">客户留言</a></li>
        <li <?php if (get ( 'a' ) == 'contact'): ?>id="nav_01"<?php endif; ?>><a href="/index.php?m=html&a=contact" >联系我们</a></li>
      </ul> 
    </div>
    <div class="tel">
      <ul>
        <li><a href="">设为首页</a></li>
        <li><a href="">加入收藏</a></li>
        <li class="tel_con">电话：400-000-0000</li>
      </ul>
    </div>
  </div>