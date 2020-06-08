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
                                    <a class="active" href="an.php">
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
            <main class="gray-main">
                <section>
                    <h2 class="title">Statistici dupa an</h2>
                    <article class="tab-content">
                        <ul class="tabs">
                            <?php for($tab_number=0;$tab_number<5;$tab_number++){?>
                                <li data-tab="tab-<?php echo $tab_number;?>" class="<?php if($an_link == $year_number){?>active<?php }?>">
                                    <div class="hover-effect"></div>
                                    <a href="?an=<?php echo $year_number;?>">
                                        <div class="year"><?php echo $year_number;?></div>
                                    </a>
                                </li>
                            <?php $year_number++;}?>
                        </ul>
                        <div class="content tab-<?php echo $tab_number;?> active">
                            <p class="numar_total">Numar total de masini in <?php echo $an_link;?>: <?php echo $nrVehicule;?></p>
                            
                            <div class="chart-wrapper">
                                <div style="display:none" class="an-valori">
                                    <?php foreach($nrValoriCatNat as $valoare) {?>
                                        <span><?php echo $valoare;?></span>
                                    <?php }?>
                                    <span><?php echo $restulValorilorCatNat;?></span>
                                </div>
                                <div class="chart-an chart-categorii"></div>
                                <div class="marci-showlist categorii-showlist">
                                    <?php foreach($numeCategorieNationala as $categorie_nationala) {?>
                                        <span><?php echo $categorie_nationala;?></span>
                                    <?php }?>
                                    <span>Celelalte</span>
                                </div>
                            </div>
                            <h3 class="titlu_grafic">Statistici despre Categoriile Nationale</h3>
                            <a class="save" href="" download="graph.svg">Save</a>
                            <div class="chart-wrapper">
                                <div style="display:none" class="catcom-valori">
                                    <?php foreach($nrValoriCatCom as $valoare) {?>
                                        <span><?php echo $valoare;?></span>
                                    <?php }?>
                                    <span><?php echo $restulValorilorCatCom;?></span>
                                </div>
                                <div class="chart-catcom chart-categorii"></div>
                                <div class="catcom-showlist categorii-showlist">
                                    <?php foreach($numeCategorieComunitara as $categorie_comunitara) {?>
                                        <span><?php echo $categorie_comunitara;?></span>
                                    <?php }?>
                                    <span>Celelalte</span>
                                </div>
                            </div>
                            <h3 class="titlu_grafic">Statistici despre Categoriile Comunitare</h3>
                            <a class="save" href="" download="graph.svg">Salveaza</a>
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
