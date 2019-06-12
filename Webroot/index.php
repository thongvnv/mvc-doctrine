<?php

define('WEBROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_NAME"]));
define('ROOT', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]). 'src/');
define('BASEPATH', str_replace("Webroot/index.php", "", $_SERVER["SCRIPT_FILENAME"]));

use MVC\Router;
use MVC\Request;
use MVC\Dispatcher;

require BASEPATH . '/vendor/autoload.php';

$dispatch = new Dispatcher();
$dispatch->dispatch();