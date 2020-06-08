<?php

  class ControllerCategorii{
      private $model;
      private $categorie;
      public function __construct($categorie)
      {
       $this->categorie=$categorie;
       $this->model = new ModelCategorii($categorie);
       $this->selectAll();
      }
      private function selectAll($edit = NULL)
      {
       $view = new ViewCategorii($this->categorie);
       $view -> incarcaDatele($this->model->GetNr(),$this->model->GetNume(),$this->model->GetSume());
       if($this->categorie=="judet")
         echo $view->oferaHarta();
       else
         echo $view -> oferaVizualizare($edit);
	  }
  
}


?>