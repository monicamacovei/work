<?php
  class ControllerCategorii{
      private $model;
      public function __construct($actiune,$parametrii)
      {
       $this->model = new ModelCategorii($parametrii["an"],$parametrii["categorie"]);
       if ($actiune=="selectAll")
       $this->selectAll();

	  }
      private function selectAll()
      {
       echo "<pre>";
       print_r($this->model->SelectAllFrom());
       echo "<pre>";
	  }
  }


?>