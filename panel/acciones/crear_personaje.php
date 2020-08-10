<?php

require_once("../../config/config.php");
require_once("../../config/funciones.php");



if(  (   empty ( $_POST["nombre"])   ) ||  (  $_FILES["imagen"]["size"] == "0"  )  ||  (   empty ( $_POST["nombre2"])   ) ||  (  $_FILES["imagen2"]["size"] == "0"  )  ):
header("Location: ../index.php?seccion=crear_personaje&estado=error&mensaje=campos_obligatorios");
die();
endif;

$nombre = $_POST["nombre"];
$nombre2 = $_POST["nombre2"];
$descripcion = $_POST["descripcion"] ?? false;
$imagen = $_FILES["imagen"];
$imagen2 = $_FILES["imagen2"];



if($imagen["type"] != "image/png" || $imagen2["type"] != "image/jpeg"):
header("Location: ../index.php?seccion=crear_personaje&estado=error&mensaje=formato_imagen");
die();
endif;

$nombre = crear_nombre($nombre);


if(  is_dir(RUTA_PERSONAJES . $nombre)  ):
header("Location: ../index.php?seccion=crear_personaje&estado=error&mensaje=personaje_existe");
die();
endif;

mkdir(RUTA_PERSONAJES . $nombre);


if($descripcion):

    file_put_contents(RUTA_PERSONAJES . "$nombre/descripcion.txt",mayus($descripcion));
endif;

if($nombre2):

    file_put_contents(RUTA_PERSONAJES . "$nombre/voz.txt",$nombre2);

endif;



move_uploaded_file($imagen["tmp_name"], RUTA_PERSONAJES . "$nombre/$nombre.png");
move_uploaded_file($imagen2["tmp_name"], RUTA_PERSONAJES . "$nombre/$nombre.jpg");


header("Location: ../index.php?seccion=listado_personajes&estado=ok&mensaje=nuevo_personaje");
