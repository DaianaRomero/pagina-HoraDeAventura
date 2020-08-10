<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <meta name="description" content="tp-1">
    <meta name="author" content="Daiana A Romero">

    <title>Hora de Aventura</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">




<link href="https://fonts.googleapis.com/css?family=Lacquer|Manjari|Rancho&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/styles.css">


</head>


<body class="fond container  text-white">


    <h1 class="registro2 text-center mt-5">¡Su mensaje ya ha sido enviado con exito!</h1>
    <h2 class="registro1 text-center">Gracias por visitar nuestra página</h2>
    <h2 class="registro1 text-center mb-5">Sus datos son: </h2>

    <?php


if(empty($_POST["email"])||empty($_POST["comentario"])||empty($_POST["motivos"])):
    header("Location:../index.php?seccion=contacto&estado=error&mensaje=campos_obligatorios");
    die();
endif;



$nombre = $_POST["nombre"] ?? "";
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$motivos = $_POST["motivos"];
$comentario = $_POST["comentario"];


    
    
    
  if(empty($_POST["nombre"])){
      echo "<h2 class='registro1 text-center'> Nombre: vacio </h2>";
  } else{
      echo "<h2 class='registro1 text-center' > Nombre: " . $nombre . "</h2>";
  }
  if(empty($_POST["apellido"])){
      echo "<h2 class='registro1 text-center' > Apellido: vacio </h2>";
  } else{
      echo "<h2 class='registro1 text-center' >Apellido: " . $apellido . "</h2>";
  }  
  
echo "<h2 class='registro1 text-center' >E-mail: " . $email . "</h2>";

echo "<h2 class='registro1 text-center' > Comentario: " .$comentario. "</h2>";

if(isset($_POST["enviar"])){
    $motivo=$_POST["motivos"];
    $num=count ($motivo);
    echo ("<h2 class='registro1 text-center' >Checkbox de interés: ".$num."</h2><br>");
    for($n=0;$n<$num;$n++){
        echo("<h2 class='registro1 text-center' >".($n+1).") ".$motivo[$n]. "</h2>");
    }
}

//header("Location:../index.php?seccion=login");
 ?>

<div class="d-flex justify-content-end">
<a class="btn btn-primary mb-5" href="../index.php" role="button">Volver a la pagina principal</a>
</div>
</body>

</html>
