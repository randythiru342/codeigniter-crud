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
	<title>Create User</title>
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
		
		
		<div class='col-md-6 ' style='margin-top:100px'>
		<?php echo form_open('store_user'); ?>
		<h3>Create Product</h3>
			<span class='error'><?php echo $this->session->flashdata('error');?></span>
			<span class='error'><?php echo $this->session->flashdata('auth');?></span>
			<div class='form-group'>
				<label>Username</label>
				<input name='username' class='form-control' type='text' placeholder='Enter Product' value='<?php echo set_value('username'); ?>'>
				<span class='error'><?php echo form_error('username'); ?></span>
			</div>

			<div class='form-group'>
				<label>Email</label>
				<input name='email' class='form-control' type='text' placeholder='Enter email' value='<?php echo set_value('email');?>'>
				<span class='error'><?php echo form_error('email'); ?></span>
			</div>
			
			<div class='form-group'>
				<label>Password</label>
				<input name='password' class='form-control' type='text' placeholder='Enter password' value='<?php echo set_value('password');?>'>
				<span class='error'><?php echo form_error('password'); ?></span>
			</div>
			<div class='form-group'>
				
				<input name='submit' type='submit' class='btn btn-primary' value='Create'>
			</div>
		<?php echo form_close(); ?>	
		</div>

	</div>
	
</div>

</body>
</html>