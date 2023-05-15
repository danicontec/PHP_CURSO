<?php

//En php 8 en vez de hacer el constructor con el nombre de la clase, este se define con la palabra __construct(),
//dos guiones bajos y dentro el codigo que queramos poner en el constructor, sino no funcionara.
//el modificador protected en este caso permite que la herencia lea los atributos de la superclase.

class Coche{

protected $ruedas;
protected $color;
protected $motor;
protected $maletero;

function __construct(){
    $this-> ruedas = 69;
    $this-> color = "gris";
    $this-> motor = 1600;
    $this-> maletero = false;
}

function arrancar(){
    echo "El coche ha arrancado <br>";
}

function girar(){
    echo "El coche ha girado <br>";
}

function acelerar(){
    echo "El coche ha acelerado <br>";
}

function frenar(){
    echo "El coche ha frenado <br>";
}

function setRuedas($ruedasCoche){
    $this-> ruedas = $ruedasCoche;
}

function getRuedas(){
    return $this-> ruedas;
}

function setMotor($motorCoche){
    $this-> motor = $motorCoche;
}

function getMotor(){
    return $this -> motor;
}
//funcion que comarte a la clase hija
function compartir(){
    echo "Esta funcion se comparte entre las dos clases<br>";
}

}

class Camion extends Coche{

var $ruedas;
var $color;
var $motorcamion;
var $maletero;

function __construct(){
    $this-> ruedas = 6;
    $this-> color = "gris";
    $this-> motor = 1600;
    $this-> maletero = false;
}
//sobrecarga de metodos, se comparten en herencia pero modifican sus datos.
function arrancar(){
    //aqui llama a la superclase con parent, por lo que generara dos codios el del padre y el del hijo.
    parent::arrancar();
    echo "El camion ha arrancado <br>";
}

function girar(){
    echo "El camion ha girado <br>";
}

function acelerar(){
    echo "El camion ha acelerado <br>";
}

function frenar(){
    echo "El camion ha frenado <br>";
}
//metodo propio de la clase
function setRuedas($ruedasCamion){
    $this-> ruedas = $ruedasCamion;
}
}
?>