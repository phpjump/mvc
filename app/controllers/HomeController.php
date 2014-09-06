<?php namespace app\controllers;

class HomeController extends Controller {
	
	
	private $db;
	
	private $model;
	
	public function index($val1 = null, $val2 = null) {
		
		$this->db = $this->openConnection();
		
		$this->model = $this->acquireModel('Home');

	}
	
	public function read($val1 = null, $val2 = null) {

		echo 'Im am in HomeController testerrerer  function!';

	}
}
