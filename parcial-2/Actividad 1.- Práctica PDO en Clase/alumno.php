<?php
$host = "localhost";
$db = "escuela";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexion exitosa<br>";
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

$sql = "INSERT INTO alumnos (Nombre, Apellido, Correo) VALUES (:nombre, :apellido, :correo)";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nombre" => "Jose Alfonso",
    "apellido" => "Aguilar",
    "correo" => "ja.aguilar@uas.edu.mx"
]);

echo "Alumno insertado correctamente<br>";
?>