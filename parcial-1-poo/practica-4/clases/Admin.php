<?php
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
?>*