<?php
/*
By TV TECH TUBE
For more tutorials...
Please Subscribe & Support..
https://www.youtube.com/channel/UCx-aPgI3A59rLa6CBA81GbA/
*/
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href='<?php echo base_url();?>assets/css/bootstrap.min.css' rel='stylesheet' />
	<style type="text/css">
		.error{
			
			color:red;
			font-weight:bold;
		}

	</style>
</head>
<body>

<div class="container">
	<div class='row'>
		<div class='col-md-4'>
		
		</div>
		
		<div class='col-md-4 shadow p-3 mb-5 bg-white rounded' style='margin-top:100px'>
		<?php echo form_open('login_process'); ?>
		<h3>Login</h3>
			<span class='error'><?php echo $this->session->flashdata('error');?></span>
			<span class='error'><?php echo $this->session->flashdata('auth');?></span>
			<div class='form-group'>
				<label>Username</label>
				<input name='username' class='form-control' type='text' placeholder='Enter Username'>
				<span class='error'><?php echo form_error('username'); ?></span>
			</div>
			
			<div class='form-group'>
				<label>Password</label>
				<input name='password' class='form-control' type='password' placeholder='Enter Password'>
				<span class='error'><?php echo form_error('password'); ?></span>
			</div>
			
			<div class='form-group'>
				
				<input name='submit' type='submit' class='btn btn-primary' value='Login'>
			</div>
		<?php echo form_close(); ?>	
		</div>
		
		
		<div class='col-md-4'>
		
		</div>
	
	
	</div>
	
	
</div>

</body>
</html>