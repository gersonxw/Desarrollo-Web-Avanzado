<?php
// Incluir la clase Admin
require_once 'Admin.php';

echo "<h2>Práctica 2: Herencia en PHP</h2>";

// Crear admin
$admin = new Admin("Carlos", "carlos@gmail.com");

// Mostrar datos
echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: " . $admin->getRol() . "<br>";

echo "<br>";

// Actualizar datos
$admin->setNombre("Carlos Admin");
$admin->setCorreo("carlos.admin@gmail.com");

// Mostrar datos actualizados
echo "Datos actualizados:<br>";
echo "Nombre: " . $admin->getNombre() . "<br>";
echo "Correo: " . $admin->getCorreo() . "<br>";
echo "Rol: " . $admin->getRol() . "<br>";
?>