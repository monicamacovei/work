<!DOCTYPE HTML>
<html lang="en-us">
<head>
    <title>Auto Park Web Explorer</title>
    <meta name="Author" content="Macovei Monica-Ioana">
    <meta name="Author" content="Luca Nicoleta">
    <meta name="Description" content="Instrument Web de vizualizare adecvata si de comparare multi-criteriala a datelor publice privind parcul auto din Romania pe ultimii 5 ani">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://localhost/proiect-TW/MVC2/css/style.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/proiect-TW/MVC2/css/style2.css">

    <script src="https://kit.fontawesome.com/cc9534741b.js" crossorigin="anonymous"></script>
</head>

<body onload="creare_diagrame()">
    <header>
        <div class="logo">
            <img alt="logo" src="http://localhost/proiect-TW/MVC2/img/logo.png" />
        </div>
        <div class="right-area">
            <div class="marquee">
                <div aria-hidden="true">
                    <span>Aplicatie de vizionat date despre parcul auto 2015-2019</span>
                    <span>Aplicatie de vizionat date despre parcul auto 2015-2019</span>
                </div>
            </div>
            <div class="mobile_menu">
                <p class="menu-label">Menu</p>
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    <div class="wrapper">
        <aside>
            <h2>Pagini</h2>
            <nav>
                <ul>
                    <li>
                        <a href="controllers/homepage.php">
                            <i class="fas fa-home"></i> 
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#">
                            <i class="far fa-chart-bar"></i>
                            <span>Automobile categorizate</span>
                            <i class="fas fa-caret-down"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="index.php?url=ControllerCategorii/judet">
                                    <i class="fas fa-globe-europe"></i>
                                    <span>Dupa judet</span>
                                </a>
                            </li>
                            <li>
                                <a href="controllers/an.php">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>Dupa an</span>
                                </a>
                            </li>
                            <li>
                                <a href="controllers/marca.php">
                                    <i class="fas fa-tag"></i>
                                    <span>Dupa marca</span>
                                </a>
                            </li>
                            <li>
                                <a class="active" href="index.php?url=ControllerCategorii/categorie_nationala">
                                    <i class="fas fa-truck-pickup"></i>
                                    <span>Dupa categorie nationala</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="controllers/contact.php">
                            <i class="fas fa-envelope-open-text"></i>
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>
    
        <main class="gray-main">
            <section>
                
                
                    <div class="options">
                        <button onclick="openAn('2015', this)"><span>2015</span></button>
                        <button onclick="openAn('2016', this)"><span>2016</span></button>
                        <button onclick="openAn('2017', this)"><span>2017</span></button>
                        <button onclick="openAn('2018', this)"><span>2018</span></button>
                        <button onclick="openAn('2019', this)" id="default"><span>2019</span></button>
                        
                    </div>
                    <div id="infobox">
                    </div>
                
                    <div class="afisaj" id="afisaj">
                        <div class="tabcontent" id="2015" style="display:none">
                        <div class="axa-Y" id ="Ay2015"></div>
                            <div class="chart" id="c2015"></div>
                         <div class="axa-X" id ="Ax2015"></div>
                        </div>
                        <div class="tabcontent" id="2016" style="display:none">
                        <div class="axa-Y" id ="Ay2016"></div>
                            <div class="chart" id="c2016"></div>
                         <div class="axa-X" id ="Ax2016"></div>
                        </div>
                        <div class="tabcontent" id="2017" style="display:none">
                        <div class="axa-Y" id ="Ay2017"></div>
                            <div class="chart" id="c2017"></div>
                         <div class="axa-X" id ="Ax2017"></div>
                        </div>
                        <div class="tabcontent" id="2018" style="display:none">
                        <div class="axa-Y" id ="Ay2018"></div>
                            <div class="chart" id="c2018"></div>
                         <div class="axa-X" id ="Ax2018"></div>
                        </div>
                        <div class="tabcontent" id="2019" style="display:none">
                        <div class="axa-Y" id ="Ay2019"></div>
                            <div class="chart" id="c2019"></div>
                         <div class="axa-X" id ="Ax2019"></div>
                        </div>
                    
                    </div>
                    <button class="down" onclick="Download()"><span>Download</span></button>
                    </div>
                    </div>                       
                    

                    <script >
 <?php
        echo 'var nr=[];';
        echo 'var nume=[';
        for($j=0;$j<$nr[2015]-1;$j++)
        echo '"'.$lista_nume[2015][$j].'",'.PHP_EOL;
        echo '"'.$lista_nume[2015][$nr[2015]-1].'"];';
        echo 'var sume=[];';
        echo 'var valori_totale=[];';
       for($an=2015;$an<2020;$an++)
        {
        echo 'nr.push('.$nr[$an].');';
        echo 'var suma=[';
        for($j=0;$j<$nr[$an]-1;$j++)
        echo $lista_sume[$an][$j].',';
        echo $lista_sume[$an][$nr[$an]-1].'];'.PHP_EOL;
        echo 'sume.push(suma);';
        echo 'valori_totale.push('.array_sum($lista_sume[$an]).');';
        }
        
        
        ?></script>
            </section>
        </main>
    </div>
    <footer>
    </footer>
    
    <script src="http://localhost/proiect-TW/MVC2/js/ColumnChart.js"></script>
    
</body>
</html>
