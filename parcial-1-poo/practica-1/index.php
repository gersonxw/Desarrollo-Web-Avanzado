<?php
// Incluir la clase Usuario 
require_once 'Usuario.php';

// Crear un objeto (instancia) de la clase Usuario
// Se ejecuta el constructor con los valores iniciales
$usuario = new Usuario("Gerson", "gerson@gmail.com");

// Mostrar los valores iniciales usando los métodos getter
echo "Nombre: " . $usuario->getNombre() . "<br>";
echo "Correo: " . $usuario->getCorreo() . "<br>";

// Modificar los valores usando los métodos setter
$usuario->setNombre("José");
$usuario->setCorreo("jose@gmail.com");

// Mostrar los valores actualizados
echo "Nombre actualizado: " . $usuario->getNombre() . "<br>";
echo "Correo actualizado: " . $usuario->getCorreo() . "<br>";
?>