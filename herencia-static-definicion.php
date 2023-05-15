<?php
class Concesionario{
    private $precio_final;
    private static $descuento;
    function __construct($gama){

        if($gama == "baja"){
            $this -> precio_final = 20000; 
        }

        else if($gama == "media"){
            $this -> precio_final = 30000;
    }

    else if($gama == "alta"){
        $this -> precio_final = 50000;
    }

}

function aireAcondicionado(){
   return $this -> precio_final += 2000;
}

function eligeColor($color){   
    if($color == "rojo"){
        return $this -> precio_final += 250;
    }

    else if($color == "gris"){
        return $this -> precio_final;
    }

    else if($color == "amarillo"){
        return $this -> precio_final += 300;
    }
}

static function aplica_descuento(){
    self::$descuento = 3000;
}
//El self hace referencia al atributo estatico de la clase.
function get_precioFinal(){
    return $this -> precio_final - self::$descuento;
}
}
?>