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

$sql = "SELECT * FROM alumnos WHERE idAlumno = :idAlumno";
$stmt = $pdo->prepare($sql);
$stmt->execute(['idAlumno' => $idAlumno]);

$alumno = $stmt->fetch(PDO::FETCH_ASSOC);

if ($alumno) {
    echo "<h3>Alumno encontrado:</h3>";
    echo $alumno['Nombre'] . "<br>";
    echo $alumno['Apellido'] . "<br>";
    echo $alumno['Correo'] . "<br>";
} else {
    echo "Alumno no encontrado<br>";
}
?>