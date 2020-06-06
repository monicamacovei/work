<?php
  
    class Homepage
    {
     public $lista_nume;
     public $anValoare;
     public function __construct()
     {
     }
     
     public function nrTotalVehicule() {
         $data = $this->apelApi("http://localhost/proiect-TW/RestApi/totalvalues/totalVehicule.php");
         $array = json_decode(json_encode($data['records']),true);
         $value = $array;
         return $value[0]["SUM(TOTAL_VEHICULE)"];
     }
     public function nrTotalMarci() {
         $data = $this->apelApi("http://localhost/proiect-TW/RestApi/totalvalues/totalMarci.php");
         $array = json_decode(json_encode($data['records']),true);
         $value = $array;
         return $value[0]["SUM(NR)"];
     }
     public function nrTotalCategorii() {
        $data = $this->apelApi("http://localhost/proiect-TW/RestApi/totalvalues/totalCategorii.php");
        $array = json_decode(json_encode($data['records']),true);
        $value = $array;
        return $value[0]["COUNT(*)"];
    }

     public function iaValoare($an, $marca)
     {
        $this->extract_value($this->apelApi("http://localhost/proiect-TW/RestApi/categorii/read.php?an=". $an . "&tip=valori&marca=".urlencode($marca)));
        return $this->anValoare;
     }
     public function extract_value($data)
     {
        $array = json_decode(json_encode($data['records']),true);
        $i=0;
        foreach($array as $row){
            $this->anValoare[$i]= $row;
            $i++;
        }
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