# 📖 Guía de Instalación y Configuración - Rolodex Laravel

## 📝 Índice

1. [Requisitos previos](#requisitos-previos)
2. [Instalación del proyecto](#instalación-del-proyecto)
3. [Configuración de la base de datos](#configuración-de-la-base-de-datos)
4. [Ejecución del proyecto](#ejecución-del-proyecto)
5. [Primeros pasos](#primeros-pasos)
6. [Solución de problemas](#solución-de-problemas)

---

## 🔧 Requisitos previos

Antes de instalar el proyecto, asegúrate de tener instalado:

### Windows

1. **PHP 8.2 o superior**
   - Descarga desde: https://windows.php.net/download/
   - Asegúrate de tener habilitadas las extensiones: `sqlite3`, `pdo_sqlite`, `mbstring`, `openssl`

2. **Composer** (Gestor de dependencias de PHP)
   - Descarga desde: https://getcomposer.org/download/
   
3. **Node.js y NPM** (Para compilar assets)
   - Descarga desde: https://nodejs.org/ (versión LTS recomendada)

4. **Git** (Opcional, para control de versiones)
   - Descarga desde: https://git-scm.com/download/win

### Verificar instalación

Abre PowerShell o CMD y ejecuta:

```powershell
php --version
composer --version
node --version
npm --version
```

---

## 📦 Instalación del proyecto

### Paso 1: Ubicarse en el directorio del proyecto

```powershell
cd c:\Users\sebas\7-rolodex-con-registro-y-autenticaci-n-de-usuario-SebasRomaguera\laravel-rolodex
```

### Paso 2: Instalar dependencias de PHP

```powershell
composer install
```

Este comando instalará todas las dependencias de Laravel especificadas en `composer.json`.

### Paso 3: Instalar dependencias de JavaScript

```powershell
npm install
```

Este comando instalará Vite, Tailwind CSS y otras dependencias frontend.

### Paso 4: Configurar variables de entorno

El archivo `.env` ya debería estar creado. Si no existe:

```powershell
copy .env.example .env
```

### Paso 5: Generar clave de aplicación

```powershell
php artisan key:generate
```

Esta clave es necesaria para encriptar sesiones y otros datos sensibles.

---

## 🗄️ Configuración de la base de datos

El proyecto está configurado para usar **SQLite** por defecto, que no requiere instalación adicional.

### Opción 1: SQLite (Recomendado para desarrollo)

1. Verifica que en tu archivo `.env` esté configurado:

```env
DB_CONNECTION=sqlite
```

2. Crea el archivo de base de datos:

```powershell
New-Item -Path database\database.sqlite -ItemType File -Force
```

3. Ejecuta las migraciones:

```powershell
php artisan migrate
```

### Opción 2: MySQL/MariaDB

Si prefieres usar MySQL:

1. Instala MySQL o MariaDB
2. Crea una base de datos:

```sql
CREATE DATABASE rolodex_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

3. Edita tu archivo `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=rolodex_db
DB_USERNAME=root
DB_PASSWORD=tu_password
```

4. Ejecuta las migraciones:

```powershell
php artisan migrate
```

---

## 🚀 Ejecución del proyecto

### Paso 1: Compilar assets

Para **producción** (una sola vez):

```powershell
npm run build
```

Para **desarrollo** (con recarga automática):

En una **primera terminal**:

```powershell
npm run dev
```

### Paso 2: Iniciar el servidor de Laravel

En una **segunda terminal** (o en la misma si usaste `npm run build`):

```powershell
php artisan serve
```

El servidor se iniciará en: **http://localhost:8000**

### Paso 3: Abrir en el navegador

Abre tu navegador y ve a:

```
http://localhost:8000
```

---

## 👤 Primeros pasos

### 1. Registrar un usuario

1. Haz clic en **"Register"** en la página principal
2. Completa el formulario:
   - **Name**: Tu nombre
   - **Email**: Tu correo electrónico
   - **Password**: Una contraseña segura
   - **Confirm Password**: Repite la contraseña

3. Haz clic en **"Register"**

### 2. Acceder a tus contactos

Una vez registrado y autenticado:

1. En el menú superior, haz clic en **"📇 Mis Contactos"**
2. Verás un mensaje indicando que no tienes contactos

### 3. Añadir tu primer contacto

1. Haz clic en **"➕ Añadir Contacto"**
2. Completa el formulario:
   - **Nombre**: Obligatorio
   - **Teléfono**: Opcional
   - **Email**: Opcional
3. Haz clic en **"💾 Guardar Contacto"**

### 4. Importar contactos desde CSV

1. Crea un archivo CSV con este formato:

```csv
Name,Phone,Email
Juan Pérez,+34600123456,juan@example.com
María García,+34600789012,maria@example.com
Pedro Martínez,+34600345678,pedro@example.com
```

2. En la página de contactos, haz clic en **"📥 Importar CSV"**
3. Selecciona tu archivo CSV
4. Haz clic en **"📥 Importar Contactos"**

### 5. Exportar tus contactos

1. En la página de contactos, haz clic en **"📤 Exportar CSV"**
2. Se descargará un archivo con todos tus contactos

---

## 🔧 Solución de problemas

### Error: "Could not open input file: artisan"

**Solución**: Asegúrate de estar en el directorio correcto:

```powershell
cd laravel-rolodex
```

### Error: "SQLSTATE[HY000]: General error: 1 no such table: users"

**Solución**: Ejecuta las migraciones:

```powershell
php artisan migrate
```

### Error: Página en blanco o error 500

**Solución**: Verifica los logs en `storage/logs/laravel.log`

1. Asegúrate de tener permisos de escritura:

```powershell
# En PowerShell como Administrador
icacls storage /grant Users:F /T
icacls bootstrap\cache /grant Users:F /T
```

### Los estilos no se cargan correctamente

**Solución**: Compila los assets:

```powershell
npm run build
```

O en modo desarrollo:

```powershell
npm run dev
```

### Error: "Vite manifest not found"

**Solución**: 

1. Ejecuta:

```powershell
npm install
npm run build
```

2. Reinicia el servidor de Laravel

### Puerto 8000 ya en uso

**Solución**: Especifica otro puerto:

```powershell
php artisan serve --port=8080
```

Luego accede a: `http://localhost:8080`

---

## 📚 Comandos útiles

### Limpiar caché

```powershell
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Ver rutas disponibles

```powershell
php artisan route:list
```

### Crear migraciones frescas (⚠️ Borra todos los datos)

```powershell
php artisan migrate:fresh
```

### Abrir tinker (Consola interactiva de Laravel)

```powershell
php artisan tinker
```

---

## 🆘 Soporte adicional

Si tienes problemas no resueltos en esta guía:

1. Verifica los logs en `storage/logs/laravel.log`
2. Revisa la consola del navegador (F12) para errores JavaScript
3. Consulta la documentación oficial de Laravel: https://laravel.com/docs

---

## ✅ Checklist de instalación

Marca cada paso completado:

- [ ] PHP 8.2+ instalado
- [ ] Composer instalado
- [ ] Node.js y NPM instalados
- [ ] `composer install` ejecutado
- [ ] `npm install` ejecutado
- [ ] Archivo `.env` configurado
- [ ] `php artisan key:generate` ejecutado
- [ ] Base de datos creada
- [ ] `php artisan migrate` ejecutado
- [ ] `npm run build` o `npm run dev` ejecutado
- [ ] Servidor iniciado con `php artisan serve`
- [ ] Aplicación accesible en http://localhost:8000
- [ ] Usuario registrado exitosamente
- [ ] Contactos funcionando correctamente

---

**¡Listo!** Tu aplicación Rolodex Laravel debería estar funcionando correctamente. 🎉
