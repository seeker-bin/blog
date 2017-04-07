<?php $__env->startSection('content'); ?>
<section class="container">
	<div class="content-wrap">
        <div class="content">
      		<header class="archive-header">
            	<h1><?php echo e($cate->cate_name); ?></h1>
          	</header>
          	<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<article class="excerpt">
		            <div class="focus">
		              	<a href="<?php echo e(url('a/'.$v->aid)); ?>" class="thumbnail" target="_blank">
		                <img src="<?php echo e($v->thumb); ?>" alt="<?php echo e($v->title); ?>" title="<?php echo e($v->title); ?>" /></a>
		            </div>
		            <header>
		              	<h2><a href="<?php echo e(url('a/'.$v->aid)); ?>" target="_blank"><?php echo e($v->title); ?></a></h2>
		            </header>
		            <p class="note"><?php echo e($v->description); ?></p>
		            <p>
			              <span class="muted">
			                <i class="icon-user icon12"></i><?php echo e($v->author); ?></span>
			              <span class="muted">
			                <i class="ico icon-time icon12"></i><?php echo e(date('Y-m-d', $v->add_time)); ?></span>
			              <span class="muted"><i class="ico icon-eye-open icon12"></i><?php echo e($v->view); ?></script>次浏览</span>
		            </p>
	          	</article>	
          	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  
          	<div class="pagenavi clearfix">
            	<div class="pages">
	            	<style type="text/css">
	            		.pagination{background-color: #f1f1f1;}	
	            	</style>
            		<?php echo e($articles->links()); ?>

            	</div
          	</div>
        </div>
      </div>
      </div>
      <aside class="sidebar">
        <div class="widget d_postlist">
          	<h3 class="widget_tit">频道点击排行</h3>
          	<ul>
          		<?php $__currentLoopData = $hot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<li>
						<a href="<?php echo e(url('a/'.$v->aid)); ?>">
			                <span class="thumbnail">
			                  	<img src="<?php echo e($v->thumb); ?>" alt="<?php echo e($v->title); ?>" title="<?php echo e($v->title); ?>"/>
			                </span>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>