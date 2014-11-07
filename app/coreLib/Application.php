<?php namespace coreLib; 


class Application {

	/**
	 * The name of default controller.
	 *
	 * @var string  $defaultController
	 */
	private $defaultController = 'HomeController';

	/**
	 * The current controller instance.
	 *
	 * @var app\controllers\Controller  $controllerInstance
	 */
	private $controllerInstance = null;

	/**
	 * The name of default method.
	 *
	 * @var string  $defaultMethod
	 */
	private $defaultMethod = 'index';

	/**
	 * Is the current route a default setting.
	 *
	 * @var boolean  $defaultRoute
	 */
	private $defaultRoute = true;

	/**
	 * The parameters from a given URL.
	 *
	 * @var array  $params
	 */
	private $params = [];

	/**
	 * Name of associated model.
	 *
	 * @var string  $model
	 */
	private $model = 'Home';

	/**
	 * Intance of the factory class.
	 *
	 * @var app\coreLib\Factory  $factory
	 */
	private $factory;

	/**
	 * Create a route for application.
	 *
	 * @return void
	 */
	public function __construct(Factory $factory) {
		
		$this->factory = $factory;
		
	}

	/**
	 * Direct the applications route.
	 *
	 * @return void
	 */
	public function route() {

		if($this->controllerInstance == null) {

			$this->getInstance();

			$method = $this->defaultMethod;

			$this->controllerInstance->$method();
		}
	}

	/**
	 * Parse a given URL.
	 *
	 * @return array
	 */
	public function parseUrl() {

		if (isset($_GET['url'])) {
		echo $_GET['url'];
			$url = rtrim($_GET['url'], '/');

			$url = filter_var($url, FILTER_SANITIZE_URL);

			$url = explode('/',$url);
			

			return $url;
		}
		
	}

	/**
	 * Extract and manipulate a given array value.
	 *
	 * @param array $url
	 * @return array
	 */
	public function direct($url) {

		if (isset($url[0])){
			
			if ($this->isController($url[0])) {
				
				$url = $this->unsetValue($url, 0);

				$this->getInstance();

				$url = $this->checkMethod($url);


				return $url;

			} else {


				return $url;
			}


		return $url;
			
		}
	} 

	/**
	 * Check whether given value is an actual controller.
	 *
	 * @param string $uri
	 * @return boolean
	 */
	public function isController($uri) {

		$newController = ucfirst($uri).'Controller';

		$controllerFile = ucfirst($uri).'Controller.php';
		
		if (file_exists('../app/controllers/' . $controllerFile)) {

			$this->model = ucfirst($uri);

			$this->defaultController = $newController;


			return true;

		} else {


			return false;
		}
	}

	/**
	 * Check whether a method exists for a given value.
	 *
	 * @param array $url
	 * @return array
	 */
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

	/**
	 * Create an instance of the controller.
	 *
	 * @return void
	 */
	public function getInstance() {

		$class = 'app\controllers\\'.$this->defaultController;

		$this->controllerInstance = Factory::createInstance($class, $this->model);
	}

	/**
	 * Acccess the methods for cocntroller instance.
	 *
	 * @param array $url
	 * @return void
	 */
	public function addBehaviour($url) {

		if ($this->defaultRoute == false) $this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controllerInstance, $this->defaultMethod],$this->params);	
		
	}

	/**
	 * Unset the given position of a given array.
	 *
	 * @param array $array
	 * @param int $index
	 * @return array
	 */
	public function unsetValue($arrayUrl, $index){
			
		unset($arrayUrl[$index]);


		return $arrayUrl;
	}
}

