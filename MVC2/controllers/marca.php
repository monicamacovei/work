<?php
include_once '../models/marca.php';
$marci = new Marca();
$nr_marca=1;
if( isset( $_GET['marca'] ) ){
    $nr_marca=$_GET['marca'];
}
$nr_marca=intval($nr_marca);
$marca_activa = $marci->lista_nume[$nr_marca]['MARCA'];
$valoare2019 = $marci->iaValoare(2019,$marca_activa)[0]['COUNT(*)'];
$valoare2018 = $marci->iaValoare(2018,$marca_activa)[0]['COUNT(*)'];
$valoare2017 = $marci->iaValoare(2017,$marca_activa)[0]['COUNT(*)'];
$valoare2016 = $marci->iaValoare(2016,$marca_activa)[0]['COUNT(*)'];
$valoare2015 = $marci->iaValoare(2015,$marca_activa)[0]['COUNT(*)'];
include_once '../views/marca.php';
?>