<?php namespace app\controllers;

class HomeController extends Controller {
	
	public function __construct() {
		echo 'Im am in HomeController contstructor OK!', '<br>';
	}


	public function index($val1 = null, $val2 = null) {
		
		echo ' Im am in HomeController index function!';

	}
	public function test($val1 = null, $val2 = null) {

		echo 'Im am in HomeController testerrerer  function!';

	}
}