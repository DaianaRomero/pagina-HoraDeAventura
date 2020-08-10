<div class="container my-5 ">
    <div class="row">
        <div class="col-12">
            <h2 class="center-block text-center  mt-4 mb-4"><i class="fas fa-bat"></i> Datos curiosos <i class="fas fa-bat"></i></h2>
            <hr>
        </div>
    </div>
</div>



<div class="container d-flex justify-content-center" id='acerca'>
    <div class="row text-center">
        <?php
            foreach($datos1 as $dato1):
        ?>

        <div class="col-12">
            <div class="card">
                <div class="card-body text-dark">
                    <h3 class="card-title"><?=$dato1["titulo"]; ?></h3>

                    <p class="card-text">
                        <?=$dato1["texto"]; ?>
                    </p>

                </div>

                <div class="d-flex justify-content-center">
                    <img class=" col-6 " src="<?=$dato1["imagen1"]; ?>" alt="imagen dato">
                    <img class=" col-6" src="<?=$dato1["imagen2"]; ?>" alt="imagen dato">
                </div>
            </div>



        </div>

        <?php
                endforeach;
         ?>



        <?php
            foreach($datos2 as $dato2):
        ?>

        <div class="col-12">
            <div class="card">
                <div class="card-body text-dark">
                    <h3 class="card-title"><?=$dato2["titulo"]; ?></h3>

                    <p class="card-text">
                        <?=$dato2["texto"]; ?>
                    </p>

                </div>

                <div class="d-flex justify-content-center">
                    <img class=" col-6 " src="<?=$dato2["imagen1"]; ?>" alt="imagen dato ">

                </div>
            </div>



        </div>

        <?php
                endforeach;
         ?>








    </div>
</div>
