<div class="row justify-content-center">
    <div class="col-10 col-lg-4">
        <div class="card mb-5">
            <div class="card-body registro">
                <h3 class="text-center text-warning py-3">Login</h3>

               
               <?php
                    if(!empty($_GET["estado"])):
                        $estado = $_GET["estado"];
                        
                        if($estado == "error"):

                            if(!empty($_GET["mensaje"])):
                                $mensaje = $_GET["mensaje"];

                                if($mensaje == "campos_obligatorios"):
                                    $mensaje = "Los campos <b>email</b> y <b>password</b> son obligatorios";
                                else:
                                    $mensaje = "No existe usuario";
                                endif;
                
                   
                   
                      
                ?>
               
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
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

               
                <form action="acciones/login.php" method="POST">
                    
                     <div class="form-group mt-3">
                        <label class="text-warning" for="email">Email (obligatorio) </label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su email">
                    </div>
                    
                    
                    <div class="form-group">
                        <label class="text-warning" for="password">Password</label>
                        <input type="password"
                        class="form-control" name="password" id="password" placeholder="*************">
                    </div>

                    <button class="btn btn-warning text-info btn-block" name="btnenviar" type="submit">Ingresá</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>
