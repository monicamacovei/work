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

    <link rel="stylesheet" type="text/css" href="http://localhost/proiect-TW/MVC2/css/style2.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/proiect-TW/MVC2/css/style.css">

    <script src="https://kit.fontawesome.com/cc9534741b.js" crossorigin="anonymous"></script>
</head>

<body>
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
    