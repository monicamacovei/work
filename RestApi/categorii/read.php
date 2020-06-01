<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once "C:/xampp/htdocs/RestApi/DB/database.php";
//conectare la baza de date
$database = new Database();
$db = $database->getConnection(); 

//preluare parametrii
 if(isset($_GET['an']) && isset($_GET['categorie']))
{
  $an =   $_GET['an'] ;
  $categorie =  $_GET['categorie'] ;
  $criterii =  $categorie;
  $criterii_arr=array();
  $nr_cr =2;
    while($nr_cr <=4)
    {
    if(isset($_GET['categorie' . $nr_cr]))
      {
       $criterii_arr['categorie' . $nr_cr] = $_GET['categorie' . $nr_cr];
       $criterii =$criterii . "," . $criterii_arr['categorie' . $nr_cr];


       $nr_cr ++;
	  }
      else {
	  break;
       }

    }
    $nr_cr--;
  //execut interogarea bazei de date
  $query = "SELECT ". $criterii . " ,SUM(TOTAL_VEHICULE) as \"nr_total\" FROM An" . $an . " GROUP BY " . $criterii;
  $stmt = $db->prepare($query);
  $stmt->execute();     
  $num = $stmt->rowCount();

  if($num>0){
    $records_arr=array("message" => "Succes","number_of_records" => $num);
    $records_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $record=array(
           $categorie => $row[$categorie],
           "nr_total" => $row["nr_total"]
        ); 
        for($i=2;$i<=$nr_cr;$i++)
        $record[$criterii_arr['categorie' . $i]]=$row[$criterii_arr['categorie' . $i]];
        array_push($records_arr["records"], $record);
    }
    http_response_code(200);
    echo json_encode($records_arr);
  }
  else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No Records.")
    );
  }
 }
 else{
  http_response_code(400);
    echo json_encode(
        array("message" => "Wrong number of parameters")
    );
 }