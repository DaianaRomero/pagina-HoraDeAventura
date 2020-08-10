<?php
    $titulo = "Nueva Temporada";
    $submit = "Crear";

    if(!empty($_GET["id"])):
        $titulo = "Editar Temporada";
        $submit = "Editar";

        $temporada = $_GET["id"];
        
    endif;

?>

<div class="my-5 container ">
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-md-7 ">
            <div class="card card-white p-3 border border-warning rounded shadow  ">
                <div class="card-body text-primary font-weight-bold text-center">
                    <h3 class="text-center animated tada center-block mb-4 p-3 shadow font-weight-bold" id="temporadas"><?= $titulo; ?></h3>

                    <?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "error"):
                        if(!empty($_GET["mensaje"])):
                         $mensaje = $_GET["mensaje"];

                                if( ($mensaje == "campos_obligatorios" && $titulo == "Nueva Temporada") || ($mensaje == "campos_obligatorios" && $titulo == "Editar Temporada") ):
                                    $mensaje = "Los campos <b>Nombre</b> e <b>Imagen</b> son obligatorios";
                                elseif($mensaje=="temporada_existe"):
                                    $mensaje =  "Nombre de la temporada ya existente. Elija otro";
                                elseif($mensaje=="formato_imagen"):
                                    $mensaje =  "Formato incorrecto";
                                endif;
                            
                ?>
                    <div class="animated tada  alert alert-danger  fade show " role="alert">
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

                    <form action="acciones/<?= strtolower($submit); ?>_temporada.php" method="POST" enctype="multipart/form-data">


                        <?php
                if(isset($temporada)):
            ?>
                        <input type="hidden" name="id" value="<?= $temporada; ?>">
                        <?php
              endif;
             ?>


                        <div class="form-row ">


                            <div class="col">

                                <label for="nombre" class="my-4 ">Nombre Temporada</label>
                                <input type="text" class="form-control border border-warning" name="nombre" id="nombre" placeholder="Numero de temporada" value="<?= isset($temporada) ? mostrar_nombre($temporada) : ""; ?>">
                            </div>



                        </div>
                        <div class="form-row ">




                            <div class="col">
                                <label for="descripcion" class="my-4">Descripción</label>
                                <textarea class="form-control border border-warning" name="descripcion" id="descripcion" rows="4"><?=isset($temporada) ? mostrar_descripcion(RUTA_TEMPORADAS . "$temporada/descripcion.txt", true) : "";?></textarea>

                            </div>

                        </div>

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">

                                    <label for="imagen" class="mt-4">Imagen</label>
                                    <input type="file" class="form-control-file " name="imagen" id="imagen" aria-describedby="fileHelpId" accept="image/jpeg">
                                    <small id="fileHelpId" class="form-text text-muted">El archivo tiene que ser una imagen <b class="text-warning">jpg</b></small>


                                </div>


                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-row d-flex align-items-center">
                                <div class="col">



                                    <?php
                 if(isset($temporada)):
                ?>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-6 mx-3  ">
                                            <img src="<?= "../temporadas/$temporada/$temporada.jpg" ?>" alt="temporada poster" class="img-fluid  ">
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            ?>
                                </div>

                            </div>
                        </div>



                        <div class="btn-group btn-group-lg d-flex justify-content-around ">
                            <div class=" mx-3">
                                <button type="submit" class=" px-5 btn btn-primary btn-block rounded-lg shadow "><?= $submit; ?> temporada</button>
                            </div>

                            <div class=" mx-3">
                                <a class="px-5 btn btn-warning btn-block rounded-lg shadow text-white" href="../panel/index.php?seccion=listado_temporadas" role="button">Volver atrás</a>
                            </div>


                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
