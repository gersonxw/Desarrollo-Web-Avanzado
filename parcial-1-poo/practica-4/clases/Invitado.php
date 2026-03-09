<?php
require_once 'Usuario.php';

class Invitado extends Usuario {
    /**
     * @var string Empresa del invitado
     */
    private $empresa;

    /**
     * Constructor de la clase Invitado
     * 
     * @param string $nombre Nombre del invitado
     * @param string $correo Correo del invitado
     * @param string $empresa Empresa del invitado
     */
    public function __construct($nombre, $correo, $empresa) {
        parent::__construct($nombre, $correo);
        $this->empresa = $empresa;
    }

    /**
     * Obtiene la empresa del invitado
     * 
     * @return string
     */
    public function getEmpresa() {
        return $this->empresa;
    }

    /**
     * Obtiene el rol del invitado
     * 
     * @return string
     */
    public function getRol() {
        return "Invitado";
    }
}
?>