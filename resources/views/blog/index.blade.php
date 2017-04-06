@extends('layouts.blog')
@section('content')
    <section class="container">
    <div class="banner banner-navbar">
    	<div class="swiper-container">
        	<div class="swiper-wrapper">
        		<div class="swiper-slide"><img src="http://blog.yzmcms.com/templets/blog/images/banner_1.jpg" alt="yzmcms博客"></div>
        		<div class="swiper-slide"><img src="http://blog.yzmcms.com/templets/blog/images/banner_2.jpg" alt="yzmcms博客"></div>
        		<div class="swiper-slide"><img src="http://blog.yzmcms.com/templets/blog/images/banner_3.jpg" alt="yzmcms博客"></div>
        	</div>
        	<div class="swiper-pagination"></div>
        	<div class="swiper-button-next"></div>
        	<div class="swiper-button-prev"></div>
    	</div>
    </div>
    <script>
    	var swiper = new Swiper('.swiper-container', {
    		pagination: '.swiper-pagination',
    		nextButton: '.swiper-button-next',
    		prevButton: '.swiper-button-prev',
    		paginationClickable: true,
    		spaceBetween: 30,
    		centeredSlides: true,
    		autoplay: 5000,
    		autoplayDisableOnInteraction: false,
    		loop: true
    	});
    </script>
    <div class="content-wrap">
        <div class="content">
            <div class="sticky">
                <h2 class="title">特别推荐</h2>
                <ul>
                    @foreach($top as $k => $v)
                        <li class="item"><a href="{{url('a/'.$v->aid)}}" target="_blank">
                            <img src="{{$v->thumb}}" alt="{{$v->title}}" />
                            <h3>{{$v->title}}</h3>
                            <p class="muted">{{$v->description}}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <h2 class="title">最新发布</h2>
            @foreach($new as $k => $v)
                <article class="excerpt">
                    <div class="focus">
                        <a href="{{url('a/'.$v->aid)}}" class="thumbnail" target="_blank">
                        <img src="{{$v->thumb}}" alt="{{$v->title}}" title="{{$v->title}}"/></a>
                    </div>
                    <header>
                        <h2>
                            <a href="{{url('a/'.$v->aid)}}" title="{{$v->title}}" target="_blank">{{$v->title}}</a>
                        </h2>
                    </header>
                    <p class="note">{{$v->description}}</p>
                    <p>
                        <span class="muted"><i class="icon-user icon12"></i> {{$v->author}}</span>
                        <span class="muted"><i class="ico icon-time icon12"></i> {{date('Y-m-d', $v->add_time)}}</span>
                        <span class="muted"><i class="ico icon-eye-open icon12"></i> {{$v->view}}次浏览</span>
                    </p>
                </article>		  
          @endforeach
        </div>
    </div>

    <aside class="sidebar">
        <div class="widget">
            <h3 class="widget_tit">热门标签</h3>
            <div class="" style="width: 100%;">
                <div id="tag_list" style="width: 290px; margin: 0px auto; height: 220px;"></div>
            </div>
        </div>	  
        <div class="widget d_postlist">
            <h3 class="widget_tit">推荐文章</h3>
            <ul>
                @foreach($hot as $k => $v)
        			<li>
                        <a href="{{url('a/'.$v->aid)}}">
                            <span class="thumbnail">
                                <img src="{{$v->thumb}}" alt="{{$v->title}}" title="{{$v->title}}"/></span>
                            <span class="text">{{$v->title}}</span>
                            <span class="muted">{{date('Y-m-d', $v->add_time)}}</span>
                            <span class="muted">
                                <span class="ds-thread-count" data-replace="1">{{$v->view}}次阅读</span>
                            </span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="widget">
            <h3 class="widget_tit">最新评论</h3>
            <div class="com_list">
                <ul>
                    @foreach($comment as $v)
            			<li>
                            <span class="comment_article">
                                <a title="{{$v->title}}" href="{{url('a/'.$v->aid)}}">{{$v->title}}</a>
                            </span>
                            @if(!empty($v->repeat_name))
                                <span class="comment_comment">网友评论：
                                    <a href="javascript:void(0);" class="user_name" rel="nofollow"><strong style="color:#DE4C1C">{{$v->repeat_name}}</strong></a> 回复 
                                    <a href="javascript:void(0);" class="user_name" rel="nofollow">博客网友</a> {!! bqToimage($v->content) !!}
                                </span>
                            @else
                                <span class="comment_comment">网友评论：
                                    {!! bqToimage($v->content) !!}
                                </span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>	
		<div class="widget d_textbanner">
			<a class="style03" target="_blank" href="http://www.yzmcms.com/">
			<strong>广告位</strong>
			<h2>文字广告位</h2>
			<p>
			本套博客模板出售
			<br>
			购买模板请到 www.yzmcms.com
			<br>
			联系作者：QQ214243830
			</p>
			</a>
		</div>				
    </aside>

</section>
<div class="IndexLinkListWrap">
	<div class="moketitle" style="font-size: 15px;">友情链接</div>
	<ul class="friendlyLink">
		<a href="http://www.yzmcms.com" target="_blank">YzmCMS官网</a> <span>|</span> <a href="http://www.duoguyu.com/" target="_blank">多骨鱼</a> <span>|</span> <a href="http://lovefc.cn/" target="_blank">封尘博客</a> <span>|</span> <a href="http://www.ylsc633.com/" target="_blank">叶落山城秋</a> <span>|</span> <a href="http://www.shuchengxian.com/" target="_blank">高蒙博客</a> <span>|</span> <a href="http://www.fx99.cn/" target="_blank">飞信网</a> <span>|</span> 	  
	</ul>
</div>

<script type="text/javascript">
    var data = {!! $tags !!};

    var string_ = "";
    for (var i = 0; i < data.length; i++) {
        var string_f = data[i]['tag'];
        var string_n = data[i]['nums'];
        string_ += "{text: '" + string_f + "', weight: '" + string_n + "',html: {'class': 'span_list'}},";
    }
    var string_list = string_;
    var word_list = eval("[" + string_list + "]");
    $(function() {
        $("#tag_list").jQCloud(word_list);
    });
</script>
@endsection