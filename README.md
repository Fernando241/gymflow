# GymFlow – Sistema de Gestión de Membresías para Gimnasios

GymFlow es un sistema web desarrollado para la gestión de socios, planes y membresías dentro de un gimnasio. El proyecto se centra principalmente en la administración eficiente de la información, la organización de los datos y la automatización de procesos básicos relacionados con el control de membresías.

Este sistema fue desarrollado como parte del curso de **Administración de Bases de Datos**, aplicando conceptos de modelado relacional, integridad de datos y gestión de información dentro de una aplicación web funcional.

---

## Tecnologías utilizadas

Backend:
- PHP
- Laravel
- MySQL
- Eloquent ORM

Frontend:
- Blade
- Tailwind CSS

Herramientas:
- Git
- GitHub
- Visual Studio Code

---

## Funcionalidades principales

- Registro y gestión de usuarios
- Sistema de roles (admin, empleado, socio)
- Gestión de planes de membresía
- Creación y administración de membresías
- Cálculo automático de días restantes de membresía
- Panel de control personalizado según el rol del usuario
- Visualización de datos del socio y su membresía activa

---

## Estructura de la base de datos

El sistema se basa en un modelo relacional compuesto principalmente por las siguientes entidades:

- **Users**
  - Gestión de usuarios del sistema
  - Roles de acceso
  - Información de contacto y emergencia

- **Planes**
  - Configuración de los diferentes planes disponibles

- **Membresias**
  - Relación entre usuarios y planes
  - Control de fechas de inicio y finalización
  - Registro del precio pagado
  - Estado de la membresía

Las relaciones se gestionan mediante **claves foráneas** garantizando la integridad de los datos.

---

## Control de acceso

El sistema implementa control de acceso basado en roles:

- **Admin**
  - Gestión completa de usuarios, socios y membresías

- **Empleado**
  - Gestión de planes y membresías

- **Socio**
  - Visualización de su información personal y estado de membresía

---

## Dashboard inteligente

El panel principal del sistema adapta su contenido dependiendo del rol del usuario autenticado.

Los socios pueden visualizar:

- Estado de su cuenta
- Información de contacto
- Contacto de emergencia
- Membresía activa
- Fechas de vigencia
- Días restantes de membresía

---

## Autores

Proyecto desarrollado por:

- **Fernando Rolón** – Backend y arquitectura del sistema
- **Dairo** – Implementación frontend
- **Camilo** – Implementación frontend

---

## Objetivo del proyecto

El objetivo principal de GymFlow es demostrar cómo una base de datos bien diseñada puede convertirse en el núcleo de un sistema de gestión funcional, permitiendo organizar información, automatizar procesos y facilitar la toma de decisiones dentro de un entorno real como lo es un gimnasio.