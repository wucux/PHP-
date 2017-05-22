<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo (WEBNAME); ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="<?php echo (HOME_PUBLIC_PATH); ?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (HOME_PUBLIC_PATH); ?>css/nprogress.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (HOME_PUBLIC_PATH); ?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo (HOME_PUBLIC_PATH); ?>css/font-awesome.min.css">
    <link rel="apple-touch-icon-precomposed" href="<?php echo (HOME_PUBLIC_PATH); ?>images/icon.png">
    <link rel="shortcut icon" href="<?php echo (HOME_PUBLIC_PATH); ?>images/favicon.ico">
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/nprogress.js"></script>
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/jquery.lazyload.min.js"></script>
    <!--[if gte IE 9]>
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/jquery-1.11.1.min.js" type="text/javascript"></script>
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/html5shiv.min.js" type="text/javascript"></script>
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/respond.min.js" type="text/javascript"></script>
    <script src="<?php echo (HOME_PUBLIC_PATH); ?>js/selectivizr-min.js" type="text/javascript"></script>
    <![endif]-->
    <!--[if lt IE 9]>
    <script>window.location.href='upgrade-browser.html';</script>
    <![endif]-->
</head>
<body class="user-select">
<header class="header">
    <nav class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="header-topbar hidden-xs link-border">
                <ul class="site-nav topmenu">
                    <li><a href="<?php echo (HOME_VIEW_PATH); ?>rss.xml" title="RSS订阅" >
                        <i class="fa fa-rss">
                        </i> RSS订阅
                    </a></li>
                </ul>
                勤记录 懂分享</div>
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar" aria-expanded="false"> <span class="sr-only"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <h1 class="logo hvr-bounce-in"><a href="/index.php/Home/Index/index" title="wucux博客"><img src="<?php echo (HOME_PUBLIC_PATH); ?>images/logo.png" alt="wucux博客"></a></h1>
            </div>
            <div class="collapse navbar-collapse" id="header-navbar">
                <form class="navbar-form visible-xs" action="/Search" method="post">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="请输入关键字" maxlength="20" autocomplete="off">
                        <span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
                </form>
                <ul class="nav navbar-nav navbar-right">
                    <li><a data-cont="wucux博客" title="wucux博客" href="/index.php">首页</a></li>
                    <?php if(is_array($info4)): $i = 0; $__LIST__ = $info4;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v4): $mod = ($i % 2 );++$i;?><li><a data-cont="<?php echo ($v4['category_name']); ?>" title="<?php echo ($v4['category_name']); ?>" href="/index.php/Home/Index/showlist?id=<?php echo ($v4['category_id']); ?>"><?php echo ($v4['category_name']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>
<section class="container">
<div class="content-wrap">
<div class="content">
  <div class="title">
	<h3 style="line-height: 1.3"><?php echo ($zhuti); ?></h3>
  </div>
	<?php if(is_array($info5)): $i = 0; $__LIST__ = $info5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><article class="excerpt excerpt-1" style="">
		<a class="focus" href="#" title="<?php echo ($v['chapter_title']); ?>" target="_blank" ><img class="thumb" data-original="<?php echo (HOME_PUBLIC_PATH); ?>images/textimg.jpg" src="<?php echo (HOME_PUBLIC_PATH); ?>images/visiterimg.jpg" alt="欢迎使用wucux建站程序"  style="display: inline;"></a>
		<header><a class="cat" href="#" title="<?php echo ($zhuti); ?>" ><?php echo ($zhuti); ?><i></i></a>
			<h2><a href="/index.php/Home/Index/reading?id=<?php echo ($v['chapter_id']); ?>" title="<?php echo ($v['chapter_title']); ?>" target="_blank" ><?php echo ($v['chapter_title']); ?></a>
			</h2>
		</header>
		<p class="meta">
			<time class="time"><i class="glyphicon glyphicon-time"></i> <?php echo ($v['chapter_time']); ?></time>
			<span class="views"><i class="glyphicon glyphicon-eye-open"></i> <?php echo ($v['chapter_visit']); ?></span> <a class="comment" href="##comment" title="评论" target="_blank" ><i class="glyphicon glyphicon-comment"></i> 4</a>
		</p>
		<p class="note"><?php echo ($v['chapter_intro']); ?></p>
		<p style="margin: 10px;" class="note">作者：<strong><?php echo ($v['chapter_writer']); ?></strong> 所属分类：<strong><?php echo ($zhuti); ?></strong></p>
	</article><?php endforeach; endif; else: echo "" ;endif; ?>
	<div  style="margin:10px;float:right;"><?php echo ($pagelist2); ?></div>
</div>
</div>
<aside class="sidebar">
<div class="fixed">
  <div class="widget widget_search">
	<form class="navbar-form" action="/Search" method="post">
	  <div class="input-group">
		<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
		<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
	</form>
  </div>
  <div class="widget widget_sentence">
	<h3>文章分类</h3>
	<div class="widget-sentence-content">
		<?php if(is_array($info6)): $i = 0; $__LIST__ = $info6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><ul class="plinks ptags">
				<li><a href="/index.php/Home/Index/showlist?id=<?php echo ($v['category_id']); ?>" title="<?php echo ($v['category_name']); ?>" draggable="false"><?php echo ($v['category_name']); ?></a></li>
			</ul><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
  </div>
</div>
<div class="widget widget_hot">
	  <h3>最新评论</h3>
	<?php if(is_array($info3)): $i = 0; $__LIST__ = $info3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v3): $mod = ($i % 2 );++$i;?><ul>
			<li>
				<a title="<?php echo ($v3['chapter_title']); ?>" href="/index.php/Home/Index/reading?id=<?php echo ($v3['chapter_id']); ?>" ><span class="thumbnail">
                    <img class="thumb" data-original="<?php echo (HOME_PUBLIC_PATH); ?>images/visiterimg.jpg" src="<?php echo (HOME_PUBLIC_PATH); ?>images/visiterimg.jpg" alt="<?php echo ($v3['visitmsg_from']); ?>"  style="display: block;"></span>
					<span class="text"><?php echo ($v3['visitmsg_text']); ?></span>
					<span class="muted"><i class="glyphicon glyphicon-time"></i><?php echo ($v3['visitmsg_time']); ?></span><br/>
					<span class="muted"><i class="glyphicon glyphicon-eye-open"></i><?php echo ($v3['visitmsg_user']); ?></span>
				</a>
			</li>
		</ul><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
	<div class="widget widget_sentence">
		<a href="#" target="_blank" rel="nofollow" title="这里是广告位" >
			<img style="width: 100%" src="<?php echo (HOME_PUBLIC_PATH); ?>images/ad1.jpg" alt="这里是广告位" ></a>
	</div>
	<div class="widget widget_sentence">
		<a href="#" target="_blank" rel="nofollow" title="这里也是广告" >
			<img style="width: 100%" src="<?php echo (HOME_PUBLIC_PATH); ?>images/ad.jpg" alt="这里也是广告位" ></a>
	</div>
</aside>
</section>

<footer class="footer">
    <div class="container">
        <p>Copyright &copy; 2017.WUCUX All rights reserved.POWER BY <a target="_blank" href="http://www.wucux.com/">WUCUX</a></p>
    </div>
    <div id="gotop"><a class="gotop"></a></div>
</footer>
<script src="<?php echo (HOME_PUBLIC_PATH); ?>js/bootstrap.min.js"></script>
<script src="<?php echo (HOME_PUBLIC_PATH); ?>js/jquery.ias.js"></script>
<script src="<?php echo (HOME_PUBLIC_PATH); ?>js/scripts.js"></script>
</body>
</html>