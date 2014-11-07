<?php namespace coreLib;

class Base {

	 /**
	 * Aquire full list from a give table.
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
	public function getRecord($db, $table, $params = []) {

		$sql = "select * from  $table where id = :id";

		$stmt = $db->prepare($sql);

 		$stmt->bindValue(':id',$params['first'], \PDO::PARAM_STR);

 		$stmt->execute();

 		if($result = $stmt->fetch()){

			return $result;
 		}

 		return null;
 		
	}
}
