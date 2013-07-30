<!DOCTYPE html>
<html lang="en">
	<head>
		<title>SIM Profil Wonogiri</title>
		<link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/image" type="image/x-icon" />
		<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="<?php echo base_url(); ?>assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
		<script src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	</head>
	
	<body>
	
	<div class="container">
		<div class="row-fluid">
		<div class="span4 offset4 well login">
			<legend>
				<img src="<?php echo base_url(); ?>assets/img/badge.png">
			</legend>
			<?php if($error != null) { ?>
			<div class="alert alert-error">
				Username dan Password salah!
			</div>
			<?php } ?>
			<form method="POST" action="<?php echo base_url(); ?>index.php/login/masuk" accept-charset="UTF-8">
				<div class="row-fluid">
				<label>Username</label>
				<input type="text" id="username" class="span12" name="username" >
				<label>Password</label>
				<input type="password" id="password" class="span12" name="password">
				<br>
				<label class="checkbox pull-left">
					<input type="checkbox" name="remember" value="1"> Remember Me
				</label>
				<button type="submit" class="btn btn-primary pull-right">Login</button>
				</div>
			
			</form>
		</div>
		</div>
    </div>
	</body>
</html>