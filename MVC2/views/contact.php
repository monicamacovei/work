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
                                    <a href="../index.php?url=ControllerCategorii/judet">
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
                                    <a href="../index.php?url=ControllerCategorii/categorie_nationala">
                                        <i class="fas fa-truck-pickup"></i>
                                        <span>Dupa categorie nationala</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="active" href="contact.php">
                                <i class="fas fa-envelope-open-text"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
            <main class="no-padding">
                <section class="contact-us">
                    <div class="dark-background"></div>
                    <h2 class="title">Contacteaza-ne</h2>
                </section>
                <section class="contact-box">
                    <h3>Informatii despre cum ne poti contacta</h3>
                    <article>
                        <h4>Date de contact:</h4>
                        <p>Numar de telefon mobil: <a href="tel:075828433">075828433</a></p>
                        <p>Numar de telefon fix: <a href="tel:021332142">(021) 333 21 42</a></p>
                        <p>E-mail: <a href="mailto:apax@contact.com">contact@apax.com</a></p>
                        <p>Adresa: <span>Strada Tineretului, numarul 233, bloc 18, scara D, Iasi, Romania</span></p>
                        <p>Cod Postal: <span>70043</span></p>
                    </article>
                    <article>
                        <h4>Orar de lucru: </h4>
                        <ul>
                            <li>Luni: <span>09:00-17:00</span></li>
                            <li>Marti: <span>09:00-17:00</span></li>
                            <li>Miercuri: <span>09:00-17:00</span></li>
                            <li>Joi: <span>09:00-17:00</span></li>
                            <li>Vineri: <span>09:00-17:00</span></li>
                            <li>Sambata: <span>09:00-13:00</span></li>
                            <li>Duminica: <span>inchis</span></li>
                        </ul>
                    </article>
                </section>
            </main>
        </div>
        <footer>

        </footer>
        <script src="../js/code.js"></script>
    </body>
</html>
