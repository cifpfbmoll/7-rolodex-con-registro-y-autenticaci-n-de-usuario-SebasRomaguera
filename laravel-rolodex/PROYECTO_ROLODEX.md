# 📇 Rolodex Laravel - Sistema de Gestión de Contactos

Sistema de gestión de contactos implementado en **Laravel 12** con autenticación de usuarios mediante **Laravel Breeze**.

## 🚀 Características

- ✅ **Autenticación completa**: Registro, login, logout y gestión de perfil (Laravel Breeze)
- 📇 **Gestión de contactos**: Crear, leer, actualizar y eliminar contactos
- 👤 **Contactos por usuario**: Cada usuario solo ve y gestiona sus propios contactos
- 📥 **Importación CSV**: Importa contactos masivamente desde archivos CSV
- 📤 **Exportación CSV**: Exporta tus contactos a formato CSV
- 🔒 **Autorización**: Políticas de seguridad para proteger los contactos de cada usuario
- 🎨 **Interfaz moderna**: UI con Tailwind CSS integrado con Laravel Breeze

## 📋 Requisitos

- PHP >= 8.2
- Composer
- Node.js y NPM
- SQLite / MySQL / PostgreSQL

## 🛠️ Instalación

### 1. Clonar el repositorio

```bash
cd laravel-rolodex
```

### 2. Instalar dependencias de PHP

```bash
composer install
```

### 3. Instalar dependencias de JavaScript

```bash
npm install
```

### 4. Configurar el archivo .env

```bash
cp .env.example .env
```

Edita el archivo `.env` y configura tu base de datos. Por defecto usa SQLite:

```env
DB_CONNECTION=sqlite
# DB_DATABASE=/path/to/database.sqlite
```

### 5. Generar clave de aplicación

```bash
php artisan key:generate
```

### 6. Ejecutar migraciones

```bash
php artisan migrate
```

### 7. Compilar assets

```bash
npm run build
```

## 🚀 Ejecutar el proyecto

### Modo desarrollo

En una terminal, inicia el servidor de Laravel:

```bash
php artisan serve
```

En otra terminal, compila los assets en modo watch:

```bash
npm run dev
```

Visita: `http://localhost:8000`

## 📖 Uso

### 1. Registro de usuario

1. Ve a `http://localhost:8000/register`
2. Crea tu cuenta de usuario

### 2. Gestión de contactos

Una vez autenticado:

- **Ver contactos**: Click en "📇 Mis Contactos" en el menú
- **Añadir contacto**: Click en "➕ Añadir Contacto"
- **Editar contacto**: Click en "✏️ Editar" junto a un contacto
- **Eliminar contacto**: Click en "🗑️ Eliminar" junto a un contacto

### 3. Importar contactos desde CSV

1. Prepara un archivo CSV con el siguiente formato:

```csv
Name,Phone,Email
Juan Pérez,+34600123456,juan@example.com
María García,+34600789012,maria@example.com
```

2. Click en "📥 Importar CSV"
3. Selecciona tu archivo
4. Click en "Importar Contactos"

### 4. Exportar contactos

Click en "📤 Exportar CSV" para descargar todos tus contactos en formato CSV.

## 🗂️ Estructura del proyecto

```
laravel-rolodex/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── ContactController.php    # Controlador de contactos
│   ├── Models/
│   │   ├── Contact.php                  # Modelo Contact
│   │   └── User.php                     # Modelo User con relación
│   └── Policies/
│       └── ContactPolicy.php            # Políticas de autorización
├── database/
│   └── migrations/
│       └── *_create_contacts_table.php  # Migración de contactos
├── resources/
│   └── views/
│       ├── contacts/
│       │   ├── index.blade.php          # Lista de contactos
│       │   ├── create.blade.php         # Formulario crear
│       │   ├── edit.blade.php           # Formulario editar
│       │   └── import.blade.php         # Formulario importar
│       └── layouts/
│           └── navigation.blade.php     # Navegación con enlaces
└── routes/
    └── web.php                          # Rutas de la aplicación
```

## 🔐 Seguridad

- **Autenticación requerida**: Todas las rutas de contactos están protegidas con middleware `auth`
- **Autorización**: Los usuarios solo pueden ver, editar y eliminar sus propios contactos
- **Validación**: Todos los formularios tienen validación de datos
- **CSRF Protection**: Protección contra ataques CSRF en todos los formularios

## 🎨 Stack Tecnológico

- **Backend**: Laravel 12.x
- **Autenticación**: Laravel Breeze
- **Frontend**: Blade Templates + Tailwind CSS
- **Base de datos**: SQLite (configurable a MySQL/PostgreSQL)

## 📝 Características técnicas

### Modelo Contact

```php
protected $fillable = ['user_id', 'name', 'phone', 'email'];
```

### Relaciones

- `User hasMany Contact`
- `Contact belongsTo User`

### Rutas principales

- `GET /contacts` - Lista de contactos
- `GET /contacts/create` - Formulario crear
- `POST /contacts` - Guardar contacto
- `GET /contacts/{id}/edit` - Formulario editar
- `PUT /contacts/{id}` - Actualizar contacto
- `DELETE /contacts/{id}` - Eliminar contacto
- `GET /contacts-export` - Exportar CSV
- `GET /contacts-import` - Formulario importar
- `POST /contacts-import` - Procesar importación

## 🆚 Diferencias con la versión CodeIgniter 4

| Característica | CodeIgniter 4 | Laravel + Breeze |
|----------------|---------------|------------------|
| Autenticación | ❌ No incluida | ✅ Completa con Breeze |
| Registro usuarios | ❌ No | ✅ Sí |
| Multi-usuario | ❌ No | ✅ Sí |
| Base de datos | CSV Files | Base de datos relacional |
| Autorización | ❌ No | ✅ Policies |
| ORM | ❌ No | ✅ Eloquent ORM |
| Validación | Manual | Form Requests |
| UI Framework | Bootstrap | Tailwind CSS |

## 👨‍💻 Desarrollo

### Crear nueva migración

```bash
php artisan make:migration create_table_name
```

### Crear nuevo controlador

```bash
php artisan make:controller ControllerName
```

### Crear nuevo modelo

```bash
php artisan make:model ModelName -m
```

## 🧪 Testing

```bash
php artisan test
```

## 📄 Licencia

Este proyecto es de código abierto y está disponible bajo la licencia MIT.

## 🙋‍♂️ Soporte

Para preguntas o problemas, por favor abre un issue en el repositorio.

---

Desarrollado con ❤️ usando Laravel y Breeze
