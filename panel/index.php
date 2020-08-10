<!DOCTYPE html>
<?php
    require_once("../config/config.php");
    require_once("../config/arrays.php");
    require_once("../config/funciones.php");

    $seccion = $_GET["seccion"] ?? "listado_personajes";

 if(!isset($_SESSION["usuario"]) || $_SESSION["usuario"]["perfil"] != "admin"):
        header("Location: ../index.php?estado=error&error=acceso");
        die();
    endif;

?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel Aventura</title>

    <!--CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../vendor/fancybox/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../vendor/fontawesome-free-5.9.0-web/css/all.css">

    <link rel="stylesheet" href="../vendor/animate/animate.css">
    <link href="https://fonts.googleapis.com/css?family=Lacquer|Manjari|Rancho&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../img/favicon.ico">

    <link rel="stylesheet" href="../css/styles.css">


    

</head>

<body class="fondopanel">

    <nav class="navbar bg-primary navbar-expand-lg navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="navbar-nav mr-auto">
                <?php

                foreach($Panel as $url => $nombre):
            ?>
                <li class="nav-item <?= $seccion == $url ? "active" : "" ?>">
                    <a class="nav-link" href="index.php?seccion=<?= $url; ?>"><?= $nombre; ?></a>
                </li>
                <?php   
                endforeach;
                
            ?>

            </ul>
            
            <ul class="navbar-nav mr-0">
                    <?php
                    if(isset($_SESSION["usuario"])):
                        if($_SESSION["usuario"]["perfil"] == "admin"):
                ?>
                    <li class="nav-item ">

                        <div class="dropdown show">
                            <a class="btn btn-outline-warning shadow dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION["usuario"]["usuario"] ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">modificar perfil</a>
                                <a class="dropdown-item" href="../index.php">ir a pagina</a>
                            </div>
                        </div>

                    </li>
                    <?php
                    else:
                ?>

                    <li>
                      
                        <div class="dropdown show">
                            <a class="btn btn-outline-warning shadow dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?= $_SESSION["usuario"]["usuario"] ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <a class="dropdown-item" href="#">modificar perfil</a>

                            </div>
                        </div>
                    </li>

                    <?php
                    endif;
                ?>

                    <li class="nav-item pl-2">
                        <a class="nav-link pr-4" href="../acciones/logout.php">Logout</a>
                    </li>
                    <?php
                    else:
                ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?seccion=registro">Registro</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../index.php?seccion=login">Login</a>
                    </li>
                    <?php
                    endif;
                ?>

                </ul>
            
            
        </div>

    </nav>

    <?php
       
        if(file_exists("secciones/$seccion.php")):
            require_once("secciones/$seccion.php");
        else:
            require_once("secciones/404.php");
        endif;

    ?>


    <div class="container-fluid px-0">
        <footer class="foto mt-4">
            <div class="row mx-0">
                <div class="col-12 px-0">
                    <p class="text-center font-weight-bold ">HORA DE AVENTURA  - Daiana A. Romero - FINAL</p>

                </div>
            </div>
        </footer>
    </div>
    <!-- JS-->
    <script src="vendor/jquery/jquery.slim.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/fancybox/jquery.fancybox.min.js"></script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    
     <script src="../vendor/jquery/jquery.slim.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    
   
    <script>
        var audio = $("#tono")[0];
        $("h1").mouseenter(function() {
            audio.play();
        });
        $("h1").mouseleave(function() {
            audio.pause();
        });

    </script>
</body>

</html>
