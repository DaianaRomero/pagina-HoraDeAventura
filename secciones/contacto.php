<div class="row justify-content-center ">
    <div class="col-10 col-lg-4">
        <div class="card mb-5">
            <div class="card-body registro ">
                <h3 class="text-center text-warning py-3">Contacto</h3>

                <?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "error"):

                            if(!empty($_GET["mensaje"])):
                                $mensaje = $_GET["mensaje"];

                                if($mensaje == "campos_obligatorios"):
                                    $mensaje = "Los campos <b>email</b>, <b>checkboxs</b> y <b>comentarios</b> son obligatorios";
                                else:
                                    $mensaje = "";
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


                <form action="acciones/procesar_registro.php" method="POST">
                    <div class="form-group ">
                        <label class="text-warning" for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese su nombre">
                    </div>

                    <div class="form-group">
                        <label class="text-warning" for="apellido">Apellido</label>
                        <input type="text" class="form-control" name="apellido" id="apellido" placeholder="Ingrese su apellido">
                    </div>

                    <div class="form-group">
                        <label class="text-warning" for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email">
                    </div>


                    <div class="form-group">
                        <label class="text-warning" for="comentario">Comentario</label>
                        <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label>Te gustaría saber más acerca de:</label>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="motivos[]" id="juegos" value="juegos">Juegos
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="motivos[]" id="temporadas" value="temporadas">Temporadas
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="motivos[]" id="personajes" value="personajes">Personajes
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="motivos[]" id="otros" value="otros"> Otros
                            </label>
                        </div>
                    </div>

                    <button class="btn btn-warning text-info btn-block" type="submit" name="enviar">Enviar!</button>
                </form>
            </div>
        </div>
    </div>
</div>
