 <div class="container-fluid my-5">
 	<div class="row">
 		<div class="col-12">
 			<h2 class=" my-5 text-center center-block animated bounce"><i>Lugares</i></h2>
 		</div>
 	</div>

 	<?php
            if(!empty($_GET["estado"])):
               $estado = $_GET["estado"];
                        
                if($estado == "ok"):

                     if(!empty($_GET["mensaje"])):
                      $mensaje = $_GET["mensaje"];

                        if($mensaje == "borrado"):
                        $mensaje = "El lugar elegido fue borrado exitosamente";
                        elseif($mensaje=="nuevo_lugar"):
                         $mensaje = "Su lugar fue creado con éxito";
                          elseif($mensaje=="lugar_editado"):
                         $mensaje = "Su lugar fue editado con éxito";
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
 			<a href="index.php?seccion=crear_lugar" class=" text-white btn btn-sm btn-warning float-right shadow my-3 p-2  ">Nuevo lugar</a>

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
 							<h3>Acciones</h3>
 						</th>

 					</tr>
 				</thead>
 				<tbody>
 					<?php

                        $carpeta = opendir(RUTA_LUGARES);
                         while($lugares = readdir($carpeta)):
                            if(  (  $lugares == "." )  || (  $lugares == ".."  )  )
                                continue;

                        $imagen = glob("../lugares/$lugares/*.jpg")[0];
                    
                    ?>

 					<tr class="desc">

 						<td class="font-weight-bold text-white text-center"><?= mostrar_nombre($lugares); ?></td>

 						<td class="font-weight-bold d-flex justify-content-center "><img src="<?= $imagen ?>" alt="<?= mostrar_nombre($lugares); ?>" width="250"></td>



 						



 						<td>
 							<div class="btn-group mt-3 d-flex justify-content-center ">
 								<a href="index.php?seccion=crear_lugar&id=<?= $lugares; ?>" class="d-flex justify-content-centebtn btn-sm btn-primary shadow p-2">Editar</a>

 								<form action="acciones/borrar_lugar.php" method="post">
 									<input type="hidden" name="id" value="<?= $lugares; ?>">
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
