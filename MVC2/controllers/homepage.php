<?php
include_once '../models/homepage.php';
$homepage = new Homepage();
$nrVehicule = $homepage->nrTotalVehicule(2019);
$nrMarci = $homepage->nrTotalMarci();
$nrCategorii = $homepage->nrTotalCategorii();
$nrCategorii = $homepage->nrTotalCategorii();
$homepage->informatiiPie(2019);
$marci2019 = $homepage->marci_2019;
$valori2019 = $homepage->valori_2019;
$suma = 0;
foreach($valori2019 as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilor = $nrVehicule - $suma;


$homepage->informatiiPie(2018);
$marci2018 = $homepage->marci_2018;
$valori2018 = $homepage->valori_2018;

$nrVehicule2018 = $homepage->nrTotalVehicule(2018);
$suma = 0;
foreach($valori2018 as $valoare){
    $suma = $suma + $valoare;
}
$restulValorilor2018 = $nrVehicule2018 - $suma;
include_once '../views/homepage.php';
?>