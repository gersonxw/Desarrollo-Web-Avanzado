<?php
/**
 * Clase base para usuarios del sistema
 */
class Usuario {
    /**
     * @var string Nombre del usuario
     */
    private $nombre;
    
    /**
     * @var string Correo del usuario
     */
    private $correo;

    /**
     * Constructor de la clase
     * 
     * @param string $nombre Nombre del usuario
     * @param string $correo Correo del usuario
     */
    public function __construct($nombre, $correo) {
        $this->setNombre($nombre);
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
     * Establece el nombre del usuario
     * 
     * @param string $nombre Nombre a asignar
     * @throws Exception Si el nombre está vacío
     */
    public function setNombre($nombre) {
        if (empty($nombre)) {
            throw new Exception("El nombre no puede estar vacío");
        }
        $this->nombre = $nombre;
    }

    /**
     * Establece el correo del usuario
     * 
     * @param string $correo Correo a asignar
     * @throws Exception Si el correo no tiene formato válido
     */
    public function setCorreo($correo) {
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Correo no válido: " . $correo);
        }
        $this->correo = $correo;
    }
}
?>