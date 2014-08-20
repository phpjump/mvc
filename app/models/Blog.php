<?php namespace app\models;

class Blog {

	public function __construct(){
		echo '<br>i am tyhe blog model';
	}


	public function getList($db, $table){
		$sql = "select * from $table ";
		$res = $db->query($sql);
		$result = $res->fetchAll();


		return $result;

	}

	public function getRecord($db, $table, $param){
		$sql = "select * from  $table where id = :id";
		$stmt = $db->prepare($sql);
 		$stmt->bindValue(':id',$param, \PDO::PARAM_STR);
 		$stmt->execute();
 		$result = $stmt->fetch();

 		return $result;
	}
}