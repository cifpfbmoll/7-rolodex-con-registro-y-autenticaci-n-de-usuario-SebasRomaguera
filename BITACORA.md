# BITÁCORA: Autenticación con Laravel Breeze

## Proyecto del CIFP Francesc de Borja Moll - Curs 2025-2026

Este documento explica paso a paso cómo hemos creado una aplicación Laravel con autenticación usando **Laravel Breeze**, personalizándola para el CIFP Francesc de Borja Moll.

---

## Índice

1. [¿Qué es Laravel Breeze?](#1-qué-es-laravel-breeze)
2. [Requisitos previos](#2-requisitos-previos)
3. [Paso 1: Crear el proyecto Laravel](#3-paso-1-crear-el-proyecto-laravel)
4. [Paso 2: Instalar Laravel Breeze](#4-paso-2-instalar-laravel-breeze)
5. [Paso 3: Ejecutar el scaffolding](#5-paso-3-ejecutar-el-scaffolding)
6. [Estructura de archivos generados](#6-estructura-de-archivos-generados)
7. [Paso 4: Personalizar la aplicación](#7-paso-4-personalizar-la-aplicación)
8. [Paso 5: Ejecutar la aplicación](#8-paso-5-ejecutar-la-aplicación)
9. [Resumen de comandos](#9-resumen-de-comandos)
10. [Recursos adicionales](#10-recursos-adicionales)

---

## 1. ¿Qué es Laravel Breeze?

**Laravel Breeze** es un paquete oficial de Laravel que proporciona una estructura básica de autenticación. Es la forma más sencilla de añadir login, registro y gestión de usuarios a tu aplicación.

### Características principales

| Funcionalidad | Descripción |
|---------------|-------------|
| **Registro** | Formulario para crear nuevas cuentas de usuario |
| **Login** | Inicio de sesión con email y contraseña |
| **Logout** | Cierre de sesión seguro |
| **Recuperar contraseña** | Envío de email para restablecer la contraseña |
| **Verificación de email** | Confirmación de la dirección de correo (opcional) |
| **Perfil de usuario** | Edición de datos personales y eliminación de cuenta |

### ¿Por qué Breeze y no otros paquetes?

Laravel tiene varios paquetes de autenticación. Aquí una comparación:

| Paquete | Complejidad | Ideal para... |
|---------|-------------|---------------|
| **Laravel Breeze** | Baja | Proyectos pequeños/medianos, aprendizaje |
| **Laravel Fortify** | Media | Backend sin interfaz, APIs |
| **Laravel Jetstream** | Alta | Proyectos grandes con 2FA, equipos, etc. |

> **Consejo para juniors:** Empieza siempre con Breeze. Es más fácil de entender y personalizar.

---

## 2. Requisitos previos

Antes de empezar, asegúrate de tener instalado:

```bash
# Verificar PHP (necesitas 8.2 o superior para Laravel 11+)
php -v

# Verificar Composer (gestor de dependencias PHP)
composer -V

# Verificar Node.js y npm (para compilar assets CSS/JS)
node -v
npm -v
```

### Versiones recomendadas

- **PHP**: 8.2 o superior
- **Composer**: 2.x
- **Node.js**: 18.x o superior
- **npm**: 9.x o superior

---

## 3. Paso 1: Crear el proyecto Laravel

Primero creamos un proyecto Laravel vacío:

```bash
# Crear el proyecto en una carpeta llamada "laravel-breeze"
composer create-project laravel/laravel laravel-breeze --prefer-dist

# Entrar en la carpeta del proyecto
cd laravel-breeze
```

### ¿Qué hace este comando?

1. **Descarga Laravel** desde Packagist (el repositorio de Composer)
2. **Instala todas las dependencias** PHP
3. **Genera un archivo `.env`** con la configuración básica
4. **Crea una clave de aplicación** (APP_KEY) automáticamente
5. **Crea la base de datos SQLite** por defecto (`database/database.sqlite`)
6. **Ejecuta las migraciones** iniciales

> **Nota:** Laravel 11+ usa SQLite por defecto. Si prefieres MySQL o PostgreSQL, edita el archivo `.env`.

---

## 4. Paso 2: Instalar Laravel Breeze

Una vez dentro del proyecto, instalamos Breeze como dependencia de desarrollo:

```bash
composer require laravel/breeze --dev
```

### ¿Por qué `--dev`?

El flag `--dev` indica que es una dependencia de desarrollo. Breeze solo se usa para generar los archivos de autenticación; una vez generados, el paquete ya no es necesario en producción.

---

## 5. Paso 3: Ejecutar el scaffolding

Ahora generamos todos los archivos de autenticación:

```bash
# Instalar Breeze con Blade (motor de plantillas por defecto)
php artisan breeze:install blade

# Ejecutar migraciones (si no se hicieron automáticamente)
php artisan migrate

# Instalar dependencias de Node.js
npm install

# Compilar assets para desarrollo
npm run dev
```

### Opciones de stack frontend

Breeze soporta varios frameworks de frontend:

```bash
# Con Blade (plantillas PHP tradicionales) - EL QUE USAMOS
php artisan breeze:install blade

# Con Vue.js
php artisan breeze:install vue

# Con React
php artisan breeze:install react

# Solo API (sin frontend, para SPAs o móviles)
php artisan breeze:install api
```

> **Para este proyecto usamos Blade** porque es más sencillo de entender para principiantes y no requiere conocimientos de Vue o React.

---

## 6. Estructura de archivos generados

Después de instalar Breeze, se crean estos archivos y carpetas:

```
laravel-breeze/
├── app/
│   └── Http/
│       └── Controllers/
│           └── Auth/                    # Controladores de autenticación
│               ├── AuthenticatedSessionController.php   # Login/Logout
│               ├── ConfirmablePasswordController.php    # Confirmar contraseña
│               ├── EmailVerificationNotificationController.php
│               ├── EmailVerificationPromptController.php
│               ├── NewPasswordController.php            # Nueva contraseña
│               ├── PasswordController.php               # Cambiar contraseña
│               ├── PasswordResetLinkController.php      # Solicitar reset
│               ├── RegisteredUserController.php         # Registro
│               └── VerifyEmailController.php            # Verificar email
│
├── resources/
│   └── views/
│       ├── auth/                        # Vistas de autenticación
│       │   ├── confirm-password.blade.php
│       │   ├── forgot-password.blade.php
│       │   ├── login.blade.php          # Formulario de login
│       │   ├── register.blade.php       # Formulario de registro
│       │   ├── reset-password.blade.php
│       │   └── verify-email.blade.php
│       │
│       ├── components/                  # Componentes Blade reutilizables
│       │   ├── application-logo.blade.php   # Logo de la app ⭐
│       │   ├── primary-button.blade.php     # Botón principal
│       │   ├── text-input.blade.php         # Campo de texto
│       │   ├── input-label.blade.php        # Etiqueta
│       │   ├── input-error.blade.php        # Mensaje de error
│       │   └── ...
│       │
│       ├── layouts/                     # Layouts principales
│       │   ├── app.blade.php            # Layout para usuarios autenticados
│       │   ├── guest.blade.php          # Layout para invitados
│       │   └── navigation.blade.php     # Barra de navegación
│       │
│       ├── profile/                     # Vistas del perfil
│       │   ├── edit.blade.php
│       │   └── partials/
│       │       ├── delete-user-form.blade.php
│       │       ├── update-password-form.blade.php
│       │       └── update-profile-information-form.blade.php
│       │
│       ├── dashboard.blade.php          # Panel de control ⭐
│       └── welcome.blade.php            # Página de inicio ⭐
│
├── routes/
│   ├── auth.php                         # Rutas de autenticación
│   └── web.php                          # Rutas web principales
│
└── resources/
    ├── css/
    │   └── app.css                      # Estilos con Tailwind CSS
    └── js/
        └── app.js                       # JavaScript principal
```

### Archivos clave para personalizar (marcados con ⭐)

1. **`application-logo.blade.php`** - El logo que aparece en toda la app
2. **`welcome.blade.php`** - La página de inicio (landing page)
3. **`dashboard.blade.php`** - El panel que ve el usuario después de hacer login

---

## 7. Paso 4: Personalizar la aplicación

### 7.1 Cambiar el nombre de la aplicación

Editamos `config/app.php`:

```php
// Antes
'name' => env('APP_NAME', 'Laravel'),

// Después
'name' => env('APP_NAME', 'CIFP Francesc de Borja Moll'),
```

> **Alternativa:** También puedes editar el archivo `.env` y cambiar `APP_NAME=Laravel` por `APP_NAME="CIFP Francesc de Borja Moll"`.

### 7.2 Cambiar el logo

El logo está en `resources/views/components/application-logo.blade.php`.

**Antes (logo de Laravel):**
```html
<svg viewBox="0 0 316 316" ...>
    <!-- SVG complejo del logo de Laravel -->
</svg>
```

**Después (logo del CIFP):**
```html
<div {{ $attributes->merge(['class' => 'flex items-center']) }}>
    <svg class="w-10 h-10 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
        <path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3z..."/>
    </svg>
    <span class="ml-2 text-xl font-bold text-gray-800">CIFP FBMoll</span>
</div>
```

### 7.3 Personalizar la página de inicio

Reemplazamos `resources/views/welcome.blade.php` con contenido del centro:

```html
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <!-- Header con navegación -->
    <header>
        @auth
            <a href="{{ url('/dashboard') }}">Panel de Control</a>
        @else
            <a href="{{ route('login') }}">Iniciar Sessió</a>
            <a href="{{ route('register') }}">Registrar-se</a>
        @endauth
    </header>
    
    <!-- Contenido principal -->
    <main>
        <h1>Benvingut al CIFP Francesc de Borja Moll</h1>
        <!-- ... resto del contenido ... -->
    </main>
</body>
</html>
```

### 7.4 Personalizar el dashboard

Editamos `resources/views/dashboard.blade.php`:

```html
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Control') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>Benvingut/da al CIFP Francesc de Borja Moll!</h3>
                    
                    <!-- Enlaces útiles del centro -->
                    <div class="grid grid-cols-4 gap-4">
                        <a href="https://curs25-26.cifpfbmoll.eu/">Web del Centre</a>
                        <a href="https://aulavirtual.caib.es/c07015884/">Moodle</a>
                        <a href="https://fpadistancia.caib.es/">FP Virtual</a>
                        <a href="https://curs25-26.cifpfbmoll.eu/admissio/">Admissió</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
```

### Conceptos clave de Blade

| Sintaxis | Significado |
|----------|-------------|
| `{{ $variable }}` | Imprime el valor escapando HTML (seguro) |
| `{!! $html !!}` | Imprime HTML sin escapar (cuidado con XSS) |
| `@if ... @endif` | Condicional |
| `@auth ... @endauth` | Solo para usuarios autenticados |
| `@guest ... @endguest` | Solo para invitados (no autenticados) |
| `<x-componente />` | Usa un componente Blade |
| `{{ route('nombre') }}` | Genera la URL de una ruta con nombre |

---

## 8. Paso 5: Ejecutar la aplicación

### Compilar assets (CSS/JS)

```bash
# Para desarrollo (recompila automáticamente al guardar cambios)
npm run dev

# Para producción (minificado y optimizado)
npm run build
```

### Arrancar el servidor

```bash
# Servidor de desarrollo de Laravel
php artisan serve

# Por defecto se ejecuta en http://localhost:8000
```

### Probar la aplicación

1. Abre `http://localhost:8000` en tu navegador
2. Haz clic en **"Registrar-se"** para crear una cuenta
3. Rellena el formulario y envía
4. Serás redirigido al **Dashboard**
5. Prueba el menú de perfil (esquina superior derecha)
6. Prueba cerrar sesión y volver a entrar

---

## 9. Resumen de comandos

```bash
# 1. Crear proyecto Laravel
composer create-project laravel/laravel laravel-breeze --prefer-dist
cd laravel-breeze

# 2. Instalar Breeze
composer require laravel/breeze --dev

# 3. Generar scaffolding con Blade
php artisan breeze:install blade

# 4. Ejecutar migraciones
php artisan migrate

# 5. Instalar dependencias JS
npm install

# 6. Compilar assets
npm run build

# 7. Arrancar servidor
php artisan serve
```

---

## 10. Recursos adicionales

### Documentación oficial

- [Laravel Documentation](https://laravel.com/docs)
- [Laravel Breeze](https://laravel.com/docs/starter-kits#laravel-breeze)
- [Blade Templates](https://laravel.com/docs/blade)
- [Tailwind CSS](https://tailwindcss.com/docs)

### Enlaces del CIFP Francesc de Borja Moll

- [Web del Centre](https://curs25-26.cifpfbmoll.eu/)
- [Moodle](https://aulavirtual.caib.es/c07015884/)
- [FP Virtual](https://fpadistancia.caib.es/)
- [Admissió](https://curs25-26.cifpfbmoll.eu/admissio/)

### Tutorial original

Este proyecto está basado en el tutorial de Kinsta:
- [Autenticación en Laravel con Breeze](https://kinsta.com/es/blog/laravel-breeze/)

---

## Glosario para juniors

| Término | Definición |
|---------|------------|
| **Artisan** | CLI (interfaz de línea de comandos) de Laravel |
| **Blade** | Motor de plantillas de Laravel (archivos `.blade.php`) |
| **Composer** | Gestor de dependencias de PHP (como npm para JS) |
| **Middleware** | Código que se ejecuta entre la petición y la respuesta |
| **Migración** | Archivo PHP que define cambios en la base de datos |
| **Scaffold** | Código generado automáticamente como base |
| **Vite** | Herramienta para compilar CSS/JS moderno |

---

## Estructura del flujo de autenticación

```
Usuario no autenticado
        │
        ▼
┌───────────────┐
│   welcome     │ ──────► Ver página de inicio
└───────────────┘
        │
        ▼
┌───────────────┐
│   register    │ ──────► Crear cuenta nueva
└───────────────┘
        │
        ▼
┌───────────────┐
│    login      │ ──────► Iniciar sesión
└───────────────┘
        │
        ▼
┌───────────────┐
│   dashboard   │ ◄────── Usuario autenticado
└───────────────┘
        │
        ├──────► Editar perfil
        │
        └──────► Cerrar sesión ──────► Volver a welcome
```

---

**Documento creado:** Diciembre 2025  
**Autor:** Proyecto de demostración CIFP Francesc de Borja Moll  
**Versión Laravel:** 12.x  
**Versión Breeze:** 2.x
