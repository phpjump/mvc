<?php namespace bootstrap;

use coreLib\Application;
use controllers\HomeController;
use coreLib\Factory;

/**
 * Application instance
 * 
 * @var app\coreLib\Application $app
 */
$app = new Application(new Factory);

$url = $app->parseUrl();

$app->direct($url);

$app->route();

