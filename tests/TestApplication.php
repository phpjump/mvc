<?php 
require '../autoload.php';
use app\coreLib\Application;
use app\coreLib\Base;
use app\controllers\HomeController;

class ApplicationTest extends PHPUnit_Framework_TestCase {
	public $app;
	public function testApp() {
		$this->app = new Application();
		$this->assertEquals($this->app, new Application);
	}

	public function testIsController() {
		$app = new Application();
		$d = $app->isController('blog');
		$this->assertTrue($d);
		
		}

	public function testIsMethod(){
		$app = new Application();
		$con = new HomeController('Home');
		$d = $app->unsetValue(array('url'=>'index','url1'=>'index'),1);
		print_r($d);
		$this->assertNotEquals(0,count($d));
	}

}