<?php
 define ('SLASH',DIRECTORY_SEPARATOR);
 define ('DIRECTOR_SITE',dirname(__FILE__));
 error_reporting(E_ERROR | E_PARSE);

require_once "config.php";
require_once "util/autoloader.php";
$url = explode('/',$_GET['url']);


$controllerName = $url[0];
if( isset($controllerName))
{
 require 'controllers/' . $controllerName . '.php';
 
  $categorie = $url[1];
 if( isset($categorie))
 {
  $controller = new $controllerName($categorie);
 }
 else 
 {
	echo 'Nu ati specificat categoria';
 }
}
else {
	echo 'Error controller';
}
?>
