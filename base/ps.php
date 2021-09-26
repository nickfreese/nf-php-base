<?php


require_once(dirname(__FILE__) . '/../src/bootstrap.php');

$App = $objectManager->getClass("src\App\App");
$App->run();




?>