<?php

function loadClasses($Classe) {
    
    $wayClasses[0] = "./src/classes/".$Classe.'.php';
    $wayClasses[1] = './src/controllers/'.$Classe.'.php';
    $wayClasses[2] = './src/'.$Classe.'.php';
   
    $size = count($wayClasses);
    
    for($i=0; $i<$size; $i++){
        
        if(is_file($wayClasses[$i])){
            
            require $wayClasses[$i];
            $i = $size;
        }
    }  
}

spl_autoload_register('loadClasses');