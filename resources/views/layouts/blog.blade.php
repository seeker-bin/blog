<!DOCTYPE HTML>
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8,ie=7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>YzmCMS官方博客_袁志蒙博客</title>
    <meta name="keywords" content="YzmCMS官方博客,yzmcms博客,袁志蒙,袁志蒙博客,袁志蒙个人博客,yzmcms模板" />
    <meta name="description" content="YzmCMS官方博客，是YzmCMS内容管理系统的官方博客，收集并分享WEB知识，记录生活的点点滴滴。" />
    <link rel="stylesheet" id="open_social_css-css" href="{{asset('css/blog-os.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('css/blog-style.css')}}" media="all">
  <link rel="stylesheet" href="{{asset('css/blog-swiper.min.css')}}" media="all">
  <link href="{{asset('css/blog-font-awesome.min.css')}}" rel="stylesheet" media="screen">
  <script type="text/javascript" src="{{asset('js/blog-base.loading.js')}}"></script>  
</head>
  
<body class="home blog">
<div class="placeholder"></div>   
<!--[if lt IE 9]>
  <script src="{{asset('js/blog-html5.js')}}"></script>
<![endif]-->
<script src="{{asset('js/blog-jquery.js')}}"></script>
<script>
  window._deel = {
  maillist: '',
  maillistCode: '',
  commenton: 0,
  roll: [0, 0]}
</script>
<script type="text/javascript">$(function() {
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
    <h1 class="logo"><a href="http://blog.yzmcms.com/" title="YzmCMS官方博客_袁志蒙博客" alt="YzmCMS官方博客_袁志蒙博客">YzmCMS官方博客_袁志蒙博客</a></h1>
  <ul class="nav">
    <li class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item menu-item-home"><a href="http://blog.yzmcms.com/">首页</a></li>
    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
    <a href="http://blog.yzmcms.com/qianduan/">前端</a><ul class="sub-menu"><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/js/">js</a></li><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/css/">css</a></li><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/htm/">html</a></li></ul></li><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
    <a href="http://blog.yzmcms.com/chengxu/">程序</a><ul class="sub-menu"><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/mysql/">mysql</a></li><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/php/">php</a></li></ul></li><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
    <a href="http://blog.yzmcms.com/shenghuo/">生活</a><ul class="sub-menu"></ul></li><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
    <a href="http://blog.yzmcms.com/yule/">娱乐</a><ul class="sub-menu"></ul></li><li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children">
    <a href="http://blog.yzmcms.com/guanyu/">关于</a><ul class="sub-menu"><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/guanyuzuozhe/">关于作者</a></li><li class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="http://blog.yzmcms.com/plus/guestbook.php">留言联系</a></li></ul></li> 
  </ul>
  <div class="menu pull-right">
    <form name="formsearch" action="http://blog.yzmcms.com/plus/search.php" method="get">
    <input class="search-input" name="q" id="search-keyword" type="text" required="required" placeholder=" 输入你要找的内容" />
    <button type="submit" class="searchbtn" name="search" title="搜一下！">
      <i class="fa"></i>
    </button>
    </form>
  </div>
</header> 
<script type="text/javascript" src="http://blog.yzmcms.com/templets/blog/js/swiper.min.js"></script>  
@yield('content')
<footer class="footer">
  <div class="footer-inner">
    <div style="padding:0 20px;overflow:hidden;">
      <div class="copyright pull-left">
        <a href="http://blog.yzmcms.com/qianduan/">前端</a> | <a href="http://blog.yzmcms.com/chengxu/">程序</a> | <a href="http://blog.yzmcms.com/shenghuo/">生活</a> | <a href="http://blog.yzmcms.com/yule/">娱乐</a> | <a href="http://blog.yzmcms.com/guanyu/">关于</a> |             <a href='http://blog.yzmcms.com/plus/guestbook.php'>留言联系</a>
        <a href="http://blog.yzmcms.com/" target="_blank">Copyright © 2017, YzmCMS All Rights Reserved. </a>| 京ICP备16034624号
      </div>
      <div class="trackcode pull-right"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259844929'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259844929' type='text/javascript'%3E%3C/script%3E"));</script>
      </div>
    </div>
  </div>
</footer>
  <div id="button">
    <a href="javascript:;" rel="nofollow" class="totop" title="返回顶部"></a>
    <a href="http://www.yzmcms.com/" target="_blank" class="guanwang" title="返回官网"></a>
    <a href="http://blog.yzmcms.com/plus/guestbook.php"  target="_blank" class="lianxi" title="留言联系"></a>
  </div>
  <script type="text/javascript">
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