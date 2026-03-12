<?php
// incluir las clases
require_once "clases/Admin.php";
require_once "clases/Alumno.php";
require_once "clases/Usuario.php";
echo "<h2>parcial 1:integracion poo</h2>";
$Usuario =[];
$errormsj="";

try{
    $Usuario[] =new Admin ("julian", "jul@gmail.com");
    $Usuario[] = new Alumno("perez","perezty@gmail.com", "129532");
    $Usuario[] = new Alumno("abigail", "correo-mal", "99999"); //este lanza error

}  catch (Exception $error){
$errormsj = "error: " . $error->getMessage(); 
     }

   if ($errormsj != "") echo "<p>$errormsj</p>";
echo "<table border='1'>";
echo "<tr><th>Nombre</th><th>Correo</th><th>Rol</th><th>Matrícula</th></tr>";
foreach ($Usuario as $u) {
echo "<tr>";
echo "<td>" . $u->getNombre() . "</td>"; 
echo "<td>" . $u->getCorreo() . "</td>";
echo "<td>" . $u->getRol()    . "</td>";
echo "<td>" . ($u instanceof Alumno ? $u->getMatricula() : "—") . "</td>"; //muestra matricula si es alumno
  echo "</tr>";
}
  echo "</table>";
  ?>