<?php $__env->startSection('content'); ?>
<script type="text/javascript">
	function check(){
		if(document.guest.title.value==""){
			alert("留言主题不能为空！");
			return false;
		}
		if(document.guest.email.value==""){
			alert("联系人不能为空！");
			return false;
		}
		if(document.guest.content.value==""){
			alert("留言内容不能为空！");
			return false;
		}
		if(document.guest.code.value==""){
			alert("验证码不能为空！");
			return false;
		}		
		return true;
	}
</script>
<section class="container">
	<div class="page_left">
		<ul>
			<li><a href="<?php echo e(url('about/me')); ?>">关于作者</a></li>
			<li><a href="<?php echo e(url('message/me')); ?>" class="cur" >留言联系</a></li>
		</ul>
	</div>
	<div class="page_right">
	   	<h1 class="page_title">留言联系</h1>   
	   	<div class="page_content">
			<form action="<?php echo e(url('message/send')); ?>" method="post" name="guest" onsubmit="return check()">
				<?php echo e(csrf_field()); ?>

				<table class='message_table'>
				<tr>
					<td>留言主题</td>
					<td><input name='title' type='text' class='input_text' /><span class='xing'>*</span></td>
				</tr>
				<tr>
					<td>联系人</td>
					<td><input name='name' type='text' class='input_text' /></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><input name='email' type='email' class='input_text' /><span class='xing'>*</span></td>
				</tr>
				<tr>
					<td>QQ</td>
					<td><input name='qq' type='text' class='input_text' /></td>
				</tr>		
				<tr>
					<td>留言内容</td>
					<td><textarea name='content' cols='50' rows='6' class='textarea_text'></textarea><span class='xing'>*</span></td>
				</tr>
				<tr>
					<td>验证码</td>
					<td><input name="code" type="text" class='input_text' style="width:100px;margin:5px 10px 10px 0;"><img src="<?php echo e(url('code/mcode')); ?>" onclick="this.src='<?php echo e(url('code/mcode')); ?>'+Math.random()" style="cursor:pointer;" title="看不清？点击更换"><span class='xing'>*</span></td>
				</tr>		
				<tr>
					<td></td>
					<td><input type="submit" name="submit" value="提交留言" class="dosubmit" style="width:100%;max-width:320px"></td>
				</tr>
				</table>
			</form>
			<div style="margin-top:30px">
			   <p>博客留言板</p>
			   <p>1.您的每一条留言，我都将会认真查看。</p>
			   <p>2.请您填写正确的联系方式，方便我与您取得联系。</p>
			</div>
	   	</div>
	</div> 
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.blog', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>