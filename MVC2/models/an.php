<?php
  
    class AnPage
    {
     public $categorii_nationale;
     public $categorii_comunitare;
     public $valori_catnat;
     public $valori_catcom;
     public $anValoare;
     public function __construct()
     {
     }
     
     public function nrTotalVehicule($an) { //numarul total de vehicule in functie de anul dat
         $data = $this->apelApi("http://localhost/proiect-TW/RestApi/totalvalues/totalVehicule.php?an=".$an);
         $array = json_decode(json_encode($data['records']),true);
         $value = $array;
         return $value[0]["SUM(TOTAL_VEHICULE)"]; 
     }
    public function nrValoriCategoriiNationale($an) { //numarul total de categorii nationale in functie de anul dat
       $data = $this->apelApi("http://localhost/proiect-TW/RestApi/GraficAn/CatNatPeAn.php?an=".$an);
       $array = json_decode(json_encode($data['records']),true);
       $i=0;
       $nrvehicule=array();
        foreach($array as $row){ //pentru fiecare element din lista trimisa de API
          $categorie_nationala[$i]= $row["CATEGORIE_NATIONALA"]; //iau titlul categoriei
          $nrvehicule[$i]= $row["SUM(TOTAL_VEHICULE)"]; //iau numarul de vehicule din categorie
          $i++; 
        }
        $this->categorii_nationale=$categorie_nationala; //pun lista cu titluri in variabila "categorii_nationale" a clasei 
        $this->valori_catnat=$nrvehicule; //pun lista cu valori in variabila "valori_catnat" a clasei
   } 
   public function nrValoriCategoriiComunitare($an) { //numarul total de categorii comunitare in functie de anul dat
      $data = $this->apelApi("http://localhost/proiect-TW/RestApi/GraficAn/CatComPeAn.php?an=".$an);
      $array = json_decode(json_encode($data['records']),true);
      $i=0;
      $nrvehicule=array();
       foreach($array as $row){//pentru fiecare element din lista trimisa de API
         $categorie_comunitara[$i]= $row["CATEGORIE_COMUNITARA"]; //iau titlul categoriei
         $nrvehicule[$i]= $row["SUM(TOTAL_VEHICULE)"];//iau numarul de vehicule din categorie
         $i++;
       }
       $this->categorii_comunitare=$categorie_comunitara;
       $this->valori_catcom=$nrvehicule;
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