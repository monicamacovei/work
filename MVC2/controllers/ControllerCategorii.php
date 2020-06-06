<?php
 // include_once 'C:\xampp\htdocs\MVC2\models\Harta.php';

  class ControllerCategorii{
      private $model;
      public function __construct($actiune,$parametrii)
      {
       $this->model = new ModelCategorii($parametrii["categorie"]);
       
       if ($actiune=="selectAll")
       {
               $this->model = new ModelCategorii($parametrii["categorie"]);
              $this->selectAll();
	   }
       else 
       {
       $this->model=new Harta();
       $this->model->apelApi();
      }

	  }
      private function selectAll($edit = NULL)
      {
      
       $view = new ViewCategorii();
       
       $view -> incarcaDatele($this->model->GetNr(),$this->model->GetNume(),$this->model->GetSume());
       echo $view -> oferaVizualizare($edit);
	  }
  
}


?>