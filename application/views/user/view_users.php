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
	<title>View Users</title>
	<link href='<?php echo base_url();?>assets/css/bootstrap.min.css' rel='stylesheet' />
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
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
		
		
		<div class='col-md-12 ' style='margin-top:100px'>
		<a href='<?php echo base_url()?>create_user' class='btn btn-primary'>Create</a> 
		<span style='float:right'>
		<a href='' class='btn btn-success'>Excel Report</a> | <a href='' class='btn btn-warning'>PDF Report</a></span>
		<br>
		
		<h3>View Product</h3>
			<span class='error'><?php echo $this->session->flashdata('error');?></span>
			<span class='success'><?php echo $this->session->flashdata('inserted');?></span>
			<span class='success'><?php echo $this->session->flashdata('updated');?></span>
			<span class='error'><?php echo $this->session->flashdata('deleted');?></span>
			<table class='table table-bordered table-striped'>
			
				<tr>
					<th>Sl.No</th>
					<th>Action</th>
					<th>Username</th>
					<th>Password</th>
					<th>Email</th>
				</tr>
			<?php 
			$slno = 1;
			foreach($query as $row){
				
				?>
			
				<tr>
					<td><?php echo $slno; ?></td>
					<!--<td><?php echo "<a href='edit_product/".$row->id."' class='btn btn-primary'>Edit</a> | <a href='delete_product/".$row->id."' class='btn btn-danger' onclick = 'return confirm('Are You sure want to Delete ?')'>Delete</a>" ?></td>-->
					<td><?php echo $row->username; ?></td>
					<td><?php echo $row->password; ?></td>
					<td><?php echo $row->email; ?></td>
				</tr>
			<?php 
			$slno = $slno + 1;
			} ?> 
			</table>
			
			
		</div>
	
	</div>
	
	
</div>

</body>
</html>