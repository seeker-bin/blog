<?php $__env->startSection('content'); ?>
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="<?php echo e(url('admin/info')); ?>">首页</a> &raquo; <a href="<?php echo e(url('admin/article')); ?>">文章管理</a> &raquo; 添加文章</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <?php if(count($errors)>0): ?>
            <div class="mark">
                <?php if(is_object($errors)): ?>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <p><?php echo e($errors); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="result_content">
        <div class="short_wrap">
            <a href="<?php echo e(url('admin/article/create')); ?>"><i class="fa fa-plus"></i>添加文章</a>
            <a href="<?php echo e(url('admin/article')); ?>"><i class="fa fa-recycle"></i>全部文章</a>
        </div>
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="<?php echo e(url('admin/article')); ?>" method="post">
        <?php echo e(csrf_field()); ?>

        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>文章分类：</th>
                <td>
                    <select name="cate_id">
                        <option value="">--选择分类--</option>
                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($d->cate_id); ?>"><?php echo e($d->_cate_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>文章标题：</th>
                <td>
                    <input type="text" class="lg" name="title">
                </td>
            </tr>
            <tr>
                <th>作者：</th>
                <td>
                    <input type="text" class="md" name="author">
                </td>
            </tr>
            <tr>
                <th>缩略图：</th>
                <td>
                    <input type="text" size="50" name="thumb">

                    <style>
                        .uploadify{display:inline-block;}
                        .uploadify-button{border:none; border-radius:5px; margin-top:8px;}
                        table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
                    </style>

                    <input id="file_upload" name="file_upload" type="file" multiple="true">
                    <script src="<?php echo e(asset('org/uploadify/jquery.uploadify.min.js')); ?>" type="text/javascript"></script>
                    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('org/uploadify/uploadify.css')); ?>">
                    <script type="text/javascript">
                        <?php $timestamp = time();?>
                        $(function() {
                            $('#file_upload').uploadify({
                                'buttonText': '图片上传',
                                'formData'     : {
                                    'timestamp' : '<?php echo $timestamp;?>',
                                    '_token'     : "<?php echo e(csrf_token()); ?>"
                                },
                                'swf'      : "<?php echo e(asset('org/uploadify/uploadify.swf')); ?>",
                                'uploader' : "<?php echo e(url('admin/upload')); ?>",
                                'onUploadSuccess': function(file, data, response){
                                    $('input[name=thumb]').val(data);
                                    $('#thumb_img').attr('src', '/'+data);
                                }
                            });
                        });
                    </script>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <img src="" alt="" id="thumb_img" style="max-width: 350px;max-height: 150px;">
                </td>
            </tr>
            <tr>
                <th>关键词：</th>
                <td>
                    <input type="text" class="lg" name="tag">
                </td>
            </tr>
            <tr>
                <th>描述：</th>
                <td>
                    <textarea name="description"></textarea>
                </td>
            </tr>
            <tr>
                <th>文章内容：</th>
                <td>
                    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('org/ueditor/ueditor.config.js')); ?>"></script>
                    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('org/ueditor/ueditor.all.min.js')); ?>"> </script>
                    <script type="text/javascript" charset="utf-8" src="<?php echo e(asset('org/ueditor/lang/zh-cn/zh-cn.js')); ?>"></script>
                    <script id="editor" name="content" type="text/plain" style="width:1024px;height:500px;"></script>
                    <style>
                        .edui-default{line-height: 28px;}
                        div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                        {overflow: hidden; height:20px;}
                        div.edui-box{overflow: hidden; height:22px;}
                    </style>
                    <script>
                        var ue = UE.getEditor('editor');
                    </script>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>