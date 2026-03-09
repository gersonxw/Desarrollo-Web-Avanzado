<?php
// Incluir la clase Usuario (necesario para heredar)
require_once 'Usuario.php';

class Admin extends Usuario {
    
    // Método propio de Admin
    public function getRol() {
        return "Administrador";
    }
    
    
    // se puede usar (getNombre, getCorreo, setNombre, setCorreo)
}
?>