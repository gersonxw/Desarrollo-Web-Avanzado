<?php
$host = "localhost";
$db = "escuela";
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ❌ Estaba: ATTR_ERROR_ON_OVERWRITE
    echo "conexion exitosa<br>"; // ❌ Estaba: exitosachr>
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>