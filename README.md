# GA7-220501096-AA5-EV01 - Diseño y desarrollo de servicios web
# John Jairo Zamudio Agudelo
# FIcha 2977467


## Descripción del proyecto

Se diseñó y desarrolló un servicio web en PHP para:

- Registro de usuarios.
- Inicio de sesión.
- Validaciones de autenticación.
- Almacenamiento de datos en formato JSON.

## Estructura de carpetas

GA7-220501096-AA5-EV01/
├── html/
│   ├── login.html
│   └── register.html
├── css/
│   ├── login.css
│   ├── register.css
│   └── dashboard.css
├── php/
│   ├── login.php
│   ├── register.php
│   ├─ dashboard.php
│   └── usuarios.json
 
## Herramientas utilizadas

- PHP (desde XAMPP).
- HTML y CSS para interfaces.
- JSON para almacenamiento de usuarios.
- Git para versionamiento (repositorio enlazado).
- Validaciones con alertas usando JavaScript desde PHP.

## Instrucciones para ejecutar

1. Clonar o copiar el proyecto en la carpeta:  
   `C:\xampp\htdocs\GA7-220501096-AA5-EV01`

2. Iniciar **Apache** desde XAMPP.

3. Acceder desde el navegador a:  
   [http://localhost/GA7-220501096-AA5-EV01/html/register.html](http://localhost/GA7-220501096-AA5-EV01/html/register.html)

4. Registrar un usuario y luego iniciar sesión.

5. Si los datos son correctos, se muestra un **dashboard de bienvenida**.

## Validaciones incluidas

- Confirmación de contraseña en registro.
- Evitar registros con cédula repetida.
- Mensajes de error tipo `alert()` en JavaScript.
- Protección del dashboard (solo se accede si hay sesión activa).

## Repositorio Git

[Agrega aquí el enlace a tu repositorio en GitHub, GitLab o cualquier plataforma.]

---
