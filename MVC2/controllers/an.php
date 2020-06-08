<?php
include_once '../models/an.php'; //include fisierul an.php din folderul models
$an_link = 2015; //numarul an initial
if( isset( $_GET['an'] ) ){  //iau din link anul ca parametru
    $an_link = $_GET['an']; //pun parametrul in variabila an_link
}
$year_number = 2015; //mai iau o variabila cu anul 2015 ca initial
$anpage = new AnPage();
$nrVehicule = $anpage->nrTotalVehicule($an_link); //nrVehicule = toate vehiculele din anul dat ca parametru

$anpage->nrValoriCategoriiNationale($an_link);
$nrValoriCatNat = $anpage->valori_catnat; //$anpage->valori_catnat este o lista de valori (numarul de vehicule) de categorii nationale
$numeCategorieNationala = $anpage->categorii_nationale; //$anpage->categorii_nationale este o lista cu numele categoriei nationale
$suma = 0;
foreach($nrValoriCatNat as $valoare){
    $suma = $suma + $valoare; //suma numarului de vehicule din 4 cele mai populare categorii nationale
}
$restulValorilorCatNat = $nrVehicule - $suma; //restul vehiculelor = toate vehiculele - suma celor 4 populare

$anpage->nrValoriCategoriiComunitare($an_link);
$nrValoriCatCom = $anpage->valori_catcom;
$numeCategorieComunitara = $anpage->categorii_comunitare;
$suma = 0; //fac $suma din nou 0 pentru ca mai sus a fost calculata
foreach($nrValoriCatCom as $valoare){
    $suma = $suma + $valoare;//suma numarului de vehicule din 4 cele mai populare categorii comunitare
}
$restulValorilorCatCom = $nrVehicule - $suma;//restul vehiculelor = toate vehiculele - suma celor 4 populare
include_once '../views/an.php';
?>