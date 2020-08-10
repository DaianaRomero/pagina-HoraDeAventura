<?php
    $titulo = "Nuevo Personaje";
    $submit = "Crear";

    if(!empty($_GET["id"])):
        $titulo = "Editar Personaje";
        $submit = "Editar";

        $personaje = $_GET["id"];
        
    endif;

?>

<div class="my-5 container ">
    <div class="row justify-content-center mt-4">
        <div class="col-12 col-md-7 ">
            <div class="card card-white p-3 border border-warning rounded shadow  ">
                <div class="card-body text-primary font-weight-bold text-center">
                    <h3 class="text-center animated tada center-block mb-4 p-3 shadow font-weight-bold" id="personajes"><?= $titulo; ?></h3>

                    <?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "error"):
                        if(!empty($_GET["mensaje"])):
                         $mensaje = $_GET["mensaje"];

                                if( ($mensaje == "campos_obligatorios" && $titulo == "Nuevo Personaje") || ($mensaje == "campos_obligatorios" && $titulo == "Editar Personaje") ):
                                    $mensaje = "Los campos <b>Nombre</b> e <b>Imagen</b> son obligatorios";
                                elseif($mensaje=="personaje_existe"):
                                    $mensaje =  "Nombre del personaje ya existente. Elija otro";
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

                    <form action="acciones/<?= strtolower($submit); ?>_personaje.php" method="POST" enctype="multipart/form-data">


                        <?php
                if(isset($personaje)):
            ?>
                        <input type="hidden" name="id" value="<?= $personaje; ?>">
                        <?php
              endif;
             ?>


                        <div class="form-row ">


                            <div class="col">

                                <label for="nombre" class="mt-4 ">Nombre Personaje</label>
                                <input type="text" class="form-control border border-warning" name="nombre" id="nombre" placeholder="Nombre del personaje" value="<?= isset($personaje) ? mostrar_nombre($personaje) : ""; ?>">
                            </div>

                            <div class="col">
                                <label for="nombre" class="mt-4 ">Nombre Voz</label>
                                <input type="text" class="form-control border border-warning" name="nombre2" id="nombre" placeholder="Nombre de actor" value="<?= isset($personaje) ? mostrar_descripcion(RUTA_PERSONAJES . "$personaje/voz.txt") : ""; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col">

                                    <label for="imagen" class="mt-4">Imagen Personaje</label>
                                    <input type="file" class="form-control-file " name="imagen" id="imagen" aria-describedby="fileHelpId" accept="image/png">
                                    <small id="fileHelpId" class="form-text text-muted">El archivo tiene que ser una imagen <b class="text-warning">png</b></small>


                                </div>

                                <div class="col">
                                    <label for="imagen" class="mt-4">Imagen voz</label>
                                    <input type="file" class="form-control-file " name="imagen2" id="imagen2" aria-describedby="fileHelpId" accept="image/jpeg">
                                    <small id="fileHelpId" class="form-text text-muted">El archivo tiene que ser una imagen <b class="text-warning">jpg</b></small>



                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="form-row d-flex align-items-center">
                                <div class="col">



                                    <?php
                 if(isset($personaje)):
                ?>
                                    <div class="row">
                                        <div class="col-6 mx-3 ">
                                            <img src="<?= "../personajes/$personaje/$personaje.png" ?>" alt="personaje foto" class="img-fluid  ml-5">
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            ?>
                                </div>

                                <div class="col">


                                    <?php
                 if(isset($personaje)):
                ?>
                                    <div class="row">
                                        <div class="col-6 mx-3  ">
                                            <img src="<?= "../personajes/$personaje/$personaje.jpg" ?>" alt="personaje foto" class="img-fluid  ml-5">
                                        </div>
                                    </div>
                                    <?php
                                endif;
                            ?>

                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="descripcion" class="mb-4">Descripción</label>
                            <textarea class="form-control border border-warning" name="descripcion" id="descripcion" rows="4"><?=isset($personaje) ? mostrar_descripcion(RUTA_PERSONAJES . "$personaje/descripcion.txt", true) : "";?></textarea>

                        </div>
                    <div class="btn-group btn-group-lg d-flex justify-content-around ">
                       <div class=" mx-3">
                        <button type="submit" class=" px-5 btn btn-primary btn-block rounded-lg shadow "><?= $submit; ?> personaje</button>
                        </div>
                        
                        <div class=" mx-3">
<a class= "px-5 btn btn-warning btn-block rounded-lg shadow text-white" href="../panel/index.php" role="button">Volver atrás</a>
</div>
                       
                        
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
