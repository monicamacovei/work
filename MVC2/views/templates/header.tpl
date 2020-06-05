<!DOCTYPE HTML>
<html lang="en-us">
<head>
    <title>Auto Park Web Explorer</title>
    <meta name="Author" content="Macovei Monica-Ioana">
    <meta name="Author" content="Luca Nicoleta">
    <meta name="Description" content="Instrument Web de vizualizare adecvata si de comparare multi-criteriala a datelor publice privind parcul auto din Romania pe ultimii 5 ani">
    <link href="https://fonts.googleapis.com/css?family=Stardos+Stencil:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://localhost//MVC2/views/css/style2.css">
    <link rel="stylesheet" type="text/css" href="http://localhost//MVC2/views/css/style.css">
    <script src="https://kit.fontawesome.com/cc9534741b.js" crossorigin="anonymous"></script>
</head>

<body >
    <header>
        <div class="logo">
            <img alt="logo" src="http://localhost//MVC2/views/img/logo.png" />
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
                                <a href="marca.php">
                                    <i class="fas fa-tag"></i>
                                    <span>Dupa marca</span>
                                </a>
                            </li>
                            <li>
                                <a class="active" href="Categorii_nationale.php">
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