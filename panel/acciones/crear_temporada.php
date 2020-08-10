<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");


if(  (   empty ( $_POST["nombre"])   ) ||  (  $_FILES["imagen"]["size"] == "0"  )  ):
header("Location: ../index.php?seccion=crear_temporada&estado=error&mensaje=campos_obligatorios");
die();
endif;

$nombre = $_POST["nombre"];
$descripcion = $_POST["descripcion"] ?? false;
$imagen = $_FILES["imagen"];


if( $imagen["type"] != "image/jpeg"):
header("Location: ../index.php?seccion=crear_temporada&estado=error&mensaje=formato_imagen");
die();
endif;

$nombre = crear_nombre($nombre);


    //true si es directorio
if(  is_dir(RUTA_TEMPORADAS . $nombre)  ):
header("Location: ../index.php?seccion=crear_temporada&estado=error&mensaje=temporada_existe");
die();
endif;

//crea el directorio llamado(sds)
mkdir(RUTA_TEMPORADAS . $nombre);



if($descripcion):
// escribe archivos
    file_put_contents(RUTA_TEMPORADAS . "$nombre/descripcion.txt",mayus($descripcion));
endif;


move_uploaded_file($imagen["tmp_name"], RUTA_TEMPORADAS . "$nombre/$nombre.jpg");


header("Location: ../index.php?seccion=listado_temporadas&estado=ok&mensaje=nueva_temporada");