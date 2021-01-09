<?php
/*
By TV TECH TUBE
For more tutorials...
Please Subscribe & Support..
https://www.youtube.com/channel/UCx-aPgI3A59rLa6CBA81GbA/
*/


defined('BASEPATH') OR exit('No direct script access allowed');

class CrudModel extends CI_Model {

	public function __construct()
	{
			parent::__construct();
			
	}
	
	public function store_product($product_name,$description,$quantity){
		$query = $this->db->query("INSERT INTO products (product_name,description,quantity) VALUES ('".$product_name."','".$description."','".$quantity."')");
		if($this->db->insert_id()>0){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	
	public function view_product(){
		$query = $this->db->query("SELECT * FROM products");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
		
	}
	
	public function edit_product($id){
		$query = $this->db->query("SELECT * FROM products WHERE id = '".$id."'");
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else{
			return NULL;
		}
		
	}
	public function update_product($id,$product_name,$description,$quantity){
		$query = $this->db->query("UPDATE products SET product_name = '".$product_name."',description='".$description."',quantity = '".$quantity."' WHERE id = '".$id."'");
		if($this->db->affected_rows()>0){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	
	public function delete_product($id){
		$query = $this->db->query("DELETE FROM products WHERE id = '".$id."'");
		if($this->db->affected_rows()>0){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	
	
		
	
}

?>
