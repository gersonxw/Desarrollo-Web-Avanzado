<?php
require_once 'Usuario.php';

class Alumno extends Usuario {
    /**
     * @var string Matrícula del alumno
     */
    private $matricula;

    /**
     * Constructor de la clase Alumno
     * 
     * @param string $nombre Nombre del alumno
     * @param string $correo Correo del alumno
     * @param string $matricula Matrícula del alumno
     */
    public function __construct($nombre, $correo, $matricula) {
        parent::__construct($nombre, $correo);
        $this->matricula = $matricula;
    }

    /**
     * Obtiene la matrícula del alumno
     * 
     * @return string
     */
    public function getMatricula() {
        return $this->matricula;
    }

    /**
     * Obtiene el rol del alumno
     * 
     * @return string
     */
    public function getRol() {
        return "Alumno";
    }
}
?>