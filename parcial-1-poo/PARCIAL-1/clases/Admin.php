<?php
/**
 * Clase Admin que hereda de Usuario
 * representa a un administrador
 */
require_once "Usuario.php"; 

/**
 * Clase Admin que extiende Usuario
*/
class Admin extends Usuario{
  /**
     * obtiene el rol del usuario
     * 
     * @return string
     */
    public function getRol (){
        return"administrador";
}
}
?>