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

$sql = "SELECT * FROM alumnos";
$stmt = $pdo->query($sql);

$alumnos = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo "<h3>Listado de alumnos</h3>";
foreach ($alumnos as $alumno) {
    echo $alumno["idAlumno"] . " - " . $alumno["Nombre"] . " " . $alumno["Apellido"] . "<br>";
}
?>