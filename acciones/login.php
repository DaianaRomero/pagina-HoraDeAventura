<?php

require_once("../config/config.php");
require_once("../config/funciones.php"); 



if(empty($_POST["email"]) || empty($_POST["password"])):
    header("Location: ../index.php?seccion=login&estado=error&mensaje=campos_obligatorios");
    die();
endif;

$email = $_POST["email"];
$password = $_POST["password"];

if(!is_dir(RUTA_USUARIOS . $email)):
    header("Location: ../index.php?seccion=login&estado=error&mensaje=datos_incorrectos");
    die();
endif;

$passwordGuardado = file_get_contents(RUTA_USUARIOS . "$email/password.txt");

if(!password_verify($password, $passwordGuardado)):
    header("Location: ../index.php?seccion=login&estado=error&mensaje=datos_incorrectos");
    die();
endif;

$perfil = file_get_contents(RUTA_USUARIOS . "$email/perfil.txt");
$nombre = file_get_contents(RUTA_USUARIOS . "$email/nombre.txt");
$usuario = file_get_contents(RUTA_USUARIOS . "$email/usuario.txt");
$apellido = file_get_contents(RUTA_USUARIOS . "$email/apellido.txt");


$_SESSION["usuario"] = [
    "nombre" => $nombre,  
     "apellido" => $apellido, 
    "email" => $email,  
    "usuario" => $usuario,  
    "perfil" => $perfil
];


if($perfil == "admin"):
    $url = "../panel/index.php?estado=ok&ok=login";
else:
    $url = "../index.php?estado=ok&ok=login";
endif;


header("Location:$url");