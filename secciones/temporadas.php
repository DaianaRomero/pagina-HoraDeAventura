
<div class="container my-5 ">
    <div class="row">
        <div class="col-12 mb-5">
            <h2 class="center-block text-center " id="temporadas"><i class="fas fa-bat"></i> Temporadas <i class="fas fa-bat"></i></h2>
            <hr>
        </div>
    </div>



<div class="row">
   
    <?php

            $carpeta = opendir(RUTA_TEMPORADAS);

           


            while($temporada = readdir($carpeta)): 
                if($temporada == "." || $temporada == "..")
                    continue;

                $imagen = glob("temporadas/$temporada/*.jpg")[0]; 
        ?>
   
   
    <div class="col-12 col-md-4 mb-4">
                <h3 class="card-title text-center">
                    <?= mostrar_nombre($temporada); ?>
                </h3>
                <img src="<?= $imagen ?>" alt="<?= mostrar_nombre($temporada); ?>" class="img-fluid img-thumbnail">
                
                <p class="card-text mt-3">
                    <?= mostrar_descripcion(RUTA_TEMPORADAS . "$temporada/descripcion.txt"); ?>
                </p>
            

    </div>
   
    


    <?php
            endwhile;
              
            closedir($carpeta);
        ?>
       
       
           
    </div>
       
       
       
        
    
</div>
