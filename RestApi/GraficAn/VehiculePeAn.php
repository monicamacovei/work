<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once "../DB/database.php";
//conectare la baza de date
$database = new Database();
$db = $database->getConnection(); 

if(isset($_GET['an'])){
  //execut interogarea bazei de date
  $an = $_GET['an'];
  $query = "SELECT MARCA, SUM(TOTAL_VEHICULE) FROM An".$an." GROUP BY MARCA ORDER BY SUM(TOTAL_VEHICULE) DESC LIMIT 4";
  $stmt = $db->prepare($query);
  $stmt->execute();     
  $num = $stmt->rowCount();

  if($num>0){
    $records_arr=array("message" => "Succes","number_of_records" => $num);
    $records_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        array_push($records_arr["records"], $row);
    }
    http_response_code(200);
    echo json_encode($records_arr);
}
  else{
    http_response_code(404);
    echo json_encode(
        array("message" => "0")
    );
  }
}