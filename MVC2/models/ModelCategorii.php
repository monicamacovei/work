<?php
  
    class ModelCategorii
    {
     public $lista_nume;
     public $lista_sume;
     public $categorie;
     public function __construct($year,$category_name)
     {
      $this->categorie=$category_name;
      $this->lista_nume=array();
      $this->lista_sume=array();
      $this->extract_val($this->apelApi($year,$category_name));
      print_r($this->lista_nume);
      print_r($this->lista_sume);
	 }
     public function apelApi($year,$category_name)
     {
      define ('URL', 'http://localhost/RestApi/categorii/read.php?an=' . $year. '&categorie=' . $category_name);

      $c = curl_init (URL); // initializam libcurl, indicand URL-ul serviciului
      $opt = [ CURLOPT_RETURNTRANSFER => TRUE,  // datele vor fi disponibile ca sir de caractere
         CURLOPT_SSL_VERIFYPEER => FALSE, // nu verificam certificatul digital
         CURLOPT_CONNECTTIMEOUT => 10,    // timp de asteptare (in secunde) a stabilirii conexiunii
         CURLOPT_TIMEOUT        => 10,    // timp de asteptare (in secunde) a raspunsului
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
       $this->nr=$data['number_of_records'];
       $array = json_decode(json_encode($data['records']),true);
       //print_r($data->records);
       $i=0;
        foreach($array as $row){
        
        
        $this->lista_nume[$i]= $row[$this->categorie];
        $this->lista_sume[$i]= $row["nr_total"];
        $i++;
        }
	 }
     public function SelectAllFrom()
     {
     
      
	 }
	}
?>