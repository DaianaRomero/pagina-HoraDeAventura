<?php
require_once("../../config/config.php");
require_once("../../config/funciones.php");



if(empty($_POST["id"]) ||  !is_dir(RUTA_LUGARES . $_POST["id"])):
    header("Location:../index.php?seccion=listado_lugares&estado=error&error=lugar_inexistente");
    die();
endif;

$id = $_POST["id"];

if(empty($_POST["nombre"])):
    header("Location: ../index.php?seccion=crear_lugar&id=$id&estado=error&mensaje=campos_obligatorios");
    die();
endif;

$nombre = crear_nombre($_POST["nombre"]);

rename(RUTA_LUGARES . $id, RUTA_LUGARES . $nombre);


if($_FILES["imagen"]["size"] > 0 && $_FILES["imagen"]["type"] == "image/jpeg"):

    unlink(RUTA_LUGARES . "$nombre/$id.jpg");

    move_uploaded_file($_FILES["imagen"]["tmp_name"], RUTA_LUGARES . "$nombre/$nombre.jpg");

else:

    rename(RUTA_LUGARES . "$nombre/$id.jpg",  RUTA_LUGARES . "$nombre/$nombre.jpg");

endif;


header("Location: ../index.php?seccion=listado_lugares&estado=ok&mensaje=lugar_editado");
