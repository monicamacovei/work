<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../DB/database.php';
 
$database = new Database();
$db = $database->getConnection();
 
$data = json_decode(file_get_contents("php://input"));
$descriere_comerciala = "";

if(
    !empty($data->judet) &&
    !empty($data->categorie_nationala) &&
    !empty($data->categorie_comunitara) &&
    !empty($data->marca) &&
    !empty($data->total_vehicule) &&
    !empty($data->an)
){
    //if(!empty($data->descriere_comerciala))//campul descriere comerciala poate fi
    //$descriere_comerciala = $data->descriere_comerciala;
    $table_name = "An" . $data->an;
    $query = "insert into " . $table_name . " (judet,categorie_nationala,categorie_comunitara,marca,descriere_comerciala,total_vehicule) values 
    (:judet,:categorie_nationala,:categorie_comunitara,:marca,:descriere_comerciala,:total_vehicule);";
    $stmt = $db->prepare($query);

    $insert_array = [
                     "judet" => $data->judet,
                     "categorie_nationala" => $data->categorie_nationala,
                     "categorie_comunitara" => $data->categorie_comunitara,
                     "marca" => $data->marca,
                     "descriere_comerciala" => $data->descriere_comerciala,
                     "total_vehicule" => $data->total_vehicule
                    ];
    if($stmt->execute($insert_array)){ 
        http_response_code(201); //201 resource created
        echo json_encode(array("message" => "Car added."));
    }
    else{
        http_response_code(503); // 503 service u
        echo json_encode(array("message" => "Unable to add car."));
    }
}
else{
    http_response_code(400); // bad request
    echo json_encode(array("message" => "Unable to create car. Need more data."));
}
?>