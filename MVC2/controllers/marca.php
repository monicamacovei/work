<?php
include_once '../models/marca.php'; //includ fisierul marca.php din folderul models
$marci = new Marca();
$nr_marca=1; //pun marca 1 pentru inceput, in caz ca nu e transmisa marca prin parametrul linkului
if( isset( $_GET['marca'] ) ){
    $nr_marca=$_GET['marca']; //iau parametrul din link
}
$nr_marca=intval($nr_marca); //transform valoarea parametrului in int
$marca_activa = $marci->lista_nume[$nr_marca]['MARCA']; //$marci->lista_nume e o lista cu toate marcile, iar cu $nr_marca iau doar cea activa, trimisa prin parametru
$valoare2019 = $marci->iaValoare(2019,$marca_activa)[0]['COUNT(*)']; 
$valoare2018 = $marci->iaValoare(2018,$marca_activa)[0]['COUNT(*)'];
$valoare2017 = $marci->iaValoare(2017,$marca_activa)[0]['COUNT(*)'];
$valoare2016 = $marci->iaValoare(2016,$marca_activa)[0]['COUNT(*)'];
$valoare2015 = $marci->iaValoare(2015,$marca_activa)[0]['COUNT(*)']; //iau numarul de vehicule din 2015 pentru marca activa

$categoriiNationale =  
    ["2019" => $marci->getCategoriiNationale(2019,$marca_activa),
    "2018" => $marci->getCategoriiNationale(2018,$marca_activa),
    "2017" => $marci->getCategoriiNationale(2017,$marca_activa),
    "2016" => $marci->getCategoriiNationale(2016,$marca_activa), //numarul de vehicule per categorie nationala si titlul categoriei nationale din anul 2016 pentru marca respectiva
    "2015" => $marci->getCategoriiNationale(2015,$marca_activa),
]; 

$categoriiComunitare =  
    ["2019" => $marci->getCategoriiComunitare(2019,$marca_activa),
    "2018" => $marci->getCategoriiComunitare(2018,$marca_activa),
    "2017" => $marci->getCategoriiComunitare(2017,$marca_activa),
    "2016" => $marci->getCategoriiComunitare(2016,$marca_activa),//numarul de vehicule per categorie comunitara si titlul categoriei nationale din anul 2016 pentru marca respectiva
    "2015" => $marci->getCategoriiComunitare(2015,$marca_activa),
];
include_once '../views/marca.php'; //include fisierul marca.php din folderul views
?>