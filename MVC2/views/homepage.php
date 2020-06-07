<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <title>Auto Park Web Explorer</title>
        <meta name="Author" content="Macovei Monica-Ioana">
        <meta name="Author" content="Luca Nicoleta">
        <meta name="Description" content="Instrument Web de vizualizare adecvata si de comparare multi-criteriala a datelor publice privind parcul auto din Romania pe ultimii 5 ani">
        <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="../css/style.css">
        
        <script src="https://kit.fontawesome.com/cc9534741b.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <div class="logo">
                <img alt="logo" src="../img/logo.png"/>
            </div>
            <div class="right-area">
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
                            <a class="active" href="homepage.php">
                                <i class="fas fa-home"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="automobile_categorizate.php">
                                <i class="far fa-chart-bar"></i>
                                <span>Automobile categorizate</span>
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="harta.php">
                                        <i class="fas fa-globe-europe"></i>
                                        <span>Dupa judet</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="an.php">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>Dupa an</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="marca.php">
                                        <i class="fas fa-tag"></i>
                                        <span>Dupa marca</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Categorii_nationale.php">
                                        <i class="fas fa-truck-pickup"></i>
                                        <span>Dupa categorie nationala</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.php">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <main>
                <section class="dashboard-boxes">
                        <h2 class="title">Valori totale din 2019:</h2>
                        <div class="three-columns">
                            <article>
                                <div class="box-wrapper">
                                    <i class="fas fa-car-side"></i>
                                    <h2 class="number"><?php echo intval($nrVehicule);?></h2>
                                    <div class="content">vehicule</div>
                                </div>
                            </article>
                            <article>
                                <div class="box-wrapper">
                                    <i class="fas fa-tags"></i>
                                    <h2 class="number"><?php echo intval($nrMarci);?></h2>
                                    <div class="content">marci</div>
                                </div>
                            </article>
                            <article>
                                <div class="box-wrapper">
                                    <i class="far fa-chart-bar"></i>
                                    <h2 class="number"><?php echo intval($nrCategorii);?></h2>
                                    <div class="content">categorii nationale</div>
                                </div>
                            </article>
                        </div>
                </section>
                <section class="procentaj-masini">
                    <h2 class="title">Procentajul de masini dupa marca</h2>
                    <div class="two-columns">
                        <article>
                            <figure>
                                <h2>
                                    in 2019
                                </h2>
                                <div style="display:none;" class="titlu_masina_pie_2019">
                                    <?php foreach($marci2019 as $marca) {?>
                                        <span><?php echo $marca;?></span>
                                    <?php }?>
                                    <span>Celelalte</span>
                                </div>
                                <div style="display:none;" class="numar_masina_pie_2019">
                                    <?php foreach($valori2019 as $valori) {?>
                                        <span><?php echo $valori;?></span>
                                    <?php }?>
                                    <span><?php echo $restulValorilor;?></span>
                                </div>

                                <div style="display:none;" class="titlu_masina_pie_2018">
                                    <?php foreach($marci2018 as $marca) {?>
                                        <span><?php echo $marca;?></span>
                                    <?php }?>
                                    <span>Celelalte</span>
                                </div>
                                <div style="display:none;" class="numar_masina_pie_2018">
                                    <?php foreach($valori2018 as $valori) {?>
                                        <span><?php echo $valori;?></span>
                                    <?php }?>
                                    <span><?php echo $restulValorilor2018;?></span>
                                </div>
                                
                                <div class="masini-menu-2019 masini-menu"></div>
                                <svg width="200" height="200" class="chart">
                                    <circle r="100" cx="100" cy="100" class="pie-2019"/>
                                </svg>
                                <div class="procentaj"><span id="procentaj2019"></span>%</div>
                            </figure>
                        </article>
                        <article>
                            <figure>
                                <h2>
                                    in 2018
                                </h2>
                                
                                <div class="masini-menu-2018 masini-menu"></div>
                                <svg width="200" height="200" class="chart">
                                    <circle r="100" cx="100" cy="100" class="pie-2018"/>
                                </svg>
                                <div class="procentaj"><span id="procentaj2018"></span>%</div>
                            </figure>
                        </article>
                    </div>
                </section>
            </main>
        </div>
        <footer>

        </footer>
        <script src="../js/code.js"></script>
    </body>
</html>
