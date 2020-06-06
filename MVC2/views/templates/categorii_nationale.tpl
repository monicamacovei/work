
        <main class="gray-main" onload="creare_diagrame()">
        
       <section>
          <div class="options">
          
           <?php
          
           for($an = 2015;$an<=2019;$an++)
           { 
           if($an<2019)
            echo '<button onclick="openAn(\'' . $an . '\', this)"><span>'. $an .'</span></button>'.PHP_EOL;
           else 
            echo '<button onclick="openAn(\'2019\', this)" id="default"><span>2019</span></button> </div>'.PHP_EOL;
            }
            echo  '<div class="afisaj" id="afisaj">'.PHP_EOL;
            for($an = 2015;$an<=2019;$an++)
           {
           
           echo  '<div class="tabcontent" id="' . $an . '" style="display:none">'.PHP_EOL;
           echo  '<div class="axa-Y" id ="Ay' . $an . '"><div class="lab">300</div><div class="lab">200</div><div class="lab">100</div></div>'.PHP_EOL;
           echo  '<div class="chart" id="c' . $an  . '" >'.PHP_EOL;
           $ord = array();
           for($j=0;$j<$nr[$an];$j++)
           {

            $ord[$lista_nume[$an][$j]]=$lista_sume[$an][$j];  
		   }
           asort($ord);
           for ($i2=0;$i2<$nr[$an];$i2++) {
                    $poz = $i2 * 40 + 7;
                    $r = 0;
                    $ci = 255 / $nr[$an];
                    $g = 255 - $ci * $ord[$lista_nume[$an][$i2]];
                    $g2 = 255 - $g;
                   
                    $b = 255;
                    $w = $lista_sume[$an][$i2] / 20;
                    $x = $poz + 30;
                    if ($w < 1000)
                    {
                        //echo '<div class="labelX"><div class="rotation-inner"><div class="tx">' . $lista_nume[$an][$i2] . '</div></div></div>';
                        echo '<div class="bar" style="height:' . $w . 'px;background-color:rgb(' . $r . ',' . $g . ',' . $b . ');width:20px" ></div>'.PHP_EOL;
                    }
                }
              echo '</div>'.PHP_EOL;
              echo  '<div class="axa-X" id ="Ax' . $an . '"></div></div>'.PHP_EOL;
          
           
           
             }
             echo '</div>';
             ?>
            </div>
           </section>
        </main>
    </div>
    <footer>
    </footer>
    <script src="http://localhost//MVC2/views/js/ColumnChart.js"></script>
    <script src="http://localhost//MVC2/views/js/code.js"></script>
</body>
</html>
