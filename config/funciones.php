<?php

function logo($seccion)
    {
        if ($seccion === "home" || empty($seccion) ):
            return "img/logo.png";
        else:
            return "img/logo1.png";
        endif;
    }


$g=mktime(12, 12, 30, 12, 12, 2019 );

function mostrar_tiempo($g,$seccion){
  $a=strtotime("+12 days",$g);
    $b=date("d/m/Y G:i:s",$a);
    
    if ($seccion === "home" || empty($seccion) ):
    
    
    return "Especial de Navidad: $b";
    
    endif;
    
} 
 $x= "fas fa-candy-cane";
function icono($seccion,$x)
    {
        if ($seccion === "home" || empty($seccion) ):
            return $x;
      
        endif;
    }
$tono= "<audio id='tono' preload='auto'>
        <source src='tono/ending.mp3'>
    </audio>";
function tono($seccion,$tono)
	
    {
        if ($seccion === "home" || empty($seccion) ):
            return $tono ;
      
        endif;
    }


function activo(){
        echo "active";
}




function mostrar_nombre($nombre){
    
    $funcion=ucwords(str_replace("_"," ",$nombre));
    
    return $funcion;
}



function crear_nombre($nombre){
    
    $funcion2=strtolower(str_replace(" ","_",$nombre));
    
    return  $funcion2;
}

function mayus($descripcion){
	
    $may=ucfirst($descripcion);
	
	 return $may;
}

function mostrar_descripcion($ruta_archivo, $editar = false){
   
    if($editar)
                      
        $descripcion = file_exists($ruta_archivo) ? file_get_contents($ruta_archivo) : "";
    
    else
                                                 
        $descripcion = file_exists($ruta_archivo) ? nl2br(file_get_contents($ruta_archivo)) : 
    "Sin descripción je je";

    return $descripcion;
}
