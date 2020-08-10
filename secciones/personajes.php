
<div class="container my-5 ">
    <div class="row">
        <div class="col-12">
            <h2 class="center-block text-center" id="personajes"><i class="fas fa-bat"></i> Personajes <i class="fas fa-bat"></i></h2>
            <hr>
        </div>
    </div>



<div class="row">
   
    <?php

            $carpeta = opendir(RUTA_PERSONAJES); 

            

            while($personaje = readdir($carpeta)): 
                if($personaje == "." || $personaje == "..")
                    continue;

                $imagen = glob("personajes/$personaje/*.png")[0];  
        ?>
   
   
    <div class="col-12 col-md-4 mb-4">
        
                <img src="<?= $imagen ?>" alt="<?= mostrar_nombre($personaje); ?>" class="img-fluid">
                <h3 class="card-title">
                    <?= mostrar_nombre($personaje); ?>
                </h3>
                <p class="card-text">
                    <?= mostrar_descripcion(RUTA_PERSONAJES . "$personaje/descripcion.txt"); ?>
                </p>
            

    </div>
   
    


    <?php
            endwhile;
               
            closedir($carpeta);
        ?>
       
       
           
    </div>
       
       
       
        <div class="row">
        
        <div class="col-12 mb-5">
            <h2 class="center-block text-center" id="personajes"><i class="fas fa-bat"></i> Voces <i class="fas fa-bat"></i></h2>
            <hr class="mb-5">
        </div>
        
        
         <?php

            $carpeta = opendir(RUTA_PERSONAJES); 


            while($personaje = readdir($carpeta)): 
                if($personaje == "." || $personaje == "..")
                    continue;

                $imagen = glob("personajes/$personaje/*.jpg")[0];  
        ?>
        
        
           <div class="col-12 col-md-2 mb-4">
        
                <img src="<?= $imagen ?>" alt="<?= mostrar_nombre($personaje); ?>" class="img-fluid">
                <h3 class="card-title">
                    <?= mostrar_nombre($personaje); ?>
                </h3>
                
            

    </div>
   
    


    <?php
            endwhile;
               
            closedir($carpeta);
        ?>
       
        
        
        
        
        
        
        
        
        
        
        
    </div>
    
</div>
