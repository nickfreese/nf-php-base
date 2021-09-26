<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


date_default_timezone_set("America/New_York");

$config = require_once(dirname(__FILE__) .'/etc/config.php');
$env = require_once(dirname(__FILE__) .'/etc/env.php');
if (!isset($argv)) {
  $argv = [];
}
$env['argv'] = $argv;
define('APP_DIR',$env['system']['appDir']);

require_once(dirname(__FILE__) .'/Framework/ObjectManager.php');
$objectManager = new src\Framework\ObjectManager($config, $env);

function di_autoloader($class) {
    $class = str_replace('\\', '/', $class);
    require_once APP_DIR . $class . '.php';
}
spl_autoload_register('di_autoloader');






?>