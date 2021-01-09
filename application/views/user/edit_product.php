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
	<title>Edit Product</title>
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
		<?php echo form_open("update_product/".$pro['id'].""); ?>
		<h3>Edit Product</h3>
			<span class='error'><?php echo $this->session->flashdata('error');?></span>
			<span class='error'><?php echo $this->session->flashdata('auth');?></span>
			<div class='form-group'>
				<label>Product Name</label>
				<input name='product_name' class='form-control' type='text' placeholder='Enter Product' value='<?php echo $pro['product_name']; ?>'>
				<span class='error'><?php echo form_error('product_name'); ?></span>
			</div>
			
			<div class='form-group'>
				<label>Description</label>
				<input name='description' class='form-control' type='text' placeholder='Enter description' value='<?php  echo $pro['description'];?>'>
				<span class='error'><?php echo form_error('description'); ?></span>
			</div>
			<div class='form-group'>
				<label>Quantity</label>
				<input name='quantity' class='form-control' type='text' placeholder='Enter Quantity' value='<?php echo $pro['quantity'];?>'>
				<span class='error'><?php echo form_error('quantity'); ?></span>
			</div>
			
			<div class='form-group'>
				
				<input name='submit' type='submit' class='btn btn-primary' value='Update'>
			</div>
		<?php echo form_close(); ?>	
		</div>
		
		
		
	
	
	</div>
	
	
</div>

</body>
</html>