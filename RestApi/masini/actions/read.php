<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once "C:/xampp/htdocs/RestApi/DB/database.php";
 
$database = new Database();
$db = $database->getConnection(); 

$an = isset($_GET['an']) ? $_GET['an'] : die();
$query = "SELECT id,judet,categorie_nationala,categorie_comunitara,marca,descriere_comerciala,total_vehicule FROM An" . $an . ";";
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
        array("message" => "No Records.")
    );
}