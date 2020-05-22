<!DOCTYPE HTML>
<html lang="en-us">
    <head>
        <title>Auto Park Web Explorer</title>
        <meta name="Author" content="Macovei Monica-Ioana">
        <meta name="Author" content="Luca Nicoleta">
        <meta name="Description" content="Instrument Web de vizualizare adecvata si de comparare multi-criteriala a datelor publice privind parcul auto din Romania pe ultimii 5 ani">
        <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        <script src="https://kit.fontawesome.com/cc9534741b.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <header>
            <div class="logo">
                <img alt="logo" src="img/logo.png"/>
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
                                <li>
                                    <a href="categorie_comunitara.php">
                                        <i class="fas fa-bus-alt"></i>
                                        <span>Dupa categorie comunitara</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact.html">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <main class="gray-main">
                <section>
                    <h2 class="title">Procentajul de masini dupa an</h2>
                    <article class="tab-content">
                        <ul class="tabs">
                            <li data-tab="tab-1" class="active">
                                <div class="hover-effect"></div>
                                <div class="year">2015</div>
                            </li>
                            <li data-tab="tab-2">
                                <div class="hover-effect"></div>
                                <div class="year">2016</div>
                            </li>
                            <li data-tab="tab-3">
                                <div class="hover-effect"></div>
                                <div class="year">2017</div>
                            </li>
                            <li data-tab="tab-4">
                                <div class="hover-effect"></div>
                                <div class="year">2018</div>
                            </li>
                            <li data-tab="tab-5">
                                <div class="hover-effect"></div>
                                <div class="year">2019</div>
                            </li>
                        </ul>
                        <div class="content tab-1 active">
                            <div class="values"></div>
                            <div class="chart-2015"></div>
                        </div>
                        <div class="content tab-2">
                            <div class="values"></div>
                            <div class="chart-2016"></div>
                        </div>
                        <div class="content tab-3">
                            <div class="values"></div>
                            <div class="chart-2017"></div>
                        </div>
                        <div class="content tab-4">
                            <div class="values"></div>
                            <div class="chart-2018"></div>
                        </div>
                        <div class="content tab-5">
                            <div class="values"></div>
                            <div class="chart-2019"></div>
                        </div>
                    </article>
                </section>
            </main>
        </div>
        <footer>

        </footer>
        <script src="js/code.js"></script>
    </body>
</html>
