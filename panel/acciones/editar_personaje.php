<?php
require_once("../../config/config.php");
require_once("../../config/funciones.php");


 
if(   ( empty($_POST["id"])  )  || ( !is_dir(RUTA_PERSONAJES . $_POST["id"])  ) ):
header("Location:../index.php?seccion=listado_personajes&estado=error&mensaje=personaje_inexistente");
die();
endif;

$id = $_POST["id"];


if(    empty($_POST["nombre"])  || empty($_POST["nombre2"])  ):
header("Location: ../index.php?seccion=crear_personaje&id=$id&estado=error&mensaje=campos_obligatorios");
die();
endif;

$nombre = crear_nombre($_POST["nombre"]);


$descripcion = htmlentities($_POST["descripcion"]) ?? false;

rename(RUTA_PERSONAJES . $id, RUTA_PERSONAJES . $nombre);
$voz=htmlentities($_POST["nombre2"]) ?? false;
rename(RUTA_PERSONAJES . $id, RUTA_PERSONAJES . $nombre2);



if($descripcion):

file_put_contents(RUTA_PERSONAJES . "$nombre/descripcion.txt", mayus($descripcion));

else:

unlink(RUTA_PERSONAJES . "$nombre/descripcion.txt");

endif;


if($voz):

file_put_contents(RUTA_PERSONAJES . "$nombre/voz.txt", $voz);

else:

unlink(RUTA_PERSONAJES . "$nombre/voz.txt");

endif;





if( ( $_FILES["imagen"]["size"] > 0  )   &&  ( $_FILES["imagen"]["type"] == "image/png" )  ):
unlink(RUTA_PERSONAJES . "$nombre/$id.png");
move_uploaded_file($_FILES["imagen"]["tmp_name"], RUTA_PERSONAJES . "$nombre/$nombre.png");

else: 

rename(RUTA_PERSONAJES . "$nombre/$id.png",  RUTA_PERSONAJES . "$nombre/$nombre.png");

endif;



if(  ( $_FILES["imagen2"]["size"] > 0  )   &&  ( $_FILES["imagen2"]["type"] == "image/jpeg" ) ):
unlink(RUTA_PERSONAJES . "$nombre/$id.jpg");
move_uploaded_file($_FILES["imagen2"]["tmp_name"], RUTA_PERSONAJES . "$nombre/$nombre.jpg");

else: 

rename(RUTA_PERSONAJES . "$nombre/$id.jpg",  RUTA_PERSONAJES . "$nombre/$nombre.jpg");

endif;





header("Location: ../index.php?seccion=listado_personajes&estado=ok&mensaje=personaje_editado");
