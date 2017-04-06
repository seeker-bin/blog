<!DOCTYPE HTML>
<html> 
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10,IE=9,IE=8,ie=7">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title>{{Config::get('web.web_title')}}</title>
    <meta name="keywords" content="{{Config::get('web.keywords')}}" />
    <meta name="description" content="{{Config::get('web.description')}}" />
    <link rel="stylesheet" id="open_social_css-css" href="{{asset('home/css/blog-os.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('home/css/blog-style.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('home/css/jqcloud.css')}}" media="all">
    <link rel="stylesheet" href="{{asset('home/css/blog-swiper.min.css')}}" media="all">
    <link href="{{asset('home/css/blog-font-awesome.min.css')}}" rel="stylesheet" media="screen">
    <script type="text/javascript" src="{{asset('home/js/blog-base.loading.js')}}"></script>  
    @yield('cssjs')
</head>
  
<body class="home blog">
<div class="placeholder"></div>   
<!--[if lt IE 9]>
    <script src="{{asset('home/js/blog-html5.js')}}"></script>
<![endif]-->
<script src="{{asset('home/js/jquery-2.1.0.min.js')}}"></script>
<script src="{{asset('home/js/jqcloud-1.0.4.js')}}"></script>
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
        <h1 class="logo"><a href="http://binblogs.cn/" title="{{Config::get('web.web_title')}}" alt="{{Config::get('web.web_title')}}">{{Config::get('web.web_title')}}</a></h1>
        <ul class="nav">
        @foreach($navs as $v)
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-home" id="uri{{$v->nav_url}}">
                <a href="{{url($v->nav_url)}}" title="{{$v->nav_alias}}">{{$v->nav_name}}</a>
            </li>{{-- current-menu-item  --}}
        @endforeach
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
@yield('content')
<footer class="footer">
    <div class="footer-inner">
        <div style="padding:0 20px;overflow:hidden;">
            <div class="copyright" style="text-align: center;">
                {!!Config::get('web.copyright')!!}
            </div>
            {{-- <div class="trackcode pull-right"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1259844929'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1259844929' type='text/javascript'%3E%3C/script%3E"));</script>
            </div> --}}
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
