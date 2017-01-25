    <?php
        //getNomeUtente, getSchool, link logout to all the buttons, link calendar to all buttons
        session_start();
        $_SESSION['loggedIn'] = true;
        if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])) {
        } else {
            header('Location: ../login/login.php');
        }
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Studenti Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <link type="text/css" rel="stylesheet" href="lib\Bootstrap\css\bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link type="text/css" rel="stylesheet" href="css\animate.css">
        <link type="text/css" rel="stylesheet" href="css\style.css">

        <script type="text/javascript" src="lib\jQuery\jquery.min.js"></script>
        <script type="text/javascript" src="lib\Bootstrap\js\bootstrap.min.js"></script>
        <script type="text/javascript" src="js\main.js"></script>

        <body>
            <header id="navbar-container">
                <nav class="navbar navbar-inverse navbar-fixed-top">
                    <div class="container-fluid">
                        <!-- Parte che non viene raggruppata -->
                        <div class="nav navbar-header">
                            <!--Hamburger-->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse-form" aria-expanded="false">
                                <span class="sr-only">Navigazione</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="nav navbar-text pull-left" id="toggle-button">
                                <a href="#" id="menu-toggle">
                                    <i class="fa fa-cogs" id="sidebar-btn" aria-hidden="true"></i>
                                </a>
                            </div>
                            <!--Titolo-->
                            <a class="navbar-brand" id="sol-label" href="#">Studenti Online</a>
                            <p class="navbar-text" id="school-information">Ingegneria e Scienze Informatiche</p>
                            <!--Dropdown notifiche-->
                            <ul class="nav navbar-nav pull-left" id="navbar-notification">
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                        <label class="sr-only" id="notification-reference" for="notification-label">Notifiche</label>
                                        <span id="notification-label" class="glyphicon glyphicon-bell"></span>

                                        <label class="sr-only" for="#notification-number">Numero notifiche</label>
                                        <span id="notification-number" class="badge badge-notify">3</span>
                                    </a>
                                    <ul class="dropdown-menu " role="menu" aria-labelledby="#notification-reference">
                                        <li>
                                            <p class="dropdown-header">Notifiche</p>
                                        </li>
                                        <div id="notification-container" class="scrollable-menu">
                                            <li>
                                                <p class="dropdown-item">Notifica 1</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 2</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 3</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 4</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 1</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 2</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 3</p>
                                            </li>
                                            <li>
                                                <p class="dropdown-item">Notifica 4</p>
                                            </li>

                                        </div>
                                        <li>
                                            <a href="#" class="dropdown-item" id="see-all-button">Vedi tutte</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- Menu con il logout -->
                        <div class="collapse navbar-collapse" id="collapse-form">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <img src="image/male-user-shadow_318-34042.jpg" class="img-circle image-profile pull-left" alt="Immagine di profilo">
                                    <a href="#" class="dropdown-toggle pull-left" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">                                                 Matteo Minardi <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#"><span class="fa fa-question-circle"></span>Aiuto</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span> Impostazioni</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- navbar-collapse -->
                    </div>
                    <!-- container-fluid -->
                </nav>
            </header>
            <div id="wrapper" class="">
                <!-- Sidebar -->
                <div id="sidebar-wrapper">
                    <nav>
                        <ul class="nav sidebar-nav">
                            <li><a href="#">Home<span class="glyphicon glyphicon-home pull-right"></span></a></li>

                            <li><a href="#" id="subscribing-menu" data-toggle="collapse" data-target="#submenu1">
                                Iscrizioni<span class="glyphicon glyphicon-plus pull-right"></span></a>
                                <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="subscribing-menu">
                                    <li class="sidebar-submenu"><a href="#">Iscrizione prove</a></li>
                                    <li class="sidebar-submenu"><a href="#">Immatricolazioni</a></li>
                                    <li class="sidebar-submenu"><a href="#">Certificati e autocertificazioni</a></li>
                                    <li class="sidebar-submenu"><a href="#">Piano di studi</a></li>
                                </ul>
                            </li>
                            <li><a href="#" id="manage-menu" data-toggle="collapse" data-target="#submenu2">
                               Gestione<span class="glyphicon glyphicon-plus pull-right"></span></a>
                                <ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="manage-menu">
                                    <li class="sidebar-submenu"><a href="#">Prenota esame</a></li>
                                    <li class="sidebar-submenu"><a href="#">Consulta Libretto</a></li>
                                    <li class="sidebar-submenu"><a href="#">Presenta domanda di laurea</a></li>
                                </ul>
                            </li>
                            <li><a href="#" id="manage-menu" data-toggle="collapse" data-target="#submenu3">
                                Servizi<span class="glyphicon glyphicon-plus pull-right"></span></a>
                                <ul class="nav collapse" id="submenu3" role="menu" aria-labelledby="manage-menu">
                                    <li class="sidebar-submenu"><a href="#">Calendario</a></li>
                                    <li class="sidebar-submenu"><a href="#">Bandi</a></li>
                                    <li class="sidebar-submenu"><a href="#">Tirocini</a></li>
                                    <li class="sidebar-submenu"><a href="#">Servizio studio</a></li>
                                </ul>
                            </li>
                            <li><a href="#" id="unsubscribing-menu" data-toggle="collapse" data-target="#submenu4">
                               Abbandono<span class="glyphicon glyphicon-plus pull-right"></span></a>
                                <ul class="nav collapse" id="submenu4" role="menu" aria-labelledby="unsubscribing-menu">
                                    <li class="sidebar-submenu"><a href="#">Cambia corso</a></li>
                                    <li class="sidebar-submenu"><a href="#">Sospendi gli studi</a></li>
                                    <li class="sidebar-submenu"><a href="#">Rinuncia agli studi</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#">Logout<span class="glyphicon glyphicon-log-out pull-right"></span></a></li>
                        </ul>
                    </nav>
                </div>
                <!-- sidebar-wrapper -->

                <!-- Page Content -->
                <div id="page-content-wrapper">
                    <!--Container del contenuto centrale-->
                    <div class="container-fluid" id="fluid-page-wrapper">
                        <!-- Una colonna dedicata al bottone della sidebar-->
                        <div class="row">

                            <div class="col-xs-12 col-md-12" id="page-container">
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <h1>Calendario</h1>
                                </a>
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <h1>Profilo</h1>
                                </a>
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-etsy" aria-hidden="true"></i>
                                    <h1>Esami</h1>
                                </a>
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-address-card-o" aria-hidden="true"></i>
                                    <h1>Libretto Online</h1>
                                </a>
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-folder-o" aria-hidden="true"></i>
                                    <h1>Servizio Studio</h1>
                                </a>
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    <h1>Preferiti</h1>
                                </a>
                                <a href="#" class="btn btn-sq">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                    <h1>Impostazioni</h1>
                                </a>
                            </div>
                            <!--buttons-container-->
                        </div>
                        <!--row-->
                    </div>
                    <!--page content wrapper-->
                </div>

        </body>

    </html>