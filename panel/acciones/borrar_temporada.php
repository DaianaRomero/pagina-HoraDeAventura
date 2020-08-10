<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");


                                   
if( ( empty($_POST["id"])  ) ||  ( is_dir(!RUTA_TEMPORADAS . $_POST["id"]) ) ):
header("Location: ../index.php?seccion=listado_temporadas&estado=error&error=temporada_inexistente");
die();
endif;


$temporada = $_POST["id"];

if(file_exists(RUTA_TEMPORADAS . "$temporada/descripcion.txt")):
 unlink(RUTA_TEMPORADAS . "$temporada/descripcion.txt");
endif;



unlink(RUTA_TEMPORADAS . "$temporada/$temporada.jpg");

rmdir(RUTA_TEMPORADAS . $temporada);

header("Location: ../index.php?seccion=listado_temporadas&estado=ok&mensaje=borrado");