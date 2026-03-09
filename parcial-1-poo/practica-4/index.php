<?php
require_once 'clases/Admin.php';
require_once 'clases/Alumno.php';
require_once 'clases/Invitado.php';

echo "<h2>Práctica 4: Integración POO</h2>";

$usuarios = [];
$errorMensaje = "";

try {
    // Usuarios VÁLIDOS
    $objAdmin = new Admin("Carlos", "carlos@gmail.com");
    $usuarios[] = $objAdmin;
    
    $objAlumno = new Alumno("María", "maria@gmail.com", "A12345");
    $usuarios[] = $objAlumno;
    
    $objInvitado = new Invitado("Laura", "laura@hotmail.com", "Empresa XYZ");
    $usuarios[] = $objInvitado;
    
    // Usuario INVÁLIDO (correo malo)
    $objInvalido = new Admin("Pedro", "correo-mal");
    $usuarios[] = $objInvalido;
    
} catch (Exception $e) {
    $errorMensaje = "Error: " . $e->getMessage();
}

if (!empty($errorMensaje)) {
    echo "<p>" . $errorMensaje . "</p>";
}

echo "<h3>Usuarios registrados:</h3>";
echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Correo</th><th>Rol</th><th>Matrícula</th><th>Empresa</th></tr>";

foreach ($usuarios as $objUsuario) {
    echo "<tr>";
    echo "<td>" . $objUsuario->getNombre() . "</td>";
    echo "<td>" . $objUsuario->getCorreo() . "</td>";
    echo "<td>" . $objUsuario->getRol() . "</td>";
    
    if ($objUsuario instanceof Alumno) {
        echo "<td>" . $objUsuario->getMatricula() . "</td>";
    } else {
        echo "<td>—</td>";
    }
    
    if ($objUsuario instanceof Invitado) {
        echo "<td>" . $objUsuario->getEmpresa() . "</td>";
    } else {
        echo "<td>—</td>";
    }
    
    echo "</tr>";
}

echo "</table>";
echo "<br>Programa terminado";
?>