# Sistema de Autenticación PHP

Sistema web desarrollado con PHP y MySQL que permite:

- Registro de usuarios
- Inicio de sesión
- Manejo de sesiones
- Perfil privado
- Actualización de datos
- Cambio seguro de contraseña
- Cierre de sesión

## Tecnologías utilizadas

- PHP
- MySQL
- XAMPP
- HTML

## Requisitos

- XAMPP
- PHP 8+
- MySQL

## Instalación

1. Copiar la carpeta del proyecto en htdocs
2. Crear la base de datos sistema_login
3. Importar la tabla usuarios
4. Ejecutar Apache y MySQL desde XAMPP
5. Abrir:
http://localhost/login_php/login.php

## Seguridad implementada

- password_hash()
- password_verify()
- Validación de sesión
- Protección de páginas privadas