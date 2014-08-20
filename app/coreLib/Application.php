<?php namespace app\coreLib;


use app\controllers;


class Application {

	protected $defaultController = 'HomeController';

	protected $controllerInstance = null;

	protected $defaultMethod = 'index';

	protected $defaultRoute = true;

	protected $params = [];

	public function __construct() {

		$this->route();
		
	}

	public function route() {

		$url = $this->parseUrl();

		$url = $this->direct($url);

		if($this->controllerInstance == null) {

			$this->createInstance();

			$method = $this->defaultMethod;

			$this->controllerInstance->$method();
		}
	}

	/**
	*This is to route the app
	*
	**/
	public function parseUrl() {

		if (isset($_GET['url'])) {

			$url = rtrim($_GET['url'], '/');

			$url = filter_var($url, FILTER_SANITIZE_URL);

			$url = explode('/',$url);
			

			return $url;
		}
		
	}


	public function direct($url) {

		if (isset($url[0])){
			if ($this->isController($url[0])) {
				
				$url = $this->unsetValue($url, 0);

				$this->createInstance();

				$url = $this->checkMethod($url);


				return $url;

			} else {


				return $url;
			}


		return $url;
			
		}
	}

	public function isController($url) {

		$newController = ucfirst($url).'Controller';

		$controllerFile = ucfirst($url).'Controller.php';
		
		if (file_exists('../app/controllers/'.$controllerFile)) {

			$this->defaultController = $newController;


			return true;

		} else {


			return false;
		}
	}


	public function checkMethod($url) {

		if (isset($url[1])) {

			$newMethod = $url[1];

			$url = $this->unsetValue($url, 1);
	
			if (method_exists($this->controllerInstance, $newMethod)) {

				$this->defaultMethod = $newMethod;

				$this->defaultRoute = false;

			} else {

				$this->defaultRoute = true;
			}
		}
		$this->addBehaviour($url);


		return $url;
	}


	public function createInstance() {

		$class = 'app\controllers\\'.$this->defaultController;

		$this->controllerInstance = new $class();
	}

	public function addBehaviour($url) {

		if ($this->defaultRoute == false) $this->params = $url ? array_values($url) : [];
			

		call_user_func_array([$this->controllerInstance, $this->defaultMethod],$this->params);	
		
	}

	public function unsetValue($arr, $index){
			
		unset($arr[$index]);


		return $arr;
	}
}

