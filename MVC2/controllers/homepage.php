<?php
include_once '../models/homepage.php';//include fisierul homepage.php din folderul models
$homepage = new Homepage();
$nrVehicule = $homepage->nrTotalVehicule(2019); //total vehicule in 2019
$nrMarci = $homepage->nrTotalMarci(); //total marci
$nrCategorii = $homepage->nrTotalCategorii(); //total categorii 
$homepage->informatiiPie(2019); //apelarea functiei informatiiPie care adauga informatii in marci_2019 si valori_2019
$marci2019 = $homepage->marci_2019;
$valori2019 = $homepage->valori_2019;
$suma = 0;
foreach($valori2019 as $valoare){
    $suma = $suma + $valoare; //suma numarului de vehicule a primelor 4 cele mai populare marci
}
$restulValorilor = $nrVehicule - $suma; 


$homepage->informatiiPie(2018);//apelarea functiei informatiiPie care adauga informatii in marci_2018 si valori_2018
$marci2018 = $homepage->marci_2018;
$valori2018 = $homepage->valori_2018;

$nrVehicule2018 = $homepage->nrTotalVehicule(2018); //total vehicule in 2018
$suma = 0;
foreach($valori2018 as $valoare){
    $suma = $suma + $valoare; //suma numarului de vehicule a primelor 4 cele mai populare marci
}
$restulValorilor2018 = $nrVehicule2018 - $suma;
include_once '../views/homepage.php';//include fisierul homepage.php din folderul views
?>