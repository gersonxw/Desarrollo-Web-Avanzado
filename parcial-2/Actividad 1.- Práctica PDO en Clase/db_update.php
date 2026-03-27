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

$idAlumno = 1;

$sql = "UPDATE alumnos SET Nombre = :nombre, Apellido = :apellido, Correo = :correo WHERE idAlumno = :idAlumno";
$stmt = $pdo->prepare($sql);

$stmt->execute([
    "nombre" => "Jose Alfonso",
    "apellido" => "Aguilar",
    "correo" => "ja.aguilar@uas.edu.mx",
    "idAlumno" => $idAlumno
]);

echo "Alumno actualizado correctamente<br>";
?>