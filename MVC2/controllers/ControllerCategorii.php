<?php
  class ControllerCategorii{
      private $model;
      public function __construct($actiune,$parametrii)
      {
       $this->model = new ModelCategorii();
       if ($actiune=="selectAll")
       $this->selectAll($parametrii["an"],$parametrii["categorie"]);

	  }
      private function selectAll($an,$categorie)
      {
       echo "<pre>";
       print_r($this->model->SelectAllFrom($an,$categorie));
       echo "<pre>";
	  }
  }


?>