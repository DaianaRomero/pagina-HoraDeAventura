 <div class="container-fluid my-5">
 	<div class="row">
 		<div class="col-12">
 			<h2 class=" my-5 text-center center-block animated bounce"><i>Temporadas</i></h2>
 		</div>
 	</div>

 	<?php
            if(!empty($_GET["estado"])):
               $estado = $_GET["estado"];
                        
                if($estado == "ok"):

                     if(!empty($_GET["mensaje"])):
                      $mensaje = $_GET["mensaje"];

                        if($mensaje == "borrado"):
                        $mensaje = "La temporada elegida fue borrada exitosamente";
                        elseif($mensaje=="nueva_temporada"):
                         $mensaje = "Su temporada fue creada con éxito";
                          elseif($mensaje=="temporada_editado"):
                         $mensaje = "Su temporada fue editada con éxito";
                         endif;
                            
                ?>

 	<div class="text-center alert alert-success alert-dismissible fade show" role="alert">
 		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 			<span aria-hidden="true">&times;</span>
 			<span class="sr-only">Close</span>
 		</button>
 		<strong>Listo! </strong> <?= $mensaje; ?>.
 	</div>

 	<?php
                            endif;
                        endif;
                    endif;
       ?>

 	<div class="row text-white">
 		<div class="col-12">
 			<a href="index.php?seccion=crear_temporada" class=" text-white btn btn-sm btn-warning float-right shadow my-3 p-2  ">Nueva temporada</a>

 			<table class="table table-bordered ">
 				<thead>
 					<tr class="font-weight-bold text-center text-white">

 						<th>
 							<h3>Nombre</h3>
 						</th>

 						<th>
 							<h3>Imagen</h3>
 						</th>


 						<th>
 							<h3>Descripción</h3>
 						</th>
 						<th>
 							<h3>Acciones</h3>
 						</th>

 					</tr>
 				</thead>
 				<tbody>
 					<?php

                        $carpeta = opendir(RUTA_TEMPORADAS);
                         while($temporada = readdir($carpeta)):
                            if(  (  $temporada == "." )  || (  $temporada == ".."  )  )
                                continue;

                        $imagen = glob("../temporadas/$temporada/*.jpg")[0];
                    
                    ?>

 					<tr class="desc">

 						<td class="font-weight-bold text-white text-center"text-center><?= mostrar_nombre($temporada); ?></td>

 						<td class="font-weight-bold "><img src="<?= $imagen ?>" alt="<?= mostrar_nombre($temporada); ?>" width="150"></td>



 						<td class="text-white"><?= mostrar_descripcion(RUTA_TEMPORADAS . "$temporada/descripcion.txt"); ?></td>



 						<td>
 							<div class="btn-group mt-3  ">
 								<a href="index.php?seccion=crear_temporada&id=<?= $temporada; ?>" class="btn btn-sm btn-primary shadow p-2">Editar</a>

 								<form action="acciones/borrar_temporada.php" method="post">
 									<input type="hidden" name="id" value="<?= $temporada; ?>">
 									<button type="submit" class="btn btn-danger btn-sm shadow p-2">Borrar</button>
 								</form>
 							</div>
 						</td>
 					</tr>
 					<?php
                        endwhile;

                        closedir($carpeta);
                    ?>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </div>
