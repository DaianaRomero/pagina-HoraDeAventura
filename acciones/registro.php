<?php

require_once("../config/config.php");
require_once("../config/funciones.php");



if(  empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["nombre"])  ):
    header("Location: ../index.php?seccion=registro&estado=error&mensaje=campos_obligatorios");
    die();
endif;

$email = $_POST["email"];
$password = $_POST["password"];
$nombre = $_POST["nombre"];
$apellido = !empty($_POST["apellido"]) ? $_POST["apellido"] : "";


$usuarioNuevo = explode("@",$email)[0];
$usuario = !empty($_POST["usuario"]) ? $_POST["usuario"] : $usuarioNuevo;


if(is_dir(RUTA_USUARIOS . $email)):
    header("Location: ../index.php?seccion=registro&estado=error&mensaje=usuario_existente");
    die();
endif;


mkdir(RUTA_USUARIOS . $email);


file_put_contents(RUTA_USUARIOS . "$email/email.txt", $email);

file_put_contents(RUTA_USUARIOS . "$email/nombre.txt", $nombre);

file_put_contents(RUTA_USUARIOS . "$email/apellido.txt", $apellido);

file_put_contents(RUTA_USUARIOS . "$email/usuario.txt", $usuario);

file_put_contents(RUTA_USUARIOS . "$email/perfil.txt", "usuario");

$password = password_hash($password, PASSWORD_DEFAULT);
file_put_contents(RUTA_USUARIOS . "$email/password.txt", $password);

header("Location:../index.php?seccion=login&estado=ok&ok=registro");