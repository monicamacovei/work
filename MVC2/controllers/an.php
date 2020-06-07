<?php
include_once '../models/an.php';
$an_link = 2015;
if( isset( $_GET['an'] ) ){ 
    $an_link = $_GET['an'];
}
$year_number = 2015;
$anpage = new AnPage();
$nrVehicule = $anpage->nrTotalVehicule($year_number);

$anpage->nrValoriCategoriiNationale($year_number);
$nrValoriCatNat = $anpage->valori_catnat;
$numeCategorieNationala = $anpage->categorii_nationale;
foreach($nrValoriCatNat as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilorCatNat = $nrVehicule - $suma;

$anpage->nrValoriCategoriiComunitare($year_number);
$nrValoriCatCom = $anpage->valori_catcom;
$numeCategorieNationala = $anpage->categorii_nationale;
foreach($nrValoriCatCom as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilorCatCom = $nrVehicule - $suma;
include_once '../views/an.php';
?>