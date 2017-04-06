<!DOCTYPE HTML>
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8,ie=7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title><?php echo e(Config::get('web.web_title')); ?></title>
    <meta name="keywords" content="<?php echo e(Config::get('web.keywords')); ?>" />
    <meta name="description" content="<?php echo e(Config::get('web.description')); ?>" />
    <link rel="stylesheet" id="open_social_css-css" href="<?php echo e(asset('home/css/blog-os.css')); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo e(asset('home/css/blog-style.css')); ?>" media="all">
    <link rel="stylesheet" href="<?php echo e(asset('home/css/jqcloud.css')); ?>" media="all">
    <link rel="stylesheet" href="<?php echo e(asset('home/css/blog-swiper.min.css')); ?>" media="all">
    <link href="<?php echo e(asset('home/css/blog-font-awesome.min.css')); ?>" rel="stylesheet" media="screen">
    <script type="text/javascript" src="<?php echo e(asset('home/js/blog-base.loading.js')); ?>"></script>  
    <?php echo $__env->yieldContent('cssjs'); ?>
</head>
  
<body class="home blog">
<div class="placeholder"></div>   
<!--[if lt IE 9]>
    <script src="<?php echo e(asset('home/js/blog-html5.js')); ?>"></script>
<![endif]-->
<script src="<?php echo e(asset('home/js/jquery-2.1.0.min.js')); ?>"></script>
<script src="<?php echo e(asset('home/js/jqcloud-1.0.4.js')); ?>"></script>
<script>
    window._deel = {
    maillist: '',
    maillistCode: '',
    commenton: 0,
    roll: [0, 0]}
</script>
<script type="text/javascript">
    $(function() {
        $(window).scroll(function() {
            $offset = $('.placeholder').offset(); //不能用自身的div，不然滚动起来会很卡
            if ($(window).scrollTop() > $offset.top) {
                $('.header').css({
                    'position': 'fixed',
                    'top': '0px',
                    'left': $offset.left + 'px',
                    'z-index': '999'
                });
            } else {
                $('.header').removeAttr('style');
                $('.container').removeAttr('style');
            }
        });
    })
</script> 
<header class="header" style="height: 52px;">
    <div class="navbar">
        <h1 class="logo"><a href="http://binblogs.cn/" title="<?php echo e(Config::get('web.web_title')); ?>" alt="<?php echo e(Config::get('web.web_title')); ?>"><?php echo e(Config::get('web.web_title')); ?></a></h1>
        <ul class="nav">
        <?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home" id="uri<?php echo e($v->nav_url); ?>">
                <a href="<?php echo e(url($v->nav_url)); ?>" title="<?php echo e($v->nav_alias); ?>"><?php echo e($v->nav_name); ?></a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="menu pull-right">
            <form name="formsearch" action="http://blog.yzmcms.com/plus/search.php" method="get">
            <input class="search-input" name="q" id="search-keyword" type="text" required="required" placeholder=" 输入你要找的内容" />
            <button type="submit" class="searchbtn" name="search" title="搜一下！">
              <i class="fa"></i>
            </button>
            </form>
        </div>
    </div>
</header> 
<script type="text/javascript" src="http://blog.yzmcms.com/templets/blog/js/swiper.min.js"></script>  
<?php echo $__env->yieldContent('content'); ?>
<footer class="footer">
    <div class="footer-inner">
        <div style="padding:0 20px;overflow:hidden;">
            <div class="copyright" style="text-align: center;">
                <?php echo Config::get('web.copyright'); ?>

            </div>
            
        </div>
    </div>
</footer>
<div id="button">
    <a href="javascript:;" rel="nofollow" class="totop" title="返回顶部"></a>
    <a href="http://binblogs.cn/" target="_blank" class="guanwang" title="返回官网"></a>
    <a href="http://blog.yzmcms.com/plus/guestbook.php"  target="_blank" class="lianxi" title="留言联系"></a>
</div>
<script type="text/javascript">
var url = location.href;
var arr = url.split('/');
var uri = arr.pop();
$('#uri'+uri).attr('class', 'current-menu-item');

$(document).ready(function() {
    $(function(){
        $(window).scroll(function(){
            if($(this).scrollTop() > 300){
                $('.totop').fadeIn();
            }else{
                $('.totop').fadeOut();
            }
        });
        $('.totop').click(function(){
            $('body,html').animate({scrollTop:0},300);
        })
    })
});
</script> 
</body>
</html> 
