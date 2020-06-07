<?php
include_once '../models/an.php';
$an_link = 2015;
if( isset( $_GET['an'] ) ){ 
    $an_link = $_GET['an'];
}
$year_number = 2015;
$anpage = new AnPage();
$nrVehicule = $anpage->nrTotalVehicule($year_number);
$anpage->nrValoriVehicule($year_number);
$nrValori = $anpage->valori;
$numeMarca = $anpage->marci;
foreach($nrValori as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilor = $nrVehicule - $suma;
include_once '../views/an.php';
?>