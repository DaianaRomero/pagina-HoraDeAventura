<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");


                                   
if( ( empty($_POST["id"])  ) ||  ( is_dir(!RUTA_PERSONAJES . $_POST["id"]) ) ):
header("Location: ../index.php?seccion=listado_personajes&estado=error&error=personaje_inexistente");
die();
endif;



$personaje = $_POST["id"];

if(file_exists(RUTA_PERSONAJES . "$personaje/descripcion.txt")):
 unlink(RUTA_PERSONAJES . "$personaje/descripcion.txt");
endif;

if(file_exists(RUTA_PERSONAJES . "$personaje/voz.txt")):
 unlink(RUTA_PERSONAJES . "$personaje/voz.txt");
endif;



unlink(RUTA_PERSONAJES . "$personaje/$personaje.png");
unlink(RUTA_PERSONAJES . "$personaje/$personaje.jpg");
unlink(RUTA_PERSONAJES . "$personaje/$personaje.jpeg");

rmdir(RUTA_PERSONAJES . $personaje);

header("Location: ../index.php?seccion=listado_personajes&estado=ok&mensaje=borrado");