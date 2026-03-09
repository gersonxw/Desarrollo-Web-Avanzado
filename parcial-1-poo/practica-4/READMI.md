# Práctica 4: Integración POO + Herencia + Validaciones + Excepciones

## 🎯 Objetivo
Construir un mini-sistema POO en PHP que integra encapsulamiento, herencia, polimorfismo, validaciones y manejo de excepciones.

## 📋 Requisitos
- PHP 8+
- XAMPP (Apache)
- Navegador web

## 📁 Estructura del Proyecto
practica-4/
├── clases/
│ ├── Usuario.php
│ ├── Admin.php
│ ├── Alumno.php
│ └── Invitado.php
├── index.php
└── README.md

## 📊 Evidencia Esperada

### Tabla de usuarios válidos:
| Nombre | Correo | Rol | Matrícula | Empresa |
|--------|--------|-----|-----------|---------|
| Carlos | carlos@gmail.com | Administrador | — | — |
| María | maria@gmail.com | Alumno | A12345 | — |
| Laura | laura@hotmail.com | Invitado | — | Empresa XYZ |

### Error controlado:

El sistema captura la excepción con try/catch y muestra el mensaje sin detener la ejecución.
