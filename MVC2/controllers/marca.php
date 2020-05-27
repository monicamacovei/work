<?php
include_once '../models/marca.php';
$marci = Marca::getAll();
include_once '../views/marca.php';
?>