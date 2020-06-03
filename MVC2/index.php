<?php
 define ('SLASH',DIRECTORY_SEPARATOR);
 define ('DIRECTOR_SITE',dirname(__FILE__));
 

require_once "config.php";
require_once "util/autoloader.php";
$url = explode('/',$_GET['url']);
print_r($url);


$controllerName = $url[0];
if( isset($controllerName))
{
 require 'controllers/' . $controllerName . '.php';
 
  $method = $url[1];
 if( isset($method))
 {$args = array("an" => $url[2],"categorie" => $url[3]);
 
        
       
        
	$controller = new $controllerName($method,$args);
 }
 else {
	echo 'Error method';
       }
}
else {
	echo 'Error controller';
}
?>
