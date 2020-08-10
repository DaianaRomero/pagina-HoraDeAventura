<!doctype html>


<?php

    require_once("config/config.php");
    require_once("config/arrays.php");
    require_once("config/funciones.php");

    $seccion = $_GET["seccion"] ?? "home";
    
?>


<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<meta name="description" content="tp-1">
	<meta name="author" content="Daiana A Romero">

	<title>Hora de Aventura</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" href="vendor/fancybox/jquery.fancybox.min.css">

	<link rel="stylesheet" href="css/theme_1559328532204.css">




	<link rel="stylesheet" href="vendor/animate/animate.css">


	<link rel="stylesheet" href="vendor/fontawesome-free-5.9.0-web/css/all.css">
	<script src="https://kit.fontawesome.com/56cf06c876.js" crossorigin="anonymous"></script>


	<link href="https://fonts.googleapis.com/css?family=Lacquer|Manjari|Rancho&display=swap" rel="stylesheet">
	<link rel="shortcut icon" href="img/favicon.ico">
	<link rel="stylesheet" href="css/styles.css">



</head>

<body data-spy="scroll" data-target="#mimenu" id="home">
	<?= tono($seccion,$tono); ?>
	<header class="text-center text-black-42 " id="inicio">

	</header>


	<nav class="navbar justify-content-end text-white shadow navbar-expand-lg navbar-light fixed-top" style="background-color:blue" id="MiMenu">
		<div class="container">

			<a class="navbar-brand text-white" href="index.php?seccion=home"><img src="<?= logo($seccion); ?>" alt="logo" class="logo" width="170 " height="45"></a>
			<h3 class=" navidad animated flash pl-5"> <?=mostrar_tiempo($g,$seccion);?> <i class="  <?=icono($seccion,$x);?>"></i> </h3>


			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">



				<ul class=" navbar-nav ml-auto">
					<li class="nav-item">
						<?php

                    foreach($secciones as $link):
                ?>
					</li>
					<li class="nav-item <?php if($seccion == $link) { activo();} ?>">
						<a class="nav-link" href="index.php?seccion=<?= $link; ?>">
							<?= ucfirst($link) ?></a>
					</li>

					<?php
                    endforeach;
                ?>
				</ul>

				<ul class="navbar-nav mr-0">
					<?php
                    if(isset($_SESSION["usuario"])):
                        if($_SESSION["usuario"]["perfil"] == "admin"):
                ?>

					<?php

                    foreach($secciones2 as $link):
                ?>

					<li class="nav-item <?php if($seccion == $link) { activo();} ?>">
						<a class="nav-link" href="index.php?seccion=<?= $link; ?>">
							<?= ucfirst($link) ?></a>
					</li>

					<?php
                    endforeach;
                ?>





					<li class="nav-item">


						<div class="dropdown show">
							<a class="btn btn-outline-warning shadow dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<?= $_SESSION["usuario"]["usuario"] ?>
							</a>


							<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
								<a class="dropdown-item" href="#">modificar perfil</a>
								<a class="dropdown-item" href="../aventura1/panel/index.php">ir al panel</a>
							</div>
						</div>



					</li>
					<?php
                    else:
                ?>

					<li>
						<?php

                    foreach($secciones2 as $link):
                ?>

					<li class="nav-item <?php if($seccion == $link) { activo();} ?>">
						<a class="nav-link" href="index.php?seccion=<?= $link; ?>">
							<?= ucfirst($link) ?></a>
					</li>

					<?php
                    endforeach;
                ?>
					<!--   https://getbootstrap.com/docs/4.0/components/dropdowns/    -->
					<div class="dropdown show">
						<a class="btn btn-outline-warning shadow dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?= $_SESSION["usuario"]["usuario"] ?>
						</a>

						<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
							<a class="dropdown-item" href="#">modificar perfil</a>

						</div>
					</div>
					</li>

					<?php
                    endif;
                ?>

					<li class="nav-item ">
						<a class="nav-link " href="acciones/logout.php">Logout</a>
					</li>
					<?php
                    else:
                ?>
					<li class="nav-item  ">
						<a class="nav-link" href="index.php?seccion=registro">Registro</a>
					</li>

					<li class="nav-item  ">
						<a class="nav-link" href="index.php?seccion=login">Login</a>
					</li>
					<?php
                    endif;
                ?>

				</ul>



			</div>
		</div>


	</nav>



	<main class="container-fluid mt-5">

		<!-- Acá se van a incluir las secciones -->
		<?php 
    
    if(file_exists("secciones/$seccion.php")):
        require_once("secciones/$seccion.php");
    else:
        require_once("secciones/404.php");
    endif;

?>
	</main>






	<div class="container-fluid px-0">
		<footer class="foto  d-flex justify-content-center  py-3  text-center mt-5 py-3 py-lg-2">


			<?php
            foreach($redes as $red):
        ?>


			<ul class="nav mr-5 pt-3 pt-sm-3 pt-md-2 mb-md-2 mt-3">
				<li class="nav-item">
					<a href="<?=$red["url"] ?>" target="_blank"><i class="<?=$red["icono"] ?> fa-3x text-white shadow"></i> </a>

					<div>
						<h3><?= $red["nombre"]; ?></h3>
					</div>
				</li>

			</ul>


			<?php
                endforeach;
         ?>






		</footer>
	</div>





	<script src="vendor/jquery/jquery.slim.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="vendor/fancybox/jquery.fancybox.min.js"></script>
	<script src="vendor/wow/wow.min.js"></script>
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.bundle.js"></script>
	<script src="vendor/jquery/jquery.slim.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		var audio = $("#tono")[0];
		$("header").mouseenter(function() {
			audio.play();
		});
		$("header").mouseleave(function() {
			audio.pause();
		});

	</script>

</body>

</html>
