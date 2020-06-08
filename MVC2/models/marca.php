<?php
  
    class Marca
    {
     public $lista_nume;
     public $anValoare;
     public function __construct($tip)
     {
      $this->lista_nume=array();
      $this->extract_val($this->apelApi("http://localhost/proiect-TW/RestApi/categorii/read.php?categorie=marca&tip=".$tip));
	 }
     public function iaValoare($an, $marca) //ia valoare pentru graficul dupa an
     {
        $this->extract_value($this->apelApi("http://localhost/proiect-TW/RestApi/categorii/read.php?an=". $an . "&tip=valori&marca=".urlencode($marca)));
        return $this->anValoare;
     }
     public function extract_value($data)
     {
        $array = json_decode(json_encode($data['records']),true);
        $i=0;
        foreach($array as $row){//pentru fiecare element din lista trimisa de API
            $this->anValoare[$i]= $row; //pune in lista anValoare fiecare valoare a numarului de vehicule din an
            $i++;
        }
    }
    public function getCategoriiNationale($an, $marca) { //ia categoriile nationale pe ultimii 5 ani
      $data = $this->apelApi("http://localhost/proiect-TW/RestApi/marcaDateCategorii/CategoriiNationale.php?an=".$an."&marca=".$marca);
      $array = json_decode(json_encode($data['records']),true);
      $i=0;
      $categorie=array();
      $nrvehicule=array();
       foreach($array as $row){//pentru fiecare element din lista trimisa de API
         $categorie[$i]= $row["CATEGORIE_NATIONALA"]; //lista "categorie" va contine titlul tuturor categoriilor nationale din top 4 pe ultimii 5 ani
         $nrvehicule[$i]= $row["SUM(TOTAL_VEHICULE)"];//lista "nrvehicule" va contine numarul de vehicule al tuturor categoriilor nationale din top 4 pe ultimii 5 ani
         $i++;
       }
        $dateCategorii = ["categorie" => $categorie, "numar" => $nrvehicule];
        return $dateCategorii;
   }
   public function getCategoriiComunitare($an, $marca) {//ia categoriile comunitare pe ultimii 5 ani
     $data = $this->apelApi("http://localhost/proiect-TW/RestApi/marcaDateCategorii/CategoriiComunitare.php?an=".$an."&marca=".$marca);
     $array = json_decode(json_encode($data['records']),true);
     $i=0;
     $categorie=array();
     $nrvehicule=array();
      foreach($array as $row){//pentru fiecare element din lista trimisa de API
        $categorie[$i]= $row["CATEGORIE_COMUNITARA"];//lista "categorie" va contine titlul tuturor categoriilor comunitare din top 4 pe ultimii 5 ani
        $nrvehicule[$i]= $row["SUM(TOTAL_VEHICULE)"];//lista "nrvehicule" va contine numarul de vehicule al tuturor categoriilor comunitare din top 4 pe ultimii 5 ani
        $i++;
      }
       $dateCategorii = ["categorie" => $categorie, "numar" => $nrvehicule];
       return $dateCategorii;
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
     public function extract_val($data)
     {
       $array = json_decode(json_encode($data['records']),true);
       $i=0;
        foreach($array as $row){
        $this->lista_nume[$i]= $row; //pune in lista_nume titlul tuturor marcilor
        $i++;
        }
	 }
	}
?>