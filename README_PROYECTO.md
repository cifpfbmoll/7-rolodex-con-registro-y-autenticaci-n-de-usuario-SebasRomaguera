# 📇 Proyecto Rolodex - Migración a Laravel con Autenticación

## 🎯 Objetivo del Proyecto

Este repositorio contiene **dos implementaciones** del sistema Rolodex (gestión de contactos):

1. **Versión Original**: CodeIgniter 4 (sin autenticación)
2. **Versión Nueva**: Laravel 12 + Breeze (con autenticación multi-usuario) ⭐

## 📁 Estructura del Repositorio

```
7-rolodex-con-registro-y-autenticaci-n-de-usuario-SebasRomaguera/
│
├── 📂 CodeIgniter 4 (Versión Original)
│   ├── app/
│   │   ├── Controllers/
│   │   │   └── Contacts.php
│   │   └── Views/
│   │       └── contacts/
│   ├── public/
│   ├── writable/
│   │   └── contacts.csv          # Almacenamiento en CSV
│   ├── examples/
│   │   └── sample-contacts.csv
│   └── INSTALACION.md
│
└── 📂 laravel-rolodex/ (Versión Nueva ⭐)
    ├── app/
    │   ├── Http/Controllers/
    │   │   └── ContactController.php
    │   ├── Models/
    │   │   ├── Contact.php
    │   │   └── User.php
    │   └── Policies/
    │       └── ContactPolicy.php
    ├── database/
    │   ├── migrations/
    │   └── database.sqlite         # Base de datos
    ├── resources/views/
    │   └── contacts/
    ├── PROYECTO_ROLODEX.md        # Documentación completa
    ├── INSTALACION.md              # Guía de instalación
    └── COMPARATIVA.md              # Comparativa técnica
```

## ✨ Nuevas Características (Laravel + Breeze)

### 🔐 Autenticación Completa
- ✅ Registro de usuarios
- ✅ Login/Logout
- ✅ Recuperación de contraseña
- ✅ Gestión de perfil
- ✅ Verificación de email (opcional)

### 👥 Multi-Usuario
- ✅ Cada usuario tiene sus propios contactos
- ✅ Aislamiento total de datos entre usuarios
- ✅ Políticas de autorización (ContactPolicy)

### 💾 Base de Datos Relacional
- ✅ SQLite/MySQL/PostgreSQL
- ✅ Migraciones versionadas
- ✅ Relaciones User → Contacts
- ✅ Integridad referencial

### ⚡ Funcionalidades Mejoradas
- ✅ **Crear** contactos
- ✅ **Editar** contactos (NUEVO)
- ✅ **Eliminar** contactos (NUEVO)
- ✅ **Importar** CSV
- ✅ **Exportar** CSV
- ✅ Validación robusta
- ✅ Mensajes de éxito/error

## 🚀 Inicio Rápido

### Opción 1: Versión CodeIgniter 4 (Original)

```bash
# Instalar dependencias
composer install

# Iniciar servidor
php spark serve
```

Visita: `http://localhost:8080`

📖 **Documentación**: Ver `INSTALACION.md` en la raíz

### Opción 2: Versión Laravel + Breeze (Recomendada ⭐)

```bash
# Ir al directorio
cd laravel-rolodex

# Instalar dependencias
composer install
npm install

# Configurar base de datos
php artisan migrate

# Compilar assets
npm run build

# Iniciar servidor
php artisan serve
```

Visita: `http://localhost:8000`

📖 **Documentación completa**: Ver `laravel-rolodex/INSTALACION.md`

## 📊 Comparación Rápida

| Característica | CodeIgniter 4 | Laravel + Breeze |
|----------------|---------------|------------------|
| **Autenticación** | ❌ No | ✅ Completa |
| **Multi-usuario** | ❌ No | ✅ Sí |
| **Base de datos** | CSV | SQLite/MySQL |
| **Editar contactos** | ❌ No | ✅ Sí |
| **Eliminar contactos** | ❌ No | ✅ Sí |
| **Seguridad** | ⚠️ Básica | ✅ Robusta |
| **Escalabilidad** | ⚠️ Limitada | ✅ Alta |

## 📚 Documentación

### General
- 📄 `INSTALACION.md` - Instalación versión CodeIgniter 4

### Laravel + Breeze (en carpeta `laravel-rolodex/`)
- 📄 `PROYECTO_ROLODEX.md` - Documentación completa del proyecto
- 📄 `INSTALACION.md` - Guía detallada de instalación
- 📄 `COMPARATIVA.md` - Análisis técnico comparativo

## 🎓 Propósito Académico

Este proyecto demuestra:

1. **Migración de frameworks**: CodeIgniter 4 → Laravel
2. **Implementación de autenticación**: Uso de Laravel Breeze
3. **Arquitectura multi-usuario**: Aislamiento de datos por usuario
4. **Mejores prácticas**: MVC, ORM, Policies, Migrations
5. **Seguridad**: CSRF, XSS, SQL Injection, Password Hashing

## 🏆 Recomendación

Para **aprendizaje** y **proyectos reales**, se recomienda la **versión Laravel + Breeze** porque:

- ✅ Implementa autenticación completa desde el inicio
- ✅ Soporta múltiples usuarios con seguridad
- ✅ Usa una base de datos relacional robusta
- ✅ Tiene mejor arquitectura y escalabilidad
- ✅ Incluye todas las funcionalidades CRUD
- ✅ Está preparada para producción

## 💻 Requisitos

### Para CodeIgniter 4
- PHP 8.1 o superior
- Composer

### Para Laravel + Breeze
- PHP 8.2 o superior
- Composer
- Node.js y NPM
- SQLite/MySQL/PostgreSQL

## 🛠️ Tecnologías Utilizadas

### CodeIgniter 4 (Original)
- CodeIgniter 4.x
- Bootstrap 5
- CSV para almacenamiento

### Laravel + Breeze (Nueva)
- Laravel 12.x
- Laravel Breeze
- Tailwind CSS
- Alpine.js
- Vite
- SQLite/MySQL

## 📸 Capturas de Pantalla

### CodeIgniter 4
- Lista de contactos (sin usuarios)
- Formulario de añadir contacto
- Importación CSV

### Laravel + Breeze
- Página de registro/login
- Dashboard con navegación
- Lista de contactos (por usuario)
- Formulario crear/editar
- Importación/Exportación CSV

## 🔄 Migración de Datos

Si tienes datos en la versión CodeIgniter 4 y quieres migrar a Laravel:

1. Exporta los contactos a CSV desde CodeIgniter
2. Regístrate como usuario en Laravel
3. Usa la función "Importar CSV" en Laravel
4. ¡Listo! Tus contactos estarán en la base de datos

## 🤝 Contribución

Este es un proyecto académico. Si encuentras mejoras o errores:

1. Reporta issues
2. Sugiere mejoras
3. Documenta tus hallazgos

## 📧 Contacto

Para preguntas sobre el proyecto, contacta al profesor o abre un issue en GitHub.

## 📄 Licencia

Proyecto académico - MIT License

---

## 🚀 ¿Por dónde empezar?

1. **Si quieres ver la versión simple**: Inicia con CodeIgniter 4
2. **Si quieres la versión completa con autenticación**: Ve directo a `laravel-rolodex/`
3. **Si quieres entender las diferencias**: Lee `laravel-rolodex/COMPARATIVA.md`

---

**Desarrollado como proyecto académico demostrando la migración de CodeIgniter 4 a Laravel con implementación de autenticación mediante Laravel Breeze** 🎓
