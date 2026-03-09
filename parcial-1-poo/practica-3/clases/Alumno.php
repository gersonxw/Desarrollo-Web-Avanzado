<?php
/**
 * Clase que representa un Alumno
 * Hereda de Usuario y agrega matrícula
 */
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
        $this->setMatricula($matricula);
    }

    /**
     * Obtiene el rol del alumno
     * 
     * @return string
     */
    public function getRol() {
        return "Alumno";
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
     * Establece la matrícula del alumno
     * 
     * @param string $matricula Matrícula a asignar
     * @throws Exception Si la matrícula está vacía
     */
    public function setMatricula($matricula) {
        if (empty($matricula)) {
            throw new Exception("La matrícula no puede estar vacía");
        }
        $this->matricula = $matricula;
    }
}
?>