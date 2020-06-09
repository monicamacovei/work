<!DOCTYPE HTML>
<html lang="en-us">
<style>
#map{
  height: 100%;

}
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>
<body>
<div id="map" class="map2015">
<?php print_r(lista_nume);?></div>         
 <script >
 <?php
        
        echo 'var nume=[';
        for($j=0;$j<$nr[$an]-1;$j++)
        echo '"'.$lista_nume[$an][$j].'",'.PHP_EOL;
        echo '"'.$lista_nume[$an][$nr[$an]-1].'"];';
        echo 'var sume=[';
        for($j=0;$j<$nr[$an]-1;$j++)
        echo $lista_sume[$an][$j].',';
        echo $lista_sume[$an][$nr[$an]-1].'];';
        echo 'var valori_totale='.array_sum($lista_sume[$an]).';';
        
        
        
        ?>
 
    
      
 </script>
   <script src="http://localhost//proiect-TW/MVC2/js/harta.js"></script>    
 

        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCI9pdqXeVwogc9JjpePr1ChLPsS1H2dCs&callback=initMap">
    </script>   </body>
</html>