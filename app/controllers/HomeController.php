<?php namespace app\controllers;

class HomeController extends Controller {
	
	

	public function index($val1 = null, $val2 = null) {
		
		$this->acquireModel('Home');

	}
	
	public function read($val1 = null, $val2 = null) {

		echo 'Im am in HomeController testerrerer  function!';

	}
}