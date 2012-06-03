<?php 
class Model_Users extends MY_Model {

	function __construct() {
		parent::__construct();
	}
	
	function login($nickname, $password) {
		
		$query = $this -> db -> query("	SELECT `id_users`,`user`,`pass`,`name`,`charge`,`phone`,`level`,`city`,`country`,`email`
										FROM `greenjobs`.`users`
										WHERE (`user` = '".$nickname."' AND `pass` = '".$password."')");
		
		return $query;
	}
	
	function getUserById($id)
	{
		$user = $this -> db -> where("id_users",$id) -> get("users");
		return $user;
	}
} 