<?php
session_start();
error_reporting(E_ALL);

ini_set("display_errors",true);
ini_set("upload_max_filesize","6M");

date_default_timezone_set("America/Argentina/Buenos_Aires");

define("RUTA_PERSONAJES", __DIR__ . "/../personajes/");
define("RUTA_TEMPORADAS", __DIR__ . "/../temporadas/");
define("RUTA_USUARIOS", __DIR__ . "/../usuarios/");
define("RUTA_LUGARES", __DIR__ . "/../lugares/");
