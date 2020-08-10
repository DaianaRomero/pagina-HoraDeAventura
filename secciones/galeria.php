		<div class="container my-5">

			<div class="row">
				<div class="col-12 mb-5 pb-3">
					<h2 class="center-block text-center" id="galeria"><i class="fas fa-bat"></i> Mejores momentos <i class="fas fa-bat"></i></h2>
					<hr>
				</div>
			</div>



			<div class="card-columns">

				<?php
   foreach($gal as $imagen):
   ?>


				<div class="card-12 card-md-6 card-lg-2 mb-4">
					<a href="<?= $imagen["url"]; ?>" data-fancybox="galeria">
						<img class="img-fluid img-thumbnail " src="<?= $imagen["url"]; ?>" alt="
                <?= $imagen["nombre"]; ?>" class="img-fluid">

					</a>


				</div>


				<?php
        endforeach;
    ?>


			</div>
		<div class="row">
				<div class="col-12 mb-5 pb-3">
					<h2 class="center-block text-center" id="lugares"><i class="fas fa-bat"></i> Lugares <i class="fas fa-bat"></i></h2>
					<hr>
				</div>
			</div>	
			
			 <div class="row">
        
       
        
        
         <?php

            $carpeta = opendir(RUTA_LUGARES);

            while($lugares = readdir($carpeta)):
                if($lugares == "." || $lugares == "..")
                    continue;

                $imagen = glob("lugares/$lugares/*.jpg")[0];  
        ?>
        
        
           <div class="col-12 col-md-4 mb-4">
         <h3 class="card-title text-center mb-4">
                    <?= mostrar_nombre($lugares); ?>
                </h3>
                <img src="<?= $imagen ?>" alt="<?= mostrar_nombre($lugares); ?>" class="img-fluid img-thumbnail shadow">
               
                
            

    </div>
   
    


    <?php
            endwhile;
               
            closedir($carpeta);
        ?>
       
        
        
        
        
        
        
        
        
        
        
        
    </div>
			
		</div>
