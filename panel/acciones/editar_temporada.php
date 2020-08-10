<?php
require_once("../../config/config.php");
require_once("../../config/funciones.php");



if(   ( empty($_POST["id"])  )  || ( !is_dir(RUTA_TEMPORADAS . $_POST["id"])  ) ):
header("Location:../index.php?seccion=listado_temporadas&estado=error&mensaje=temporada_inexistente");
die();
endif;

$id = $_POST["id"];



if(    empty($_POST["nombre"])   ):
header("Location: ../index.php?seccion=crear_temporada&id=$id&estado=error&mensaje=campos_obligatorios");
die();
endif;

$nombre = crear_nombre($_POST["nombre"]);
$descripcion = htmlentities($_POST["descripcion"]) ?? false;

rename(RUTA_TEMPORADAS . $id, RUTA_TEMPORADAS . $nombre);



if($descripcion):

file_put_contents(RUTA_TEMPORADAS . "$nombre/descripcion.txt", mayus($descripcion));

else:

unlink(RUTA_TEMPORADAS . "$nombre/descripcion.txt");

endif;



if($_FILES["imagen"]["size"] > 0 && $_FILES["imagen"]["type"] == "image/jpeg"):

    unlink(RUTA_TEMPORADAS . "$nombre/$id.jpg");
    move_uploaded_file($_FILES["imagen"]["tmp_name"], RUTA_TEMPORADAS . "$nombre/$nombre.jpg");

else:

    rename(RUTA_TEMPORADAS . "$nombre/$id.jpg",  RUTA_TEMPORADAS . "$nombre/$nombre.jpg");

endif;



header("Location: ../index.php?seccion=listado_temporadas&estado=ok&mensaje=temporada_editado");
