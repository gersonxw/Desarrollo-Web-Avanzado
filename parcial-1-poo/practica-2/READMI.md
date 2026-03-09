# Práctica 2: Herencia y Reutilización de Código en PHP

## 🧩 Explicación de la herencia aplicada
La herencia en PHP significa que una clase puede tomar cosas (atributos y métodos) de otra clase ya hecha.  
En este caso, la clase **Usuario** tiene el nombre y el correo, junto con funciones para obtener y cambiar esos datos.  
La clase **Admin** usa `extends Usuario`, lo que quiere decir que **hereda** todo lo que tiene Usuario y además agrega su propia función `getRol()` que devuelve `"Administrador"`.  
Así evitamos repetir código y aprovechamos lo que ya existe.


## 🔑 Diferencias entre Usuario y Admin
- **Usuario**: Es la clase base, guarda datos generales como nombre y correo.  
- **Admin**: Es una clase que hereda de Usuario y además tiene un rol especial que lo identifica como administrador.  


## 🖥️ Evidencia de ejecución
Cuando se corre el archivo `index.php`, el resultado esperado es:

Práctica 2: Herencia en PHP
Nombre: Carlos
Correo: carlos@gmail.com
Rol: Administrador

Datos actualizados:
Nombre: Carlos Admin
Correo: carlos.admin@gmail.com
Rol: Administrador