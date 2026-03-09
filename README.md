# 🏋️‍♂️ GymFlow - Sistema de Gestión de Gimnasio

Proyecto final para la materia de **Administración de Bases de Datos**. 
Desarrollado con Laravel 11, Jetstream (Livewire) y MySQL.

## 👥 Roles del Sistema
- **Admin:** Control total (Pagos, Reportes, Usuarios).
- **Empleado:** Gestión de socios y asistencias.
- **Socio:** Consulta de membresía y perfil.

## 🚀 Instalación para Colaboradores
1. Clonar el repositorio: `git clone https://github.com/Fernando241/gymflow.git`
2. Instalar dependencias: `composer install` y `npm install`
3. Copiar el entorno: `cp .env.example .env`
4. Generar clave: `php artisan key:generate`
5. Configurar DB en `.env` (XAMPP: db_name = gymflow)
6. Correr migraciones y seeders: `php artisan migrate --seed`
7. Iniciar servidor: `php artisan serve` y `npm run dev`

## 🛠 Estructura de Trabajo
- **Ramas:** Crear una rama por funcionalidad (`feature/nombre-vista`).
- **Frontend:** Editar solo archivos en `resources/views` (Blade).