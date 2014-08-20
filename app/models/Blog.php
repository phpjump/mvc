<?php namespace app\models;


use app\coreLib\InterfaceAcquire;

class Blog implements InterfaceAcquire {

	/**
	 * not finished
	 *
	 * @return void
	 */
	public function __construct() {

		echo '<br>i am the blog model'; //just for development

	}

	 /**
	 * Aquire list from a give table.
	 *
	 * @param \PDO $db
	 * @param string $table
	 * @return array
	 */
	public function getList($db, $table) {

		$sql = "select * from $table ";

		$res = $db->query($sql);

		$result = $res->fetchAll();


		return $result;

	}

	 /**
	 * Acquire a record from a given table.
	 *	 
	 * @param \PDO $db
	 * @param string $table
	 * @param string $param
	 * @return array | null 
	 */
	public function getRecord($db, $table, $param) {

		$sql = "select * from  $table where id = :id";

		$stmt = $db->prepare($sql);

 		$stmt->bindValue(':id',$param, \PDO::PARAM_STR);

 		$stmt->execute();

 		if($result = $stmt->fetch()){

			return $result;
 		}

 		return null;
 		
	}
}