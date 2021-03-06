<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Auto Park Web Explorer</title>
        <meta charset="utf-8">
        <meta name="Author" content="Macovei Monica-Ioana">
        <meta name="Author" content="Luca Nicoleta">
        <meta name="Description" content="Instrument Web de vizualizare adecvata si de comparare multi-criteriala a datelor publice privind parcul auto din Romania pe ultimii 5 ani">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" type="text/css" href="../css/style2.css">
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        
    </head>
    <body >
        <title >Categorii nationale</title>
        <header>

            <div class="logo">

                <img alt="logo" src="../img/logo.png"/>

            </div>

            <div class="right-area">
                <h1>AUTOMOBILE CATEGORIZATE DUPA JUDET</h1>
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
                                <a class="active" href="index.php?url=ControllerCategorii/judet">
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
                                <a href="index.php?url=ControllerCategorii/categorie_nationala">
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
            
            <main id="main">
                <div id="scena">
                    <div id="years">
                        <a href="#H2015" class="year">2015</a>
                        <a href="#H2016" class="year">2016</a>
                        <a href="#H2017" class="year">2017</a>
                        <a href="#H2018" class="year">2018</a>
                        <a href="#H2019" class="year">2019</a>
                    </div>
                    <div id="map"></div>
                    <div class="slider" id="slider">
                        <div class="scene" id="H2015"><label>2015</label></div>
                        <div class="scene" id="H2016"><label>2016</label></div>
                        <div class="scene" id="H2017"><label>2017</label></div>
                        <div class="scene" id="H2018"><label>2018</label></div>
                        <div class="scene" id="H2019"><label>2019</label></div>

                    </div>
                </div>
            </main>
               
        <footer>



        </footer>
        <script src="../js/ColumnChart.js"></script>
        <script src="../js/code.js"></script>
    </body>
</html>
