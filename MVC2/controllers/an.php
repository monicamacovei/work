<?php
include_once '../models/an.php';
$an_link = 2015;
if( isset( $_GET['an'] ) ){ 
    $an_link = $_GET['an'];
}
$year_number = 2015;
$anpage = new AnPage();
$nrVehicule = $anpage->nrTotalVehicule($an_link);

$anpage->nrValoriCategoriiNationale($an_link);
$nrValoriCatNat = $anpage->valori_catnat;
$numeCategorieNationala = $anpage->categorii_nationale;
$suma = 0;
foreach($nrValoriCatNat as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilorCatNat = $nrVehicule - $suma;

$anpage->nrValoriCategoriiComunitare($an_link);
$nrValoriCatCom = $anpage->valori_catcom;
$numeCategorieComunitara = $anpage->categorii_comunitare;
$suma = 0;
foreach($nrValoriCatCom as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilorCatCom = $nrVehicule - $suma;
include_once '../views/an.php';
?>