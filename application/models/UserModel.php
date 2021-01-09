
<?php
/*
By TV TECH TUBE
For more tutorials...
Please Subscribe & Support..
https://www.youtube.com/channel/UCx-aPgI3A59rLa6CBA81GbA/
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model {

	public function __construct()
	{
			parent::__construct();
			
	}
	
	public function login_process($username,$password){
		$query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
		if($query->num_rows()>0){
			return $query->row_array();
		}
		else{
			return NULL;
		}
		
	}
	
	public function store_user($username,$password,$email){
		$query = $this->db->query("INSERT INTO users (username,password,email) VALUES ('".$username."','".$password."','".$email."')");
		if($this->db->insert_id()>0){
			return TRUE;
		}
		else{
			return FALSE;
		}
		
	}
	
	public function view_user(){
		$query = $this->db->query("SELECT * FROM users");
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return NULL;
		}
		
	}	
	
}

?>
