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
	public function index($value1 = null, $value2 = null) {
		$params = array(
			'first' 	=> $value1,
			'second'	=> $value2
			);
		//$this->acquireModel('Blog');

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
		$params = array(
			'first' 	=> $value1,
			'second'	=> $value2
			);
		//$this->acquireModel('Blog');

		if(!isset($value1))	return null;
		
		$result = $this->getSelected('blgs', $params);

		if(isset($result)) echo '<br>' . $result->title . '<br>'; // <= this needs to be sent to the view
	
		 
	}
}