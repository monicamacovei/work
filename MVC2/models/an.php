<?php
  
    class AnPage
    {
     public $marci;
     public $valori;
     public $anValoare;
     public function __construct()
     {
     }
     
     public function nrTotalVehicule($an) {
         $data = $this->apelApi("http://localhost/proiect-TW/RestApi/totalvalues/totalVehicule.php?an=".$an);
         $array = json_decode(json_encode($data['records']),true);
         $value = $array;
         return $value[0]["SUM(TOTAL_VEHICULE)"];
     }
    public function nrValoriVehicule($an) {
       $data = $this->apelApi("http://localhost/proiect-TW/RestApi/GraficAn/VehiculePeAn.php?an=".$an);
       $array = json_decode(json_encode($data['records']),true);
       $i=0;
       $marca=array();
       $nrvehicule=array();
        foreach($array as $row){
          $marca[$i]= $row["MARCA"];
          $nrvehicule[$i]= $row["SUM(TOTAL_VEHICULE)"];
          $i++;
        }
        $this->marci=$marca;
        $this->valori=$nrvehicule;
   } 
    public function apelApi($link)
     {
      $c = curl_init ($link); // initializam libcurl, indicand URL-ul serviciului
      $opt = [ CURLOPT_RETURNTRANSFER => TRUE,  // datele vor fi disponibile ca sir de caractere
         CURLOPT_SSL_VERIFYPEER => FALSE, // nu verificam certificatul digital
         CURLOPT_CONNECTTIMEOUT => 20,    // timp de asteptare (in secunde) a stabilirii conexiunii
         CURLOPT_TIMEOUT        => 20,    // timp de asteptare (in secunde) a raspunsului
         CURLOPT_FAILONERROR    => TRUE,  // codurile 4XX vor conduce la eroare
         CURLOPT_FOLLOWLOCATION => FALSE  // nu se accepta redirectionari
       ];
       curl_setopt_array ($c, $opt); // stabilim optiunile de realizare a cererii HTTP             
       $res = curl_exec ($c); // executam cererea via metoda GET (comportament implicit)

       $codHTTP = curl_getinfo ($c, CURLINFO_RESPONSE_CODE); // codul de stare HTTP intors de serverul serviciului Web
       $tip = curl_getinfo ($c, CURLINFO_CONTENT_TYPE); // tipul continutului oferit de serviciu

       $data =json_decode($res,true);
       curl_close ($c);
       return $data;

	 }
	}
?>