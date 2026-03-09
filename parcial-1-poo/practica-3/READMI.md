# Práctica 3: Sistema con Validaciones y Excepciones

## 📝 Descripción del Sistema
El sistema implementa una jerarquía de usuarios con validaciones y manejo de excepciones:

- **Usuario:** Clase base con atributos nombre y correo (privados). Valida que el nombre no esté vacío y que el correo tenga formato válido.
- **Admin:** Hereda de Usuario. Añade método getRol() que devuelve "Administrador".
- **Alumno:** Hereda de Usuario. Añade atributo matrícula y valida que no esté vacía. getRol() devuelve "Alumno".

## 🔄 Explicación del Flujo de Clases
Usuario (clase base)
↑
|
| |
Admin (hija) Alumno (hija)
+
matrícula



- **Admin** y **Alumno** heredan de **Usuario** usando `extends`
- Las clases hijas pueden usar los métodos de Usuario (`getNombre()`, `setCorreo()`, etc.)
- Cada clase hija implementa su propio `getRol()`
- **Alumno** tiene un atributo extra: `matricula`

## ⚠️ Evidencia del Manejo de Errores

Usuarios válidos:
- Admin: Carlos - carlos@gmail.com → ✅ Funciona
- Alumno: María - maria@gmail.com - A12345 → ✅ Funciona

Usuarios inválidos:
- Admin con correo "correo-mal" →  Error: "Correo no válido: correo-mal"
- Alumno con nombre vacío →  Error: "El nombre no puede estar vacío"
- Alumno con matrícula vacía →  Error: "La matrícula no puede estar vacía"

El programa usa try/catch para capturar los errores y el sistema sigue funcionando.