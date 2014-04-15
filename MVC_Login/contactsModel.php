<?php

include 'DB.php';

class contactsModel{

	public function __construct(){
		$dsn  = "mysql:dbname=BDF1403;host=127.0.0.1;port=8889";
		$db_user = "root";
		$db_pass = "root";

		$this->db = new PDO($dsn, $db_user, $db_pass);
		
	}

	public function getAll(){

		$sql = "select * from users";
		$st = $this->db->prepare($sql);
		// var_dump($st);
		$st->execute();

		return $st->fetchAll();


	}

	public function getOne($id=0){

		$sql = "select * from user_details where id = :id";
		$st = $this->db->prepare($sql);
		$st->execute(array(":id"=>$id));

		return $st->fetchAll();


	}

}
?>