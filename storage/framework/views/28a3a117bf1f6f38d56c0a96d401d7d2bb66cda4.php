<?php $__env->startSection('content'); ?>
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
                    <?php $__currentLoopData = $top; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="item"><a href="<?php echo e(url('a/'.$v->aid)); ?>" target="_blank">
                            <img src="<?php echo e($v->thumb); ?>" alt="<?php echo e($v->title); ?>" />
                            <h3><?php echo e($v->title); ?></h3>
                            <p class="muted"><?php echo e($v->description); ?></p>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <h2 class="title">最新发布</h2>
            <?php $__currentLoopData = $new; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="excerpt">
                    <div class="focus">
                        <a href="<?php echo e(url('a/'.$v->aid)); ?>" class="thumbnail" target="_blank">
                        <img src="<?php echo e($v->thumb); ?>" alt="<?php echo e($v->title); ?>" title="<?php echo e($v->title); ?>"/></a>
                    </div>
                    <header>
                        <h2>
                            <a href="<?php echo e(url('a/'.$v->aid)); ?>" title="<?php echo e($v->title); ?>" target="_blank"><?php echo e($v->title); ?></a>
                        </h2>
                    </header>
                    <p class="note"><?php echo e($v->description); ?></p>
                    <p>
                        <span class="muted"><i class="icon-user icon12"></i> <?php echo e($v->author); ?></span>
                        <span class="muted"><i class="ico icon-time icon12"></i> <?php echo e(date('Y-m-d', $v->add_time)); ?></span>
                        <span class="muted"><i class="ico icon-eye-open icon12"></i> <?php echo e($v->view); ?>次浏览</span>
                    </p>
                </article>		  
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
        <div class="widget">
            <h3 class="widget_tit">最新评论</h3>
            <div class="com_list">
                <ul>
                    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            			<li>
                            <span class="comment_article">
                                <a title="<?php echo e($v->title); ?>" href="<?php echo e(url('a/'.$v->aid)); ?>"><?php echo e($v->title); ?></a>
                            </span>
                            <?php if(!empty($v->repeat_name)): ?>
                                <span class="comment_comment">网友评论：
                                    <a href="javascript:void(0);" class="user_name" rel="nofollow"><strong style="color:#DE4C1C"><?php echo e($v->repeat_name); ?></strong></a> 回复 
                                    <a href="javascript:void(0);" class="user_name" rel="nofollow">博客网友</a> <?php echo bqToimage($v->content); ?>

                                </span>
                            <?php else: ?>
                                <span class="comment_comment">网友评论：
                                    <?php echo bqToimage($v->content); ?>

                                </span>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    var data = <?php echo $tags; ?>;

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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>