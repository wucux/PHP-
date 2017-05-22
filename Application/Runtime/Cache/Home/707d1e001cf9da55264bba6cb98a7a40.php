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
  <header class="article-header">
	<h1 class="article-title"><a href="#" title="<?php echo ($chapter_title); ?>" ><?php echo ($chapter_title); ?></a></h1>
	<div class="article-meta"> <span class="item article-meta-time">
	  <time class="time" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="发表时间:<?php echo ($chapter_time); ?>"><i class="glyphicon glyphicon-time"></i><?php echo ($chapter_time); ?></time>
	  </span> <span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="来源：<?php echo (WEBNAME); ?>"><i class="glyphicon glyphicon-globe"></i> <?php echo (WEBNAME); ?></span><span class="item article-meta-source" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="作者：<?php echo ($chapter_writer); ?>"><i class="glyphicon glyphicon-globe"></i> <?php echo ($chapter_writer); ?></span> <span class="item article-meta-category" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="<?php echo ($chapter_category); ?>"><i class="glyphicon glyphicon-list"></i> <a href="#" title="<?php echo ($chapter_category); ?>" ><?php echo ($chapter_category); ?></a></span> <span class="item article-meta-views" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="浏览量：<?php echo ($chapter_visit); ?>"><i class="glyphicon glyphicon-eye-open"></i> <?php echo ($chapter_visit); ?></span> <span class="item article-meta-comment" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="评论量"><i class="glyphicon glyphicon-comment"></i><?php echo ($chapter_visitmsg); ?></span> </div>
  </header>
  <article class="article-content">
	  <?php echo ($chapter_text); ?>
  </article>
  <div class="article-tags">标签：<a href="" rel="tag" ><?php echo ($chapter_key); ?></a>
	</div>
  <div class="relates">
	<div class="title">
	  <h3>相关推荐</h3>
	</div>
	<ul>
		<?php if(is_array($info6)): $i = 0; $__LIST__ = $info6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><li><a href="/index.php/Home/Index/reading?id=<?php echo ($v['chapter_id']); ?>" title="" ><?php echo ($v['chapter_title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
  </div>
  <div class="title" id="comment">
	<h3>评论</h3>
  </div>
  <div id="respond">
		<form id="comment-form" name="comment-form" action="" method="POST">
			<div class="comment">
				<input name="" id="" class="form-control" size="22" placeholder="您的昵称（必填）" maxlength="15" autocomplete="off" tabindex="1" type="text">
				<input name="" id="" class="form-control" size="22" placeholder="您的网址或邮箱（非必填）" maxlength="58" autocomplete="off" tabindex="2" type="text">
				<div class="comment-box">
					<textarea placeholder="您的评论或留言（必填）" name="comment-textarea" id="comment-textarea" cols="100%" rows="3" tabindex="3"></textarea>
					<div class="comment-ctrl">
						<div class="comment-prompt" style="display: none;"> <i class="fa fa-spin fa-circle-o-notch"></i> <span class="comment-prompt-text">评论正在提交中...请稍后</span> </div>
						<div class="comment-success" style="display: none;"> <i class="fa fa-check"></i> <span class="comment-prompt-text">评论提交成功...</span> </div>
						<button type="submit" name="comment-submit" id="comment-submit" tabindex="4">评论</button>
					</div>
				</div>
			</div>
		</form>

	</div>
  <div id="postcomments">
	<ol id="comment_list" class="commentlist">
	<li class="comment-content"><span class="comment-f">#2</span><div class="comment-main"><p><a class="address" href="#" rel="nofollow" target="_blank">木庄网络博客</a><span class="time">(2016/10/28 11:41:03)</span><br>不错的网站主题，看着相当舒服</p></div></li>
	<li class="comment-content"><span class="comment-f">#1</span><div class="comment-main"><p><a class="address" href="#" rel="nofollow" target="_blank">木庄网络博客</a><span class="time">(2016/10/14 21:02:39)</span><br>博客做得好漂亮哦！</p></div></li></ol>
  </div>
</div>
</div>
	<aside class="sidebar">
		<div class="fixed">
			<div class="widget widget-tabs">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#notice" aria-controls="notice" role="tab" data-toggle="tab" >统计信息</a></li>
					<li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab" >联系站长</a></li>
					<li role="presentation"><a href="/index.php<?php echo ($__MODE__); ?>/Admin/manager/login" target="_blank" >管理员登陆</a></li>
				</ul>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane contact active" id="notice">
						<h2>日志总数:
							<?php echo ($total); ?>篇
						</h2>
						<h2>欢迎访问本站</h2>
						<!--<h2>访客总数:-->
						<!--<span id="sitetime">88条 </span></h2>-->
					</div>
					<div role="tabpanel" class="tab-pane contact" id="contact">
						<h2>QQ:
							<a href="" target="_blank" rel="nofollow" data-toggle="tooltip" data-placement="bottom" title=""  data-original-title="未知">*********</a>
						</h2>
						<h2>Email:
							<a href="mailto:mail@wucux.com?subject=Hello" target="_blank" data-toggle="tooltip" rel="nofollow" data-placement="bottom" title="mail@wucux.com"  data-original-title="#">mail@wucux.com</a></h2>
					</div>
				</div>
			</div>
			<div class="widget widget_search">
				<form class="navbar-form" action="/Search" method="post">
					<div class="input-group">
						<input type="text" name="keyword" class="form-control" size="35" placeholder="请输入关键字" maxlength="15" autocomplete="off">
						<span class="input-group-btn">
		<button class="btn btn-default btn-search" name="search" type="submit">搜索</button>
		</span> </div>
				</form>
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
		<div class="widget widget_sentence">
			<h3>友情链接</h3>
			<div class="widget-sentence-link">
				<a href="http://www.wucux.com/" title="wucux主站" target="_blank" >wucux主站</a>&nbsp;&nbsp;&nbsp;
			</div>
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