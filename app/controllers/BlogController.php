<?php namespace controllers;

use models\Blog; 
use models\Home; 

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
			'first'   => $value1,
			'second'  => $value2
			);
		
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
			'first'   => $value1,
			'second'  => $value2
			);
		
		if(!isset($value1))	return null;
		
		$result = $this->getSelected('blgs', $params);

		if(isset($result)) echo '<br>' . $result->title . '<br>'; // <= this needs to be sent to the view
	
	}
}
