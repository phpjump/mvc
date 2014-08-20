<?php namespace app\controllers;


use app\models;
require '../app/config/config.php';
class Controller {

	protected $db;
	protected $model;

	public function __construct() {
		$this->openConnection();
	}


	public function openConnection(){

      $options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

        
        $this->db = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);

        var_dump($this->db);
	}

	public function acquireModel($model){
		$model = ucfirst($model);
		$model = 'app\models\\'.$model;

		$model = new $model();
		$this->model = $model;
	}


	public function acquireList($table){

		$result = $this->model->getList($this->db, $table);
	
		return $result;
	}


	public function getSelected($table, $param){
		
		$result = $this->model->getRecord($this->db, $table, $param);
		
		return $result;
	}
}