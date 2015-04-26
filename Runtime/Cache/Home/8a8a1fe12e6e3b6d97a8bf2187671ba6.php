<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<!-- head头部分开始 -->
<!-- head头部分开始 -->
<head>
	<meta charset="UTF-8">
	<title><?php echo ($category['cname']); ?>-<?php echo (C("WEB_NAME")); ?></title>
	<meta name="keywords" content="<?php echo ($category['keywords']); ?>" />
	<meta name="description" content="<?php echo ($category['description']); ?>" />
<script type="text/javascript" src="/Public/static/js/jquery-2.0.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/bootstrap-3.3.4/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/font-awesome-4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/Public/static/css/bjy.css">
<script type="text/javascript" src="/Public/static/bootstrap-3.3.4/js/bootstrap.min.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/static/js/html5shiv.min.js"></script>
<script type="text/javascript" src="/Public/static/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="/Public/static/iCheck-1.0.2/icheck.min.js"></script>
<link rel="stylesheet" href="/Public/static/iCheck-1.0.2/skins/all.css">
<script>
$(document).ready(function(){
  $('.icheck').iCheck({
    checkboxClass: "icheckbox_square-blue",
    radioClass: "iradio_square-blue",
    increaseArea: "20%"
  });
});
</script>

<link rel="stylesheet" href="/Template/default/Home/Public/css/index.css">
<script type="text/javascript" src="/Template/default/Home/Public/js/index.js"></script>
</head>
<!-- head头部分结束 -->
<!-- head头部分结束 -->
<body>
<!-- 顶部导航开始 -->
<div id="nav">
	<div class="b-inside">
		<div class="logo"><a href="<?php echo U('Home/Index/index');?>">白俊遥博客</a></div>
		<ul class="category">
			<li class="cname <?php if((!isset($_GET['cid'])) and (!isset($article['category']['cid']))): ?>action<?php endif; ?>" >
				<a href="<?php echo U('Home/Index/index');?>">首页</a>
			</li>
			<?php if(is_array($categorys)): foreach($categorys as $key=>$v): ?><li class="cname <?php if(($_GET['cid']== $v['cid']) or ($article['category']['cid'] == $v['cid'])): ?>action<?php endif; ?>">
					<a href="<?php echo U('Home/Index/category',array('cid'=>$v['cid']));?>"><?php echo ($v['cname']); ?></a>
				</li><?php endforeach; endif; ?>
		</ul>
		<ul id="login-word" class="user">
			<?php if(session('user.id')): ?><li class="user-info">
					<span><img src="<?php echo session('user.head_img') ;?>"/></span>
					<span><?php echo session('user.nickname') ;?></span>
					<span><a href="javascript:QC.Login.signOut();">退出</a></span>
				</li>
			<?php else: ?>	
				<li class="login" data-toggle="modal" data-target="#modal-login">登陆</li><?php endif; ?>
			
		</ul>
	</div>
</div>
<!-- 顶部导航结束 -->

<!-- 主体部分开始 -->
<div id="content">
	<div class="b-inside">
		<!-- 左侧列表开始 -->
		<div class="left">
			<!-- 文章列表开始 -->
						<div class="list">
				<?php if(is_array($articles)): foreach($articles as $key=>$v): ?><div class="detail">
						<h3 class="title"><a href="<?php echo U('Home/Index/article',array('aid'=>$v['aid']));?>" target="_blank"><?php echo ($v['title']); ?></a></h3>
						<ul class="metadata">
							<li class="date">发布时间：<?php echo (date('Y-m-d H:i:s',$v['addtime'])); ?></li>
							<li class="category">分类：<a href="<?php echo U('Home/Index/category',array('cid'=>$v['cid']));?>" target="_blank"><?php echo ($v['category']['cname']); ?></a>
							<?php if(!empty($v['tag'])): ?><li class="tags ">标签：
									<?php if(is_array($v['tag'])): foreach($v['tag'] as $key=>$n): ?><a href="<?php echo U('Home/Index/tag',array('tid'=>$n['tid']));?>" target="_blank"><?php echo ($n['tname']); ?></a><?php endforeach; endif; ?>
								</li><?php endif; ?>							
						</ul>
						<div class="article">
							<div class="pic">
								<a href="<?php echo U('Home/Index/article',array('aid'=>$v['aid']));?>" target="_blank"><img src="<?php echo ($v['pic_path']); ?>" alt=""></a>
							</div>
							<div class="word">
								<p class="description">
									<?php echo ($v['description']); ?>
								</p>
								<div class="readall">
									<a class="readall-a"  href="<?php echo U('Home/Index/article',array('aid'=>$v['aid']));?>" target="_blank">阅读全文</a>
								</div>
							</div>
						</div>
					</div><?php endforeach; endif; ?>
			</div>
			<!-- 文章列表结束 -->
		</div>
		<!-- 左侧列表结束 -->

		<!-- 右侧内容开始 -->
				<div class="right">
			<div class="tags">
				<h4 class="title">热门标签</h4>
				<ul class="tags-ul">
					<?php if(is_array($tags)): foreach($tags as $k=>$v): ?><li class="tname">
							<a class="tstyle-<?php echo ($k); ?>" href="<?php echo U('Home/Index/tag',array('tid'=>$v['tid']));?>" target="_blank"><?php echo ($v['tname']); ?></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<div class="link">
				<h4 class="title">友情链接</h4>
				<p class="link-p">
					<?php if(is_array($links)): foreach($links as $k=>$v): ?><a class="link-a" href="<?php echo ($v[url]); ?>" target="_blank"><?php echo ($v['lname']); ?></a><?php endforeach; endif; ?>
				</p>
			</div>
		</div>
		<!-- 右侧内容结束 -->
	</div>
</div>
<!-- 主体部分结束 -->

<!-- 通用底部文件开始 -->
<!-- 通用底部文件开始 -->
<div id="foot">
	<div class="b-inside">
		本站使用自主开发的<a href="">thinkbjy</a>开源博客程序搭建  © 2014-2015 baijunyao.com 版权所有 ICP证：豫ICP备14009546号-3
	</div>
</div>
<!-- 通用底部文件结束 -->
<!-- 通用底部文件结束 -->

<!-- 登陆框开始 -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
      </div>
      <div class="modal-body">
        <span id="qqLoginBtn"></span>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="http://qzonestyle.gtimg.cn/qzone/openapi/qc_loader.js" data-appid="101206152" charset="utf-8"></script>
<script type="text/javascript">
  userUrl='<?php echo trim(U('Home/User/index','','',true),'index') ;?>';
  isLogin='<?php echo session('user.id') ;?>';
</script>
<script type="text/javascript" src="/Template/default/Home/Public/js/oauth.js"></script>
<!-- 登陆框结束 -->
</body>
</html>