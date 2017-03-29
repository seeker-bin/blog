<?php $__env->startSection('content'); ?>
<section class="container">
      <div class="content-wrap">
        <div class="content">
          <header class="article-header">
            <h1 class="article-title"><h1>CSS3酷狗音乐的动态效果</h1></h1>
            <div class="meta">
              <span class="muted">
                <i class="icon-user icon12"></i>
                袁志蒙</span>
              <time class="muted">
                <i class="ico icon-time icon12"></i>2016-08-13 16:15:26</time>
              <span class="muted">
                <i class="ico icon-eye-open icon12"></i><script type="text/javascript" src="/plus/count.php?action=dj&mid=42"></script>次浏览</span>
            </div>
          </header>
          <article class="article-content">
            <blockquote>
              <p> <strong>摘要：</strong>分享一例CSS3做的酷狗音乐的动态效果.</p>
			</blockquote>
            <p>分享一例CSS3做的酷狗音乐的动态效果.</p><p style="text-align:center"><img src="http://blog.yzmcms.com/uploads/20160813/14710762768438.jpg" _src="http://blog.yzmcms.com/uploads/20160813/14710762768438.jpg" alt="CSS3酷狗音乐的动态效果"/></p><p><br/></p><pre style="padding: 20px;margin: 20px auto;background-color: #f5f5f5;border-left: 3px solid #00c3b6;font-size: 12px;line-height: 1.8;font-family: &#39;Microsoft Yahei&#39;,Arial;white-space: pre-wrap;word-wrap: break-word;">&lt;!DOCTYPE html&gt;
&lt;html&gt;
	&lt;head&gt;
		&lt;meta charset=&quot;UTF-8&quot;&gt;
		&lt;title&gt;CSS3酷狗音乐的动态效果&lt;/title&gt;
		&lt;style&gt;
			*{
				margin: 0;
				padding: 0;
				box-sizing: border-box;
			}
			body{
				background: #ccc;
			}
			.box{
				margin: 150px auto;
				width: 174px;
				height: 100px;
				background: #000;
				overflow: hidden;
			}
			.box &gt; div{
				margin-right: 6px;
				width: 30px;
				height: 100px;
				background: #FF7F50;
				float: left;
				-webkit-animation-name: move;
				animation-name: move;
				-webkit-animation-iteration-count: infinite;
				animation-iteration-count: infinite;
				
				-webkit-animation-duration: .5s;
				animation-duration: .5s;
			}
			.box &gt; div:last-child{
				margin-right: 0;
			}
			.one{
				-webkit-animation-delay: .2s;
				animation-delay: .2s;
			}
			.two{
				-webkit-animation-delay: .3s;
				animation-delay: .3s;
			}
			.three{
				-webkit-animation-delay: .4s;
				animation-delay: .4s;
			}
			.four{
				-webkit-animation-delay: .5s;
				animation-delay: .5s;
			}
			.five{
				-webkit-animation-delay: .6s;
				animation-delay: .6s;
			}
			@keyframes  move{
				0{
					-webkit-transform: translateY(0);
					transform: translateY(0);
				}
				50%{
					-webkit-transform: translateY(100px);
					transform: translateY(100px);
				}
				100%{
					-webkit-transform: translateY(0);
					transform: translateY(0);
				}
			}
			@-webkit-keyframes move{
				0{
					-webkit-transform: translateY(0);
					transform: translateY(0);
				}
				50%{
					-webkit-transform: translateY(100px);
					transform: translateY(100px);
				}
				100%{
					-webkit-transform: translateY(0);
					transform: translateY(0);
				}
			}
		&lt;/style&gt;
	&lt;/head&gt;
	&lt;body&gt;
		&lt;div class=&quot;box&quot;&gt;
			&lt;div class=&quot;one&quot;&gt;&lt;/div&gt;
			&lt;div class=&quot;two&quot;&gt;&lt;/div&gt;
			&lt;div class=&quot;three&quot;&gt;&lt;/div&gt;
			&lt;div class=&quot;four&quot;&gt;&lt;/div&gt;
			&lt;div class=&quot;five&quot;&gt;&lt;/div&gt;
		&lt;/div&gt;
	&lt;/body&gt;
&lt;/html&gt;</pre>            <div class="related-post">
              <h6>随机新闻</h6>
              <dl class="fix">
                <div id='tag741ea220ff5887504d724069fe0ee1bf'>
					<dd><a href="http://blog.yzmcms.com/html/css/4.html" title="CSS3实现毛玻璃（图片模糊）效果">
                      <img src="http://blog.yzmcms.com/uploads/thumbnail/20160705172348762.png" alt="CSS3实现毛玻璃（图片模糊）效果" />
                      <span>CSS3实现毛玻璃（图片模糊）效果</span></a></dd><dd><a href="http://blog.yzmcms.com/html/css/48.html" title="CSS3文字 - 高光水波渐变特效">
                      <img src="http://blog.yzmcms.com/uploads/thumbnail/20160826095158270.jpg" alt="CSS3文字 - 高光水波渐变特效" />
                      <span>CSS3文字 - 高光水波渐变特效</span></a></dd><dd><a href="http://blog.yzmcms.com/html/css/49.html" title=" 纯CSS实现带动画的天气图标">
                      <img src="http://blog.yzmcms.com/uploads/thumbnail/20160826101012704.jpg" alt=" 纯CSS实现带动画的天气图标" />
                      <span> 纯CSS实现带动画的天气图标</span></a></dd><dd><a href="http://blog.yzmcms.com/html/css/42.html" title="CSS3酷狗音乐的动态效果">
                      <img src="http://blog.yzmcms.com/uploads/20160813/14710762768438.jpg" alt="CSS3酷狗音乐的动态效果" />
                      <span>CSS3酷狗音乐的动态效果</span></a></dd><dd><a href="http://blog.yzmcms.com/html/css/24.html" title="CSS3可调节的小风扇">
                      <img src="http://blog.yzmcms.com/uploads/thumbnail/20160720145929672.jpg" alt="CSS3可调节的小风扇" />
                      <span>CSS3可调节的小风扇</span></a></dd>                </div>
              </dl>
            </div>
            <!--related:end-->
			</article>
          <nav class="article-nav">
            <span class="article-nav-prev">上一篇：<a href="http://blog.yzmcms.com/html/css/24.html">CSS3可调节的小风扇</a></span>
            <span class="article-nav-next">下一篇：<a href="http://blog.yzmcms.com/html/css/48.html">CSS3文字 - 高光水波渐变特效</a></span>
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
				   <form action="http://blog.yzmcms.com/plus/comment.php" method="post"  onsubmit="return check_comm(this)">
				    <input type="hidden" name="articleid" value="42">
				    <input type="hidden" name="title" value="CSS3酷狗音乐的动态效果">
				    <input type="hidden" name="url" value="http://blog.yzmcms.com/html/css/42.html">
				    <input type="hidden" name="catid" value="7">
					<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
					<p><input type="submit" class="sub_btn" name="dosubmit" value="提交" style="width:100px"><span class="emotion">表情</span><span class="yzm"><img src="http://blog.yzmcms.com/plus/code.php" onclick="this.src=this.src+'?'" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span></p>
				   </form>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="comment_list">
				<div class="comment_list_top">共0条评论</div>
				<div class="comment_list_body">
				   <ul>
				     <li>这篇文章还没有收到评论，赶紧来抢沙发吧~</li>				   </ul>
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
			<li><a href="http://blog.yzmcms.com/html/css/85.html">
                <span class="thumbnail">
                  <img src="http://blog.yzmcms.com/uploads/thumbnail/20170323160259753.png" alt="13种css超炫的鼠标滑过效果" title="13种css超炫的鼠标滑过效果"/></span>
                <span class="text">13种css超炫的鼠标滑过效果</span>
                <span class="muted">2017-03-23</span>
                <span class="muted">
                  <span class="ds-thread-count" data-replace="1">59次阅读</span>
                </span>
              </a></li><li><a href="http://blog.yzmcms.com/html/css/49.html">
                <span class="thumbnail">
                  <img src="http://blog.yzmcms.com/uploads/thumbnail/20160826101012704.jpg" alt=" 纯CSS实现带动画的天气图标" title=" 纯CSS实现带动画的天气图标"/></span>
                <span class="text"> 纯CSS实现带动画的天气图标</span>
                <span class="muted">2016-08-26</span>
                <span class="muted">
                  <span class="ds-thread-count" data-replace="1">213次阅读</span>
                </span>
              </a></li><li><a href="http://blog.yzmcms.com/html/css/48.html">
                <span class="thumbnail">
                  <img src="http://blog.yzmcms.com/uploads/thumbnail/20160826095158270.jpg" alt="CSS3文字 - 高光水波渐变特效" title="CSS3文字 - 高光水波渐变特效"/></span>
                <span class="text">CSS3文字 - 高光水波渐变特效</span>
                <span class="muted">2016-08-25</span>
                <span class="muted">
                  <span class="ds-thread-count" data-replace="1">131次阅读</span>
                </span>
              </a></li><li><a href="http://blog.yzmcms.com/html/css/42.html">
                <span class="thumbnail">
                  <img src="http://blog.yzmcms.com/uploads/20160813/14710762768438.jpg" alt="CSS3酷狗音乐的动态效果" title="CSS3酷狗音乐的动态效果"/></span>
                <span class="text">CSS3酷狗音乐的动态效果</span>
                <span class="muted">2016-08-13</span>
                <span class="muted">
                  <span class="ds-thread-count" data-replace="1">69次阅读</span>
                </span>
              </a></li><li><a href="http://blog.yzmcms.com/html/css/24.html">
                <span class="thumbnail">
                  <img src="http://blog.yzmcms.com/uploads/thumbnail/20160720145929672.jpg" alt="CSS3可调节的小风扇" title="CSS3可调节的小风扇"/></span>
                <span class="text">CSS3可调节的小风扇</span>
                <span class="muted">2016-07-20</span>
                <span class="muted">
                  <span class="ds-thread-count" data-replace="1">139次阅读</span>
                </span>
              </a></li><li><a href="http://blog.yzmcms.com/html/css/4.html">
                <span class="thumbnail">
                  <img src="http://blog.yzmcms.com/uploads/thumbnail/20160705172348762.png" alt="CSS3实现毛玻璃（图片模糊）效果" title="CSS3实现毛玻璃（图片模糊）效果"/></span>
                <span class="text">CSS3实现毛玻璃（图片模糊）效果</span>
                <span class="muted">2016-07-05</span>
                <span class="muted">
                  <span class="ds-thread-count" data-replace="1">157次阅读</span>
                </span>
              </a></li>          </ul>
        </div>		
      </aside>
    </section>
<script>
$(function(){
	$('.emotion').qqFace({
		path:'/common/images/face/'	
	});
});
</script>	
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>