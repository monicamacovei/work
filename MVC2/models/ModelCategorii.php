<?php
   class BD{
       private static $conexiune_bd = NULL;
       public static function obtine_conexiune()
       {
        if(is_null(self::$conexiune_bd))
        {
          self::$conexiune_bd = new PDO('mysql:host='. DB_HOST .';dbname=' . DB_NAME,DB_USER,DB_PASS);  
		}
        return self::$conexiune_bd;
	   }

   }
    class ModelCategorii{
     public function SelectAllFrom($table_name,$column_name)
     {
      $sql = "SELECT ". $column_name . " ,SUM(TOTAL_VEHICULE) FROM `" . $table_name . "` GROUP BY " . $column_name;
      $cerere = BD::obtine_conexiune()->prepare($sql);
      $cerere->execute();
      echo $sql;
      return $cerere->fetchAll();
	 }
	}
?>