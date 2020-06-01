<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once "C:/xampp/htdocs/RestApi/DB/database.php";
 
$database = new Database();
$db = $database->getConnection(); 
 if(isset($_GET['an']))
{
  $an =   $_GET['an'] ;
  $nr_cr =0;
  $criterii = " ";
  $criterii_arr=array();
  //preluam parametrii dati si construim cu ei clauza where
  if(isset($_GET['judet']))
  {
      $criterii =$criterii . "trim(upper(judet))=" . "trim(upper(" . $_GET['judet'] . "))";
      $nr_cr++;
  }
  if(isset($_GET['marca']))
  {
      if($nr_cr>0)
      $criterii = $criterii . " and ";
      $criterii =$criterii . "trim(upper(marca))=" . "trim(upper(" . $_GET['marca'] . "))";
      $nr_cr++;
  }
   if(isset($_GET['categorie_nationala']))
  {
      if($nr_cr>0)
      $criterii = $criterii . " and ";
      $criterii =$criterii . "trim(upper(categorie_nationala))=" . "trim(upper(" . $_GET['categorie_nationala'] . "))";
      $nr_cr++;
  }
   if(isset($_GET['categorie_comunitara']))
  {
      if($nr_cr>0)
      $criterii = $criterii . " and ";
      $criterii =$criterii . "trim(upper(categorie_comunitara))=" . "trim(upper(" . $_GET['categorie_comunitara'] . "))";
      $nr_cr++;
  }
   
$where = $nr_cr>0 ? " where " . $criterii . ";" : ";";
$query = "SELECT id,judet,categorie_nationala,categorie_comunitara,marca,descriere_comerciala,total_vehicule FROM An" . $an . $where;
$stmt = $db->prepare($query);
$stmt->execute();     

$num = $stmt->rowCount();

if($num>0){
    $contacts_arr=array("message" => $num. " Records.");
    $contacts_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $contact=array(
           "judet" => $row["judet"],
           "categorie_nationala" => $row["categorie_nationala"],
           "categorie_comunitara" => $row["categorie_comunitara"],
           "marca" => $row["marca"],
           "descriere_comerciala" => $row["descriere_comerciala"],
           "total_vehicule" => $row["total_vehicule"]
        ); 
        array_push($contacts_arr["records"], $contact);
    }
    http_response_code(200);
    echo json_encode($contacts_arr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No Records.", "query" => $query)
    );
}}
 else{
  http_response_code(400);
    echo json_encode(
        array("message" => "Wrong number of parameters" , "query" => $query)
    );
 }