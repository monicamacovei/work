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
                            <a href="index.html">
                                <i class="fas fa-home"></i> 
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="automobile_categorizate.html">
                                <i class="far fa-chart-bar"></i>
                                <span>Automobile categorizate</span>
                                <i class="fas fa-caret-down"></i>
                            </a>
                            <ul>
                                <li>
                                    <a href="harta.html">
                                        <i class="fas fa-globe-europe"></i>
                                        <span>Dupa judet</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="an.html">
                                        <i class="far fa-calendar-alt"></i>
                                        <span>Dupa an</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="active" href="marca.html">
                                        <i class="fas fa-tag"></i>
                                        <span>Dupa marca</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="Categorii_nationale.html">
                                        <i class="fas fa-truck-pickup"></i>
                                        <span>Dupa categorie nationala</span>
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
                    <h2 class="title">Detalii masini dupa marca</h2>
                    <article class="tab-content vertical-tab">
                        <ul class="tabs">
                            <li data-tab="tab-1" class="active">
                                <div class="hover-effect"></div>
                                <div class="type">Volvo</div>
                            </li>
                            <li data-tab="tab-2">
                                <div class="hover-effect"></div>
                                <div class="type">Mercedes</div>
                            </li>
                            <li data-tab="tab-3">
                                <div class="hover-effect"></div>
                                <div class="type">Fiat</div>
                            </li>
                            <li data-tab="tab-4">
                                <div class="hover-effect"></div>
                                <div class="type">Seat</div>
                            </li>
                            <li data-tab="tab-5">
                                <div class="hover-effect"></div>
                                <div class="type">Opel</div>
                            </li>
                        </ul>
                        <div class="content tab-1 active">
                            <ul class="marca_list">
                                <h2 class="marca_title">Marca Volvo</h2>
                                <h3 class="small_title">Numar de masini pe an</h3>
                                <div class="chart-volvo chart"></div>
                                <div class="chart-year">
                                    <div>2015</div>
                                    <div>2016</div>
                                    <div>2017</div>
                                    <div>2018</div>
                                    <div>2019</div>
                                </div>
                                <br/>
                                <br/>
                                <h3 class="small_title">Detalii 2015</h3>
                                <ul class="marca-year-detail">
                                    <li>
                                        <span>2938</span>> masini din categoria "Autobuz" dintre care <span>30%</span> sunt pe motorina si <span>70%</span> pe benzina
                                    </li>
                                    <li>
                                        <span>55</span>> masini din categoria "Automobil Mixt" dintre care <span>15%</span> sunt pe motorina si <span>85%</span> pe benzina
                                    </li>
                                </ul>
                                <h3 class="small_title">Detalii 2016</h3>
                                <ul class="marca-year-detail">
                                    <li>
                                        <span>4534</span>> masini din categoria "Autobuz" dintre care <span>35%</span> sunt pe motorina si <span>65%</span> pe benzina
                                    </li>
                                    <li>
                                        <span>74</span>> masini din categoria "Automobil Mixt" dintre care <span>15%</span> sunt pe motorina si <span>85%</span> pe benzina
                                    </li>
                                </ul>
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
        <script src="js/code.js"></script>
    </body>
</html>
