<?php
    $titulo = "Nuevo Lugar";
    $submit = "Crear";

    if(!empty($_GET["id"])):
        $titulo = "Editar Lugar";
        $submit = "Editar";

        $lugares = $_GET["id"];
        
    endif;

?>

<div class="my-5 container ">
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-md-7 ">
            <div class="card card-white p-3 border border-warning rounded shadow  ">
                <div class="card-body text-primary font-weight-bold text-center">
                    <h3 class="text-center animated tada center-block mb-4 p-3 shadow font-weight-bold" id="lugares"><?= $titulo; ?></h3>

                    <?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "error"):
                        if(!empty($_GET["mensaje"])):
                         $mensaje = $_GET["mensaje"];

                                if( ($mensaje == "campos_obligatorios" && $titulo == "Nuevo Lugar") || ($mensaje == "campos_obligatorios" && $titulo == "Editar Lugar") ):
                                    $mensaje = "Los campos <b>Nombre</b> e <b>Imagen</b> son obligatorios";
                                elseif($mensaje=="lugar_existe" && $titulo == "Nuevo Lugar"):
                                    $mensaje =  "Nombre del lugar ya existente. Elija otro por favor";
							elseif($mensaje=="lugar_existe" && $titulo == "Editar Lugar"):
                                    $mensaje =  "Nombre del lugar ya existente. Elija otro";
                                elseif($mensaje=="formato_imagen"):
                                    $mensaje =  "Formato incorrecto";
					else:
                                    $mensaje = "Los campos <b>Titulo</b> y <b>imagen</b> son obligatorios";
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

                    <form action="acciones/<?= strtolower($submit); ?>_lugar.php" method="POST" enctype="multipart/form-data">


                        <?php
                if(isset($lugares)):
            ?>
                        <input type="hidden" name="id" value="<?= $lugares; ?>">
                        <?php
              endif;
             ?>


                        <div class="form-row ">


                            <div class="col">

                                <label for="nombre" class="my-4 ">Nombre Lugar</label>
                                <input type="text" class="form-control border border-warning" name="nombre" id="nombre" placeholder="Nombre del lugar" value="<?= isset($lugares) ? mostrar_nombre($lugares) : ""; ?>">
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
                 if(isset($lugares)):
                ?>
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-6 mx-3  ">
                                            <img src="<?= "../lugares/$lugares/$lugares.jpg" ?>" alt="lugares poster" class="img-fluid  ">
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
                                <button type="submit" class=" px-5 btn btn-primary btn-block rounded-lg shadow "><?= $submit; ?> lugares</button>
                            </div>

                            <div class=" mx-3">
                                <a class="px-5 btn btn-warning btn-block rounded-lg shadow text-white" href="../panel/index.php?seccion=listado_lugares" role="button">Volver atrás</a>
                            </div>


                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
