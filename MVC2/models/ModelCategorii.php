<?php
  
    class ModelCategorii
    {
     public $lista_nume;//array multidimensional de tip [an][index]=tip_categorie
     public $lista_sume;//array multidimensional de tip [an][index]=nr_total
     public $categorie;
     public $nr;//array cu nr inregistrarilor pe ani
     public function __construct($category_name)
     {
      $this->categorie=$category_name;
      $this->lista_nume=array();
      $this->lista_sume=array();
      $this->nr=array();
      for($year=2015;$year<=2019;$year++)
      {
      $this->extract_val($this->apelApi($year,$category_name),$year);
      }
      
	 }
     public function apelApi($year,$category_name)
     {
      $c = curl_init ('http://localhost/RestApi/categorii/read.php?an=' . $year. '&categorie=' . $category_name); // initializam libcurl, indicand URL-ul serviciului
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
     public function extract_val($data,$year)
     {
       $this->nr[$year]=$data['number_of_records'];
       $array = json_decode(json_encode($data['records']),true);
       //print_r($data);
       $i=0;
       $ynume=array();
       $ysume=array();
        foreach($array as $row){
        
        $ynume[$i]= $row[$this->categorie];
        $ysume[$i]= $row["nr_total"];
        $i++;
        }
        $this->lista_nume[$year]=$ynume;
        $this->lista_sume[$year]=$ysume;
        
	 }
     public function SelectAllFrom()
     {
     echo "<pre>";
     print_r($this->lista_nume);
     print_r($this->lista_sume);
     echo "<pre>";
      
	 }
     public function GetNr()
     {
      
      return $this->nr;
	 }
     public function GetNume()
     {
      return $this->lista_nume;
	 }
     public function GetSume()
     {
      return $this->lista_sume;
	 }
	}
?>