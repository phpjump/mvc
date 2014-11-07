<?php namespace controllers;

class HomeController extends Controller {
	
	/**
	 * Instance of database
	 * 
	 * @var \PDO $db
	 */
	private $db;
	
	/**
	 * Model instance
	 * 
	 * @var Base $model
	 */
	private $model;
	
	/**
	 * Default method of controller
	 * 
	 * @param $string $val1
	 * @param $string $val2
	 * @return void
	 */
	public function index($val1 = null, $val2 = null) {
		
		$this->db = $this->openConnection();
		
		$this->model = $this->acquireModel('Home');

	}
	
	/**
	 * Method for testing
	 * 
	 * @param string $var1
	 * @param string $var2
	 * @return void
	 */
	public function read($val1 = null, $val2 = null) {

		echo 'Im am in HomeController testerrerer  function!';

	}
}
