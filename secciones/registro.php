<div class="row justify-content-center ">
    <div class="col-10 col-lg-4">
        <div class="card mb-5">
            <div class="card-body registro ">
                <h3 class="text-center text-warning py-3">Registrate aqui</h3>

                <?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "error"):

                            if(!empty($_GET["mensaje"])):
                                $mensaje = $_GET["mensaje"];

                                if($mensaje == "campos_obligatorios"):
                                    $mensaje = "Los campos  <b>nombre</b> , <b>contraseña</b> y <b>email</b> son obligatorios";
                                else:
                                    $mensaje = "el usuario ya existe";
                                endif;
                ?>
                <div class="alert alert-danger  fade show peligro" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Error!</strong> <?= $mensaje; ?>.
                </div>

                <?php
                            endif;
                        endif;
                    endif;
                ?>


                <form action="acciones/registro.php" method="POST">
                    <div class="form-group ">
                        <label class="text-warning" for="nombre">Nombre (Obligatorio)</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                    </div>

                    <div class="form-group">
                        <label class="text-warning" for="nombre">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-warning" for="nombre">Usuario</label>
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Ingrese un nombre de usuario">
                    </div>

                    <div class="form-group mt-3">
                        <label class="text-warning" for="nombre">Password/Contraseña (Obligatorio) </label>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Ingrese una contraseña">
                    </div>
                    <div class="form-group">
                        <label class="text-warning" for="email">Email(Obligatorio)</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email">
                    </div>







                    <button class="btn btn-warning text-info btn-block" type="submit" name="btnenviar">Registrate!</button>
                </form>
            </div>
        </div>
    </div>
</div>
