@extends('layouts.blog')
@section('content')
<section class="container">
	<div class="content-wrap">
        <div class="content">
      		<header class="archive-header">
            	<h1>{{$cate->cate_name}}</h1>
          	</header>
          	@foreach($articles as $v)
				<article class="excerpt">
		            <div class="focus">
		              	<a href="{{url('a/'.$v->aid)}}" class="thumbnail" target="_blank">
		                <img src="{{$v->thumb}}" alt="{{$v->title}}" title="{{$v->title}}" /></a>
		            </div>
		            <header>
		              	<h2><a href="{{url('a/'.$v->aid)}}" target="_blank">{{$v->title}}</a></h2>
		            </header>
		            <p class="note">{{$v->description}}</p>
		            <p>
			              <span class="muted">
			                <i class="icon-user icon12"></i>{{$v->author}}</span>
			              <span class="muted">
			                <i class="ico icon-time icon12"></i>{{date('Y-m-d', $v->add_time)}}</span>
			              <span class="muted"><i class="ico icon-eye-open icon12"></i>{{$v->view}}</script>次浏览</span>
		            </p>
	          	</article>	
          	@endforeach	  
          	<div class="pagenavi clearfix">
            	<div class="pages">
	            	<style type="text/css">
	            		.pagination{background-color: #f1f1f1;}	
	            	</style>
            		{{$articles->links()}}
            	</div
          	</div>
        </div>
      </div>
      </div>
      <aside class="sidebar">
        <div class="widget d_postlist">
          	<h3 class="widget_tit">频道点击排行</h3>
          	<ul>
          		@foreach($hot as $v)
					<li>
						<a href="{{url('a/'.$v->aid)}}">
			                <span class="thumbnail">
			                  	<img src="{{$v->thumb}}" alt="{{$v->title}}" title="{{$v->title}}"/>
			                </span>
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
      </aside>﻿
	  </section>

@endsection