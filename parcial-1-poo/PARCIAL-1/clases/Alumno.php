<?php
/**
 * clase alumno
 */
require_once "Usuario.php";

/**
 * alumno hereda de usuario
  */
class Alumno extends Usuario{
   private $matricula;

/**
 * construcctor: recibe nombre,correo ymatricula
 * @param string $nombree
 * @param string $correo
 * @param string $matricula
 */
public function __construct($nombre, $correo, $matricula){
parent::__construct($nombre,$correo);
$this->matricula=$matricula;  //guarda la matricula en el objeto
}

/**
 * obtiene la matricula del alumno
 * @return string
  */
public function getMatricula(){
    return $this->matricula;
}

/**
 * get rol
 * @return string
 */
public function getRol(){
    return "Alumno";
}
}
?>