<?php
/**
 * Clase base para usuarios del sistema
 */
class Usuario {
    /**
     * @var string Nombre del usuario
     */
    protected $nombre;
    
    /**
     * @var string Correo del usuario
     */
    protected $correo;

    /**
     * Constructor con validación de correo
     * 
     * @param string $nombre Nombre del usuario
     * @param string $correo Correo del usuario
     * @throws Exception Si el correo no es válido
     */
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        $this->setCorreo($correo);
    }

    /**
     * Obtiene el nombre del usuario
     * 
     * @return string
     */
    public function getNombre() { 
        return $this->nombre; 
    }
    
    /**
     * Obtiene el correo del usuario
     * 
     * @return string
     */
    public function getCorreo() { 
        return $this->correo; 
    }

    /**
     * Establece y valida el correo
     * 
     * @param string $correo Correo a validar
     * @throws Exception Si el correo no es válido
     */
    public function setCorreo($correo) {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo inválido: " . $correo);
        }
        $this->correo = $correo;
    }
}
?>