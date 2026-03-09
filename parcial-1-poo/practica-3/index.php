<?php
/**
 * Archivo principal para probar el sistema de usuarios
 * Demuestra el manejo de excepciones con try/catch
 */
require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';

echo "<h2>Práctica 3: Excepciones</h2>";

echo "<h3>--- Usuarios Válidos ---</h3>";

/**
 * Prueba de Admin con datos correctos
 */
try {
    $objAdmin = new Admin("Carlos", "carlos@gmail.com");
    echo "Admin: " . $objAdmin->getNombre() . " - " . $objAdmin->getCorreo() . " - Rol: " . $objAdmin->getRol() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

/**
 * Prueba de Alumno con datos correctos
 */
try {
    $objAlumno = new Alumno("María", "maria@gmail.com", "A12345");
    echo "Alumno: " . $objAlumno->getNombre() . " - " . $objAlumno->getCorreo() . " - Matrícula: " . $objAlumno->getMatricula() . " - Rol: " . $objAlumno->getRol() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<h3>--- Usuarios Inválidos ---</h3>";

/**
 * Prueba de Admin con correo inválido
 * Debe lanzar excepción
 */
try {
    $objAdmin2 = new Admin("Pedro", "correo-mal");
    echo "Admin creado<br>";
} catch (Exception $e) {
    echo "Error en Admin: " . $e->getMessage() . "<br>";
}

/**
 * Prueba de Alumno con nombre vacío
 * Debe lanzar excepción
 */
try {
    $objAlumno2 = new Alumno("", "juan@gmail.com", "B67890");
    echo "Alumno creado<br>";
} catch (Exception $e) {
    echo "Error en Alumno: " . $e->getMessage() . "<br>";
}

/**
 * Prueba de Alumno con matrícula vacía
 * Debe lanzar excepción
 */
try {
    $objAlumno3 = new Alumno("Laura", "laura@gmail.com", "");
    echo "Alumno creado<br>";
} catch (Exception $e) {
    echo "Error en Alumno: " . $e->getMessage() . "<br>";
}

echo "<h3>--- Usuario Válido (después de errores) ---</h3>";

/**
 * Prueba de Admin correcto para demostrar
 * que el programa sigue ejecutándose
 */
try {
    $objAdmin3 = new Admin("Roberto", "roberto@yahoo.com");
    echo "Admin: " . $objAdmin3->getNombre() . " - " . $objAdmin3->getCorreo() . " - Rol: " . $objAdmin3->getRol() . "<br>";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "<br>";
}

echo "<br><strong> El programa sigue aunque haya errores</strong>";
?>