<?php
include_once '../models/homepage.php';
$homepage = new Homepage();
$nrVehicule = $homepage->nrTotalVehicule();
include_once '../views/homepage.php';
?>