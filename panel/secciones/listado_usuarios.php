<div class="container-fluid my-5">
	<div class="row">
		<div class="col-12">
			<h1 class="text-center pt-5 animated bounce">Lista de Usuarios</h1>
		</div>
	</div>

	<?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "ok"):

                            if(!empty($_GET["mensaje"])):
                                $mensaje = $_GET["mensaje"];

                               
                                if($mensaje == "usuario_borrado"):
                                    $mensaje = "Su usuario fue borrado exitosamente";
                                elseif($mensaje == "usuario_editado"):
                                    $mensaje = "Su usuario fue editado exitosamente";
                              
                                else:
                                    $mensaje = "";
                                endif;
                   
                ?>

	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			<span class="sr-only">Close</span>
		</button>
		<strong>Completado!</strong> <?= $mensaje; ?>.
	</div>

	<?php
                            endif;
                        endif;
                    endif;
                ?>




	<div class="row ">
		<div class="col-12">


			<table class="table table-bordered text-white text-center">
				<thead>
					<tr>
						<th>
							<h3>nombre</h3>
						</th>
						<th>
							<h3>apellido</h3>
						</th>
						<th>
							<h3>email</h3>
						</th>
						<th>
							<h3>usuario</h3>
						</th>
						<th>
							<h3>perfil</h3>
						</th>
						<th>
							<h3>acciones</h3>
						</th>

					</tr>
				</thead>
				<tbody>
					<?php

            $carpeta = opendir(RUTA_USUARIOS); 

            while($usuarios = readdir($carpeta)):
                if($usuarios == "." || $usuarios == "..")
                    continue;

        ?>
					<tr>
						<td class="font-weight-bold text-center"><?= mostrar_descripcion(RUTA_USUARIOS . "$usuarios/nombre.txt"); ?> </td>

						<td class="font-weight-bold text-center"><?= mostrar_descripcion(RUTA_USUARIOS . "$usuarios/apellido.txt"); ?> </td>

						<td class="font-weight-bold text-center"><?= mostrar_descripcion(RUTA_USUARIOS . "$usuarios/email.txt"); ?> </td>

						<td class="font-weight-bold text-center"><?= mostrar_descripcion(RUTA_USUARIOS . "$usuarios/usuario.txt"); ?> </td>

						<td class="font-weight-bold text-center"><?= mostrar_descripcion(RUTA_USUARIOS . "$usuarios/perfil.txt"); ?> </td>

						<td>
							<div class="btn-group ">
								<a href="#" class="btn btn-sm btn-primary">Editar</a>
								<form action="#" method="post">
									<input type="hidden" name="id" value="<?= $usuarios; ?>">
									<button type="submit" class="btn btn-danger btn-sm ml-3">Borrar</button>
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
