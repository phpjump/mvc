<?php namespace app\controllers;

use app\models;


class BlogController extends Controller {

	/**
	 * Aquire a model for a the Blog controller.
	 *
	 * @param  string $var1
	 * @param  string $var2
	 * @return void
	 */
	public function index($val1 = null, $val2 = null) {

		$this->acquireModel('Blog');

		$result = $this->acquireList('blgs');
		//needs to be sent to the view
		 foreach($result as $rs){
		 	
		   echo $rs->title.'<br>';
		 }
	}


	/**
	 * Aquire a model for a the Blog controller.
	 *
	 * @param  string $var1
	 * @param  string $var2
	 * @return void | null
	 */
	public function show($value1 = null, $value2 = null) {

		$this->acquireModel('Blog');

		if(!isset($value1))	return null;
		
		$result = $this->getSelected('blgs', $value1);

		if(isset($result)) echo '<br>' . $result->title . '<br>'; // <= this needs to be sent to the view
	
		 
	}
}