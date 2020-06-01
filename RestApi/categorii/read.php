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
  /*$select = "SELECT ". $categorie;
    $
    for($i = 1;$i<4;$i++)
    {
    if(isset($_GET['criteriu' . $i]))

    }*/
  //execut interogarea bazei de date
  $query = "SELECT ". $categorie . " ,SUM(TOTAL_VEHICULE) as \"nr_total\" FROM An" . $an . " GROUP BY " . $categorie;
  $stmt = $db->prepare($query);
  $stmt->execute();     
  $num = $stmt->rowCount();

  if($num>0){
    $contacts_arr=array("message" => "Succes","number_of_records" => $num);
    $contacts_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $contact=array(
           $categorie => $row[$categorie],
           "nr_total" => $row["nr_total"]
        ); 
        array_push($contacts_arr["records"], $contact);
    }
    http_response_code(200);
    echo json_encode($contacts_arr);
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