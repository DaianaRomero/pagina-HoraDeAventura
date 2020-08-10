<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");


                                  
if( ( empty($_POST["id"])  ) ||  ( is_dir(!RUTA_LUGARES . $_POST["id"]) ) ):
header("Location: ../index.php?seccion=listado_lugares&estado=error&error=lugar_inexistente");
die();
endif;


$lugares = $_POST["id"];


unlink(RUTA_LUGARES . "$lugares/$lugares.jpg");

rmdir(RUTA_LUGARES . $lugares);

header("Location: ../index.php?seccion=listado_lugares&estado=ok&mensaje=borrado");
