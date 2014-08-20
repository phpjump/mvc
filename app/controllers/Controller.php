<?php namespace app\controllers;


use app\models;
require '../app/config/config.php';
class Controller {

	 /**
	 * Instance of the PDO class.
	 *
	 * @var \PDO  $db
	 */
	protected $db;

	 /**
	 * Instance of current model.
	 *
	 * @var app\coreLib\IntefaceAcquire  $db
	 */
	protected $model;

	 /**
	 * class constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->openConnection();
	}

	 /**
	 * Create and open connection to database.
	 *
	 * @return void
	 */
	public function openConnection(){

      $options = array(\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION);

        
        $this->db = new \PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS, $options);

        var_dump($this->db);
	}

	 /**
	 * Aquire a model for a given controller.
	 *
	 * @param  string $model
	 * @return void
	 */
	public function acquireModel($model){
		$model = ucfirst($model);
		$model = 'app\models\\'.$model;

		$model = new $model();
		$this->model = $model;
	}

	 /**
	 * Aquire a list from model.
	 *
	 * @param  string $table
	 * @return array
	 */
	public function acquireList($table){

		$result = $this->model->getList($this->db, $table);
	
		return $result;
	}

 	 /**
	 * Aquire a specific value fromm the model.
	 *
	 * @param  string $table
	 * @param  string $param
	 * @return array
	 */
	public function getSelected($table, $param){
		
		$result = $this->model->getRecord($this->db, $table, $param);
		
		return $result;
	}
}