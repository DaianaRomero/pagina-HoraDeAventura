<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");


if(  (   empty ( $_POST["nombre"])   ) ||  (  $_FILES["imagen"]["size"] == "0"  )  ):
header("Location: ../index.php?seccion=crear_lugar&estado=error&mensaje=campos_obligatorios");
die();
endif;

$nombre = $_POST["nombre"];
$imagen = $_FILES["imagen"];


if( $imagen["type"] != "image/jpeg"):
header("Location: ../index.php?seccion=crear_lugar&estado=error&mensaje=formato_imagen");
die();
endif;

$nombre = crear_nombre($nombre);

if(  is_dir(RUTA_LUGARES . $nombre)  ):
header("Location: ../index.php?seccion=crear_lugar&estado=error&mensaje=lugar_existe");
die();
endif;


mkdir(RUTA_LUGARES . $nombre);

move_uploaded_file($imagen["tmp_name"], RUTA_LUGARES . "$nombre/$nombre.jpg");

header("Location: ../index.php?seccion=listado_lugares&estado=ok&mensaje=nuevo_lugar");
