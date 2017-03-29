
<?php $__env->startSection('content'); ?>
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="<?php echo e(url('admin/info')); ?>">首页</a> &raquo; 系统基本信息
</div>
<!--面包屑导航 结束-->




<div class="result_wrap">
    <div class="result_title">
        <h3>系统基本信息</h3>
    </div>
    <div class="result_content">
        <ul>
            <li>
                <label>操作系统</label><span><?php echo e(PHP_OS); ?></span>
            </li>
            <li>
                <label>运行环境</label><span><?php echo e($_SERVER['SERVER_SOFTWARE']); ?></span>
            </li>
            <li>
                <label>版本</label><span>v-1.0</span>
            </li>
            <li>
                <label>上传附件限制</label><span><?php echo get_cfg_var ("upload_max_filesize") ? get_cfg_var ("upload_max_filesize"):"不允许上传附件"; ?></span>
            </li>
            <li>
                <label>北京时间</label><span><?php echo date('Y年m月d日 H时i分s秒');?></span>
            </li>
            <li>
                <label>服务器域名/IP</label><span><?php echo e($_SERVER['SERVER_NAME']); ?> [ <?php echo e($_SERVER['SERVER_ADDR']); ?> ]</span>
            </li>
            <li>
                <label>Host</label><span><?php echo e($_SERVER['SERVER_ADDR']); ?></span>
            </li>
        </ul>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>