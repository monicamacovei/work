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
                            <a href="homepage.php">
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
                                    <a class="active" href="marca.php">
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
            <main class="gray-main">
                <section>
                    <h2 class="title">Detalii masini dupa marca</h2>
                    <article class="tab-content vertical-tab">
                        <ul class="tabs">
                            <?php if(sizeof($marci->lista_nume) == 0) {
                                echo 'Nu este nicio marca in baza de date';
                            }
                            $i=0;
                            $host='http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                            $host = strstr($host, '?', true);
                            foreach($marci->lista_nume as $marca) { ?>
                                <li <?php if($marci->lista_nume[$nr_marca]['MARCA']==$marca['MARCA']){?>class="active"<?php }?> data-tab="tab-1">
                                    <a href="<?php echo $host; ?>?marca=<?php echo $i;?>">
                                        <div class="hover-effect"></div>
                                        <div class="type"><?php echo $marca['MARCA']; ?></div>
                                    </a>
                                </li>
                            <?php $i++;}?>
                        </ul>
                        <div class="content tab-1 active">
                            <ul class="marca_list">
                                <h2 class="marca_title">Marca <?php echo $marci->lista_nume[$nr_marca]['MARCA'];?></h2>
                                <h3 class="small_title">Numar de masini pe an</h3>
                                <div class="values">
                                    <span><?php echo $valoare2015;?></span>
                                    <span><?php echo $valoare2016;?></span>
                                    <span><?php echo $valoare2017;?></span>
                                    <span><?php echo $valoare2018;?></span>
                                    <span><?php echo $valoare2019;?></span>
                                </div>
                                <div class="chart-marca chart"></div>
                                <div class="chart-year">
                                    <div>2015</div>
                                    <div>2016</div>
                                    <div>2017</div>
                                    <div>2018</div>
                                    <div>2019</div>
                                </div>
                                <br/>
                                <?php for($year = 2015; $year<=2019;$year++) {?>
                                    <h3 class="small_title">Detalii <?php echo $year;?></h3>
                                    <ul class="marca-year-detail">
                                        <h3 class="categorii_predominante">Top 5 categorii nationale predominante:</h3>
                                        <li>
                                            <span>2938</span>> masini din categoria nationala "Autobuz"
                                        </li>
                                        <li>
                                            <span>2938</span>> masini din categoria nationala "Autobuz"
                                        </li>
                                        <h3 class="categorii_predominante">Top 5 categorii comunitare predominante:</h3>
                                        <li>
                                            <span>2938</span>> masini din categoria comunitara "M1"
                                        </li>
                                        <li>
                                            <span>2938</span>> masini din categoria comunitara "M2"
                                        </li>
                                    </ul>
                                <?php }?>
                            </ul>
                        </div>
                        <div class="content tab-2">
                        </div>
                        <div class="content tab-3">
                        </div>
                        <div class="content tab-4">
                        </div>
                        <div class="content tab-5">
                        </div>
                    </article>
                </section>
            </main>
        </div>
        <footer>

        </footer>
        <script src="../js/code.js"></script>
    </body>
</html>
