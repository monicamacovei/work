<?php
include_once '../models/homepage.php';
$homepage = new Homepage();
$nrVehicule = $homepage->nrTotalVehicule();
$nrMarci = $homepage->nrTotalMarci();
$nrCategorii = $homepage->nrTotalCategorii();
include_once '../views/homepage.php';
?>