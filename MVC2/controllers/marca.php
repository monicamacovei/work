<?php
include_once '../models/marca.php';
$marca='Volvo';
$an=2019;
$vehicule = Marca::NumarPeAn($marca, $an);
$marci = Marca::getAll();

include_once '../views/marca.php';
?>