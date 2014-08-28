<?php 
require '../autoload.php';
use app\coreLib\Application;
use app\coreLib\Base;
use app\coreLib\Factory;
use app\controllers\HomeController;

class ApplicationTest extends PHPUnit_Framework_TestCase {

	public $app;

	public function setUp(){
		
		$this->app = new Application();

	}
	public function testApp() {

		
		$this->assertEquals($this->app, new Application);
	}

	public function testIsController() {

		

		$d = $this->app->isController('blog');
		$this->assertTrue($d);

		$d = $this->app->isController('home');
		$this->assertTrue($d);
		
		$d = $this->app->isController('about');
		$this->assertFalse($d);
		
		}

	public function testGetInstance(){

		$class = 'app\controllers\HomeController';

		$instance = Factory::createInstance($class,'Home');

		$this->assertEquals($instance, Factory::createInstance($class,'Home'));
	}

}