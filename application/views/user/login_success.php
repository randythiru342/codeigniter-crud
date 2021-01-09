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
	<title>Welcome Home</title>
	<link href='<?php echo base_url();?>assets/css/bootstrap.min.css' rel='stylesheet' />
	<style type="text/css">
		.error{
			
			color:red;
			font-weight:bold;
		}
		.success{
			
			color:green;
			font-weight:bold;
		}

	</style>
</head>
<body>

<div class="container">
	<div class='row'>
	<div class='col-md-12'>
		<?php include('header.php'); ?>
	
		<a href='<?php echo base_url('add_product') ?>' class='btn btn-primary'>Create</a> 
		<span class='error'><?php echo $this->session->flashdata('error') ?></span>
		<span class='success'><?php echo $this->session->flashdata('inserted') ?></span>
	</div>
	</div>
	
	
</div>

</body>
</html>