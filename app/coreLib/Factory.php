<?php namespace app\coreLib;

use app\controllers\Controller;

class Factory {

	public function __construct() {

	}

	 /**
	 * Create an instance of a given class.
	 *
	 * @param array $class
	 * @param array $model
	 * @return app\controllers\Controller
	 */
	public static function createInstance($class, $model = null) {
		
		$instance = ($model != null) ? new $class($model) : new $class();


		return $instance;
	}
}
