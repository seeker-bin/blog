<?php $__env->startSection('content'); ?>
<section class="container">
	<div class="page_left">
		<ul>
			<li><a href="<?php echo e(url('about/me')); ?>" class="cur">关于作者</a></li>
			<li><a href="<?php echo e(url('message/me')); ?>">留言联系</a></li>
   		</ul>
	</div>
	<div class="page_right">
	   	<h1 class="page_title">关于作者</h1>   
	   	<div class="page_content">
		   <p>Just about me</p><p><img src="http://blog.yzmcms.com/uploads/20170116/14844963374269.jpg" _src="http://blog.yzmcms.com/uploads/20170116/14844963374269.jpg"/></p><p></p><p>大家好，我是袁志蒙，YzmCMS的作者。三年磨一剑，我之所以开发这个CMS，是因为我对IT互联网技术的兴趣，程序开发纯属于个人爱好兴趣，不然也不可能坚持这么多年，由于个人水平有限，程序中可能存在一些问题，欢迎大家及时反馈。</p><p><br/></p><p>我热爱编程、算法、各种与计算机相关的技术，平时不喜欢出去玩，我喜欢在我这个狭小的窝里上网、敲代码、学习、或者看看电影，然后写写博客，我没有什么伟大的梦想，只想有一个自己的房子，每天下班能回家，周末能休息一下，不会被炒鱿鱼，工资按时发，平凡的过一生就好！</p><p><br/></p><p>人的一生是在学习中度过，在追求中获得生存。学习的过程，就是探索，研究的过程，从不了解到了解，从无知到掌握，到灵活运用，在不断的学习中加深认识的过程。</p><p><br/></p><p>我的QQ：214243830</p>
	   	</div>
	</div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>