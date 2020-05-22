<?php
 define ('SLASH',DIRECTORY_SEPARATOR);
 define ('DIRECTOR_SITE',dirname(__FILE__));
 $actiune = "selectAll";
 $parametrii = [
    "an" => "2017",
    "categorie" => "Judet",
];

require_once "config.php";
require_once "util" . SLASH . "autoloader.php";

$controller = new ControllerCategorii($actiune,$parametrii);