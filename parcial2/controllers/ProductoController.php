<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Producto.php';

class ProductoController {
    private $connection;

    public function __construct() {
        $db = new Database();
        $this->connection = $db->getConnection();
    }

    public function crear(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, descripcion, existencia, precio) 
                VALUES (:nombre, :descripcion, :existencia, :precio)";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':nombre' => $producto->getNombre(),
            ':descripcion' => $producto->getDescripcion(),
            ':existencia' => $producto->getExistencia(),
            ':precio' => $producto->getPrecio()
        ]);
    }

    public function listar() {
        $sql = "SELECT * FROM productos ORDER BY id DESC";
        $stmt = $this->connection->query($sql);
        return $stmt->fetchAll();
    }

    public function buscar($termino) {
        $sql = "SELECT * FROM productos 
                WHERE nombre LIKE :termino 
                OR descripcion LIKE :termino 
                ORDER BY id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(':termino', '%' . $termino . '%');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function obtenerPorId($id) {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch();
    }

    public function actualizar(Producto $producto) {
        $sql = "UPDATE productos SET 
                nombre = :nombre, 
                descripcion = :descripcion, 
                existencia = :existencia, 
                precio = :precio 
                WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([
            ':id' => $producto->getId(),
            ':nombre' => $producto->getNombre(),
            ':descripcion' => $producto->getDescripcion(),
            ':existencia' => $producto->getExistencia(),
            ':precio' => $producto->getPrecio()
        ]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}
?>