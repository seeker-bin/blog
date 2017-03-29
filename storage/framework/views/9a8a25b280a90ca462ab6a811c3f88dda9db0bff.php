<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?php echo e(asset('admin/css/ch-ui.admin.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('admin/font/css/font-awesome.min.css')); ?>">
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			<?php if(session('msg')): ?>
				<p style="color:red"><?php echo e(session('msg')); ?></p>
			<?php endif; ?>
			<form action="" method="post">
				<?php echo e(csrf_field()); ?>

				<ul>
					<li>
					<input type="text" name="username" class="text"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<img src="<?php echo e(url('code')); ?>" alt="" onclick="this.src='<?php echo e(url('code')); ?>?'+Math.random()">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="/">返回首页</a> &copy; 2017 Powered by <a href="http://binblogs.cn" target="_blank">http://binblogs.cn</a></p>
		</div>
	</div>
</body>
</html>