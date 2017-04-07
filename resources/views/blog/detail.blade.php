@extends('layouts.blog')
@section('cssjs')
	<script type="text/javascript" src="{{asset('syntaxhighlighter/scripts/shCore.js')}}"></script>
	<script type="text/javascript" src="{{asset('syntaxhighlighter/scripts/shBrushPhp.js')}}"></script>
	<script type="text/javascript" src="{{asset('syntaxhighlighter/scripts/shBrushPython.js')}}"></script>
	<link type="text/css" rel="stylesheet" href="{{asset('syntaxhighlighter/styles/shCoreDefault.css')}}"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
@endsection
@section('content')
	<section class="container">
      	<div class="content-wrap">
        	<div class="content">
          		<header class="article-header">
            		<h1 class="article-title"><h1>{{$info->title}}</h1></h1>
            		<div class="meta">
	              		<span class="muted"><i class="icon-user icon12"></i>{{$info->author}}</span>
	              		<time class="muted"><i class="ico icon-time icon12"></i>{{date('Y-m-d', $info->add_time)}}</time>
	              		<span class="muted"><i class="ico icon-eye-open icon12"></i>{{$info->view}}次浏览</span>
            		</div>
          		</header>
          		<article class="article-content">
		            <blockquote>
		              <p> <strong>摘要：</strong>{{$info->description}}</p>
					</blockquote>
					{{-- 正文 --}}
					{!! $info->content !!}

					<div class="related-post">
              			<h6>相关文章</h6>
		              	<dl class="fix">
			                <div id='tag741ea220ff5887504d724069fe0ee1bf'>
			                	@foreach($about as $k => $v)
								<dd>
									<a href="{{url('a/'.$v->aid)}}" title="{{$v->title}}">
			                      	<img src="{{$v->thumb}}" alt="{{$v->title}}" />
			                      	<span>{{$v->title}}</span></a>
			                    </dd>
			                    @endforeach
	                      	</div>
		              	</dl>
       		    	</div>
				</article>
				<nav class="article-nav">
					<span class="article-nav-prev">上一篇：<a href="{{ isset($last->aid) ? url('a/'.$last->aid) : 'javascript:void;'}}">{{$last->title or '没有上一篇喽'}}</a></span>
					<span class="article-nav-next">下一篇：<a href="{{ isset($next->aid) ? url('a/'.$next->aid) : 'javascript:void;'}}">{{$next->title or '没有下一篇喽'}}</a></span>
				</nav>
          		<!--comment-->     
		  		<div id="tabs1" class="tab">
					<div class="tab-menu clearfix">
						<a class="current" href="javascript:void(0)">文章评论</a>
					</div>
				   	<script type="text/javascript" src="http://blog.yzmcms.com/templets/blog/js/jquery.qqFace.js"></script>
				   	<script type="text/javascript" src="http://blog.yzmcms.com/templets/blog/js/js.js"></script>
		           	<div class="comment_box">
						<div class="comment">
						<div class="com_form">
						   	<form action="{{url('Comment')}}" method="post"  onsubmit="return check_comm(this)">
						   	<input type="hidden" name="_token" value="{{csrf_token()}}">
						    <input type="hidden" name="aid" value="{{$info->aid}}">
						    <input type="hidden" name="title" value="{{$info->title}}">
						    <input type="hidden" name="url" value="{{url('a/'.$info->aid)}}">
						    <input type="hidden" name="cate_id" value="{{$info->cate_id}}">
							<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
							<p>
								<input type="submit" class="sub_btn" name="dosubmit" value="提交" style="width:100px"><span class="emotion">表情</span>
								<span class="yzm">
								<img src="{{url('code/ccode')}}" onclick="this.src='{{url('code/ccode')}}?'+Math.random()" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span></p>
						   </form>
						</div>
						</div>
						<div class="clearfix"></div>
						<div class="comment_list">
							<div class="comment_list_top">共{{count($Comment)}}条评论</div>
							<div class="comment_list_body">
							   	<ul>
							   		@if(count($Comment) == 0)
							     		<li>这篇文章还没有收到评论，赶紧来抢沙发吧~</li>
							     	@else
							     		@foreach($Comment as $k => $v)
							     		@if($v->is_repeat == 0)
								     		<li>
								     			<a class="user_pic" href="javascript:;" target="blank"><img src="/home/images/default.gif"></a>
								     			<div class="comm_right">
								     				<a class="user_name" href="javascript:;" target="blank">博客网友</a>
								     				<p>{!! bqToimage($v->content) !!}</p>
								     				<p><span class="comm_time">{{date('Y-m-d', $v->add_time)}}</span> <a href="javascript:toreply('{{$v->id}}');" class="comm_a">回复</a></p>
								     				<div id="rep_{{$v->id}}" class="none">
								     					<form action="{{url('Comment')}}" method="post"  onsubmit="return check_rep(this)">
								     						<input type="hidden" name="_token" value="{{csrf_token()}}">
														    <input type="hidden" name="aid" value="{{$info->aid}}">
														    <input type="hidden" name="title" value="{{$info->title}}">
														    <input type="hidden" name="url" value="{{url('a/'.$info->aid)}}">
														    <input type="hidden" name="cate_id" value="{{$info->cate_id}}">
															<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
															<p>
																<input type="submit" class="sub_btn static" name="dosubmit" value="提交" style="width:100px">
																<span class="yzm yzm2">
																<img src="{{url('code/ccode')}}" onclick="this.src='{{url('code/ccode')}}?'+Math.random()" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span>
															</p>
								     					</form>
								     				</div>
								     			</div>
								     		</li>
										@else
											<li>
												<a class="{user_pic}" href="javascript:;"><img src="/home/images/default.gif"></a>
												<div class="comm_right">
							  						<a class="user_name" href="javascript:;" target="blank">博客网友</a>
								  					<p><a href="javascript:void(0);" class="user_name" rel="nofollow">博客网友</a> 回复 <a href="javascript:void(0);" class="user_name" rel="nofollow">博客网友</a> ：{!! bqToimage($v->content) !!}</p>
								   					<p><span class="comm_time">{{date('Y-m-d', $v->add_time)}}</span> <a href="javascript:toreply('{{$v->id}}');" class="comm_a">回复</a></p>
								   
													<div id="rep_{{$v->id}}" class="none">
													  	<form action="{{url('Comment')}}" method="post"  onsubmit="return check_comm(this)">
													   	<input type="hidden" name="_token" value="{{csrf_token()}}">
													    <input type="hidden" name="aid" value="{{$info->aid}}">
													    <input type="hidden" name="title" value="{{$info->title}}">
													    <input type="hidden" name="url" value="{{url('a/'.$info->aid)}}">
													    <input type="hidden" name="cate_id" value="{{$info->cate_id}}">
														<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
														<p>
															<input type="submit" class="sub_btn static" name="dosubmit" value="提交" style="width:100px">
															<span class="yzm yzm2">
															<img src="{{url('code/ccode')}}" onclick="this.src='{{url('code/ccode')}}?'+Math.random()" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span></p>
													   </form>
													</div>
												</div>
											</li>
										@endif
										@endforeach			   
							     	@endif
						     	</ul>
							</div>
						</div>		   
			   		</div>
	          	</div>			
		  		<!--comment:end-->
      		</div>
      	</div>
      	<aside class="sidebar">
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
      </aside>
    </section>
<script>
$(function(){
	$('.emotion').qqFace({
		path:'/home/images/face/'	
	});
});
</script>	
   
@endsection