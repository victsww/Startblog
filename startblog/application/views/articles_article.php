<?php
spl_autoload_register(function($class){
  require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')).'.php';
});

# Get Markdown class
#use \Michelf\MarkdownExtra;
#require_once __DIR__ . '/Michelf/Parsedown.php';
# Read file and pass content through the Markdown parser
#$html = MarkdownExtra::defaultTransform($article[0]['content']);

$Parsedown = new Parsedown();
$html = $Parsedown->text($article[0]['content']);
date_default_timezone_set("Asia/Shanghai"); 
?>

<!-- content srart -->
<div class="am-g am-g-fixed blog-fixed blog-content">
    <div class="am-u-md-8 am-u-sm-12">
      <article class="am-article blog-article-p">
        <div class="am-article-hd">
          <h1 class="am-article-title blog-text-center"><?php echo $article[0]['title'];?></h1>
          <p class="am-article-meta blog-text-center">
              <?php $category_id = $article[0]['category'];$category_name = $all_category["$category_id"]['category'];?>
                &nbsp<?php echo anchor("Category/show/{$category_id}","$category_name","")?> &nbsp&nbsp|&nbsp&nbsp<?php echo date('Y年m月d日',strtotime($article[0]['published_at']));?>&nbsp&nbsp|&nbsp&nbsp阅读：<?php echo $article[0]['pv'];?>次
          </p>
        </div>        
        <div class="am-article-bd">
       
        <p>
        <?php echo $html; ?>
    
        </p>
        </div>
      </article>
        
        <div class="am-g blog-article-widget blog-article-margin">
          <div class="am-u-lg-4 am-u-md-5 am-u-sm-7 am-u-sm-centered blog-text-center">
            <span class="am-icon-tags"> &nbsp;</span>
            <?php if(isset($article[0]['tag'])):?>
          <?php foreach ($article[0]['tag'] as $key => $value):?>
            <?php echo anchor("/Tag/show/{$key}","$value","");?>
          <?php endforeach?>
        <?php endif?>
            <hr>
            
          </div>
        </div>
<div class="ds-thread" data-thread-key="<?php echo $article[0]['id'];?>" data-title="<?php echo $article[0]['title'];?>" data-url="<?php echo base_url("/Articles/article/{$article[0]['id']}");?>"></div>
  <!-- 多说评论框 start -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"startblog"};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] 
     || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
  </script>
<!-- 多说公共JS代码 end -->
        <hr>
    </div>
<div class="am-u-md-4 am-u-sm-12 blog-sidebar">
        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>About ME</span></h2>
            <img src="<?php echo base_url('/static/img/favicon.png')?>" alt="about me" class="blog-entry-img" >
            <p>StartBlog</p>
            <p>一款基于Codeigniter、Amazeui开发的简洁、易用、跨平台自适应的Markdown博客系统.</p>
        </div>

        <div class="blog-sidebar-widget blog-bor">
            <h2 class="blog-text-center blog-title"><span>Contact ME</span></h2>
            <p>
                <a href="tencent://message/?uin=416049355"><span class="am-icon-qq am-icon-fw am-primary blog-icon"></span></a>
                <a href="https://github.com/Cryin/"><span class="am-icon-github am-icon-fw blog-icon"></span></a>
                <a href="http://weibo.com/justear"><span class="am-icon-weibo am-icon-fw blog-icon"></span></a>
                <a href="http://www.startblog.cc/"><span class="am-icon-weixin am-icon-fw blog-icon"></span></a>
                <a href="<?php echo base_url('/feed')?>"><span class="am-icon-rss am-icon-fw blog-icon"></span></a>
            </p>
        </div>
        
    </div>
</div>  
