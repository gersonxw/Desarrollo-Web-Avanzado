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

$sql = "DELETE FROM alumnos WHERE idAlumno = :idAlumno";
$stmt = $pdo->prepare($sql);
$stmt->execute(["idAlumno" => $idAlumno]);

echo "Alumno eliminado correctamente<br>";
?>