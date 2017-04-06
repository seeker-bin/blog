<?php $__env->startSection('cssjs'); ?>
	<script type="text/javascript" src="<?php echo e(asset('syntaxhighlighter/scripts/shCore.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('syntaxhighlighter/scripts/shBrushPhp.js')); ?>"></script>
	<script type="text/javascript" src="<?php echo e(asset('syntaxhighlighter/scripts/shBrushPython.js')); ?>"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo e(asset('syntaxhighlighter/styles/shCoreDefault.css')); ?>"/>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
	<section class="container">
      	<div class="content-wrap">
        	<div class="content">
          		<header class="article-header">
            		<h1 class="article-title"><h1><?php echo e($info->title); ?></h1></h1>
            		<div class="meta">
	              		<span class="muted"><i class="icon-user icon12"></i><?php echo e($info->author); ?></span>
	              		<time class="muted"><i class="ico icon-time icon12"></i><?php echo e(date('Y-m-d', $info->add_time)); ?></time>
	              		<span class="muted"><i class="ico icon-eye-open icon12"></i><?php echo e($info->view); ?>次浏览</span>
            		</div>
          		</header>
          		<article class="article-content">
		            <blockquote>
		              <p> <strong>摘要：</strong><?php echo e($info->description); ?></p>
					</blockquote>
					
					<?php echo $info->content; ?>


					<div class="related-post">
              			<h6>相关文章</h6>
		              	<dl class="fix">
			                <div id='tag741ea220ff5887504d724069fe0ee1bf'>
			                	<?php $__currentLoopData = $about; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<dd>
									<a href="<?php echo e(url('a/'.$v->aid)); ?>" title="<?php echo e($v->title); ?>">
			                      	<img src="<?php echo e($v->thumb); ?>" alt="<?php echo e($v->title); ?>" />
			                      	<span><?php echo e($v->title); ?></span></a>
			                    </dd>
			                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                      	</div>
		              	</dl>
       		    	</div>
				</article>
				<nav class="article-nav">
					<span class="article-nav-prev">上一篇：<a href="<?php echo e(isset($last->aid) ? url('a/'.$last->aid) : 'javascript:void;'); ?>"><?php echo e(isset($last->title) ? $last->title : '没有上一篇喽'); ?></a></span>
					<span class="article-nav-next">下一篇：<a href="<?php echo e(isset($next->aid) ? url('a/'.$next->aid) : 'javascript:void;'); ?>"><?php echo e(isset($next->title) ? $next->title : '没有下一篇喽'); ?></a></span>
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
						   	<form action="<?php echo e(url('Comment')); ?>" method="post"  onsubmit="return check_comm(this)">
						   	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						    <input type="hidden" name="aid" value="<?php echo e($info->aid); ?>">
						    <input type="hidden" name="title" value="<?php echo e($info->title); ?>">
						    <input type="hidden" name="url" value="<?php echo e(url('a/'.$info->aid)); ?>">
						    <input type="hidden" name="cate_id" value="<?php echo e($info->cate_id); ?>">
							<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
							<p>
								<input type="submit" class="sub_btn" name="dosubmit" value="提交" style="width:100px"><span class="emotion">表情</span>
								<span class="yzm">
								<img src="<?php echo e(url('code')); ?>" onclick="this.src='<?php echo e(url('code')); ?>?'+Math.random()" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span></p>
						   </form>
						</div>
						</div>
						<div class="clearfix"></div>
						<div class="comment_list">
							<div class="comment_list_top">共<?php echo e(count($Comment)); ?>条评论</div>
							<div class="comment_list_body">
							   	<ul>
							   		<?php if(count($Comment) == 0): ?>
							     		<li>这篇文章还没有收到评论，赶紧来抢沙发吧~</li>
							     	<?php else: ?>
							     		<?php $__currentLoopData = $Comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							     		<?php if($v->is_repeat == 0): ?>
								     		<li>
								     			<a class="user_pic" href="javascript:;" target="blank"><img src="/home/images/default.gif"></a>
								     			<div class="comm_right">
								     				<a class="user_name" href="javascript:;" target="blank">博客网友</a>
								     				<p><?php echo bqToimage($v->content); ?></p>
								     				<p><span class="comm_time"><?php echo e(date('Y-m-d', $v->add_time)); ?></span> <a href="javascript:toreply('<?php echo e($v->id); ?>');" class="comm_a">回复</a></p>
								     				<div id="rep_<?php echo e($v->id); ?>" class="none">
								     					<form action="<?php echo e(url('Comment')); ?>" method="post"  onsubmit="return check_rep(this)">
								     						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
														    <input type="hidden" name="aid" value="<?php echo e($info->aid); ?>">
														    <input type="hidden" name="title" value="<?php echo e($info->title); ?>">
														    <input type="hidden" name="url" value="<?php echo e(url('a/'.$info->aid)); ?>">
														    <input type="hidden" name="cate_id" value="<?php echo e($info->cate_id); ?>">
															<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
															<p>
																<input type="submit" class="sub_btn static" name="dosubmit" value="提交" style="width:100px">
																<span class="yzm yzm2">
																<img src="<?php echo e(url('code')); ?>" onclick="this.src='<?php echo e(url('code')); ?>?'+Math.random()" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span>
															</p>
								     					</form>
								     				</div>
								     			</div>
								     		</li>
										<?php else: ?>
											<li>
												<a class="{user_pic}" href="javascript:;"><img src="/home/images/default.gif"></a>
												<div class="comm_right">
							  						<a class="user_name" href="javascript:;" target="blank">博客网友</a>
								  					<p><a href="javascript:void(0);" class="user_name" rel="nofollow">博客网友</a> 回复 <a href="javascript:void(0);" class="user_name" rel="nofollow">博客网友</a> ：<?php echo bqToimage($v->content); ?></p>
								   					<p><span class="comm_time"><?php echo e(date('Y-m-d', $v->add_time)); ?></span> <a href="javascript:toreply('<?php echo e($v->id); ?>');" class="comm_a">回复</a></p>
								   
													<div id="rep_<?php echo e($v->id); ?>" class="none">
													  	<form action="<?php echo e(url('Comment')); ?>" method="post"  onsubmit="return check_comm(this)">
													   	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
													    <input type="hidden" name="aid" value="<?php echo e($info->aid); ?>">
													    <input type="hidden" name="title" value="<?php echo e($info->title); ?>">
													    <input type="hidden" name="url" value="<?php echo e(url('a/'.$info->aid)); ?>">
													    <input type="hidden" name="cate_id" value="<?php echo e($info->cate_id); ?>">
														<textarea class="textarea" id="content" name="content" placeholder="让评论变得如此简单~"></textarea>
														<p>
															<input type="submit" class="sub_btn static" name="dosubmit" value="提交" style="width:100px">
															<span class="yzm yzm2">
															<img src="<?php echo e(url('code')); ?>" onclick="this.src='<?php echo e(url('code')); ?>?'+Math.random()" class="codeimg" title="看不清，换一张"><input type="text" name="code" required="required"></span></p>
													   </form>
													</div>
												</div>
											</li>
										<?php endif; ?>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>			   
							     	<?php endif; ?>
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
          			<?php $__currentLoopData = $hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<a href="<?php echo e(url('a/'.$v->aid)); ?>">
			                <span class="thumbnail">
			                  <img src="<?php echo e($v->thumb); ?>" alt="<?php echo e($v->title); ?>" title="<?php echo e($v->title); ?>"/></span>
			                <span class="text"><?php echo e($v->title); ?></span>
			                <span class="muted"><?php echo e(date('Y-m-d', $v->add_time)); ?></span>
			                <span class="muted">
			                  <span class="ds-thread-count" data-replace="1"><?php echo e($v->view); ?>次阅读</span>
			                </span>
		              	</a>
	              	</li>
	              	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>