<?php
include_once '../models/an.php';
$an_link = 2015;
if( isset( $_GET['an'] ) ){ 
    $an_link = $_GET['an'];
}
$year_number = 2015;
$anpage = new AnPage();
$nrVehicule = array(
    "2019" => $anpage->nrTotalVehicule(2019),
    "2018" => $anpage->nrTotalVehicule(2018),
    "2017" => $anpage->nrTotalVehicule(2017),
    "2016" => $anpage->nrTotalVehicule(2016),
    "2015" => $anpage->nrTotalVehicule(2015)
);

include_once '../views/an.php';
?>