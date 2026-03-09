<?php
class Usuario {
    // Atributos privados
    private $nombre;
    private $correo;

    // Constructor
    public function __construct($nombre, $correo) {
        $this->nombre = $nombre;
        $this->correo = $correo;
    }

    // Getters
    public function getNombre() { return $this->nombre; }
    public function getCorreo() { return $this->correo; }

    // Setters
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setCorreo($correo) { $this->correo = $correo; }
}
?>