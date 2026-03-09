<?php
/**
 * Clase que representa un Administrador
 * Hereda de Usuario
 */
require_once 'Usuario.php';

class Admin extends Usuario {
    /**
     * Obtiene el rol del usuario
     * 
     * @return string
     */
    public function getRol() {
        return "Administrador";
    }
}
?>