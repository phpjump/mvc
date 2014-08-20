<?php namespace app\controllers;

use app\models;
class BlogController extends Controller {
	
	public function index($val1 = null, $val2 = null) {

		$this->acquireModel('Blog');

		$result = $this->acquireList('blgs');
		//needs to be sent to the view
		 foreach($result as $rs){
		   echo $rs->title.'<br>';
		 }
	}

	public function show($value1 = null, $value2 = null) {

		$this->acquireModel('Blog');
if(!isset($value1)){
return null;
}
		$result = $this->getSelected('blgs', $value1);
		//needs to be sent to the view
	 	echo $result->title;
	
		 
	}
}