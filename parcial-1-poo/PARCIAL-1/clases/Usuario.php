<?php
/**
 * clase base del sistema
 * contiene nombre y correo
 */
class Usuario {

protected $nombre;
protected $correo;

/**
 * construcctor: recibe nobmre y correo
 * @param  string $nombre
 * @param  string $correo
 */ 
public function  __construct( $nombre,$correo){
    $this->nombre= $nombre;
    $this->setCorreo($correo);
    }

    /**
     * valida y asigna el correo
     * @param string $correo
     * @throws Exception si el correo no es valido
     */
    public function setCorreo($correo){
         if(!filter_var($correo,  FILTER_VALIDATE_EMAIL)){
       throw new Exception ("correo no valido: ". $correo);
        }
    $this->correo=$correo;  //asigna del correo
 }

/**
 *  obtiene el nombre
 * @return string
 */
 public function getNombre  (){
     return $this->nombre;
      }

/**
 *  obtiene el correo
 * @return string
 */
public function  getCorreo (){
    return $this-> correo;
    }
}
?>