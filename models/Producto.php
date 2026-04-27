<?php
class Producto {
    private $id;
    private $nombre;
    private $descripcion;
    private $existencia;
    private $precio;

    public function __construct($nombre = "", $descripcion = "", $existencia = 0, $precio = 0.0) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->existencia = $existencia;
        $this->precio = $precio;
    }

    // Getters
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getDescripcion() { return $this->descripcion; }
    public function getExistencia() { return $this->existencia; }
    public function getPrecio() { return $this->precio; }

    // Setters
    public function setId($id) { $this->id = $id; }
    public function setNombre($nombre) { $this->nombre = $nombre; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setExistencia($existencia) { $this->existencia = $existencia; }
    public function setPrecio($precio) { $this->precio = $precio; }
}
?>