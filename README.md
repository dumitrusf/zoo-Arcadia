# Zoo ARCADIA

Sistema de gestión para zoológico desarrollado en PHP con arquitectura basada en dominios (Screaming Architecture).

## Requisitos

- **Git** - Control de versiones
- **Composer** - Gestor de dependencias PHP
- **Node.js y npm** - Para compilar assets (CSS/JS). npm incluye npx automáticamente
- **MySQL o MariaDB** - Base de datos (XAMPP, WAMP, o instalación independiente)
- **Docker Desktop** (opcional) - Para trabajar con Docker

## Instalación de Prerrequisitos

### Git

**Windows:**
- Descargar desde: https://git-scm.com/download/win
- Ejecutar el instalador y seguir las instrucciones

**Verificar instalación:**
```bash
git --version
```

### Node.js y npm

**Windows:**
1. Descargar desde: https://nodejs.org/ (versión LTS recomendada)
2. Ejecutar el instalador `.msi`
3. Aceptar las opciones por defecto
4. Marcar la opción "Add to PATH" si está disponible

**Verificar instalación:**
```bash
node --version
npm --version
npx --version
```

**Nota:** `npx` viene incluido automáticamente con npm (versión 5.2+).

### Composer

**Windows:**
1. Descargar desde: https://getcomposer.org/download/
2. Descargar el instalador `Composer-Setup.exe`
3. Ejecutar el instalador (detecta automáticamente PHP)
4. Aceptar las opciones por defecto
5. Marcar la opción para agregar Composer al PATH del sistema

**Si no tienes PHP instalado:**
- Opción A: Instalar XAMPP (incluye PHP, MySQL y Apache): https://www.apachefriends.org/
- Opción B: Instalar PHP manualmente: https://windows.php.net/download/

**Verificar instalación:**
```bash
composer --version
```

**Nota:** Si después de instalar Composer no se reconoce en Git Bash, cerrar y volver a abrir Git Bash, o reiniciar la terminal.

### MySQL/MariaDB

**Opción A: XAMPP (Recomendado para principiantes)**
- Descargar desde: https://www.apachefriends.org/
- Incluye: Apache, MySQL, PHP y phpMyAdmin
- Durante la instalación, marcar MySQL para que se instale

**Opción B: MariaDB (Recomendado)**
- Descargar desde: https://mariadb.org/download/
- Seleccionar la versión para Windows
- Durante la instalación, configurar la contraseña de root

**Opción C: WAMP**
- Descargar desde: https://www.wampserver.com/
- Similar a XAMPP pero específico para Windows

**Verificar instalación:**
- Abrir el panel de control de XAMPP/WAMP o el servicio de MariaDB
- Verificar que MySQL/MariaDB esté corriendo

### Docker Desktop (Opcional)

**Solo si se quiere trabajar con Docker:**
1. Descargar desde: https://www.docker.com/products/docker-desktop/
2. Descargar Docker Desktop para Windows
3. Ejecutar el instalador
4. Reiniciar la computadora cuando se solicite
5. Abrir Docker Desktop y esperar a que termine de iniciar

**Verificar instalación:**
```bash
docker --version
docker-compose --version
```

## Pasos para Arrancar el Proyecto

### 1. Clonar el Repositorio

```bash
git clone https://github.com/dumitrusf/zoo-Arcadia.git
cd zoo-ARCADIA
```

### 2. Instalar Dependencias de PHP (Composer)

```bash
composer install
```

Instala todas las dependencias PHP definidas en `composer.json` (Intervention Image, PHPMailer, Cloudinary, etc.)

### 3. Instalar Dependencias de Node.js

```bash
npm install
```

Instala todas las dependencias de desarrollo (Gulp, Sass, Terser, etc.) definidas en `package.json`.

### 4. Configurar la Base de Datos

**Primera vez:** Si acabas de clonar el proyecto, es posible que no tengas el archivo `.env`. Los scripts `.bat` lo crearán automáticamente, pero si prefieres crearlo manualmente, crear un archivo `.env` en la raíz del proyecto con:

**Para Local:**
```
DB_HOST=localhost
DB_NAME=zoo_arcadia
DB_USER=root
DB_PASS=root
```

**Para Docker:**
```
DB_HOST=db
DB_NAME=zoo_arcadia
DB_USER=zoo_user
DB_PASS=zoo_password
```

#### Opción A: Trabajar con Base de Datos Local (MySQL/MariaDB local)

Si tienes MySQL o MariaDB instalado localmente (XAMPP, WAMP, o instalación independiente):

1. **Seleccionar configuración local:**
   ```bash
   .\switch-to-local.bat
   ```
   
   Crea/configura el archivo `.env` para usar:
   - `DB_HOST=localhost`
   - `DB_USER=root`
   - `DB_PASS=root`
   
   **Nota:** Si no existe `.env`, el script intentará crearlo. Si hay problemas, crearlo manualmente con el contenido de arriba.

2. **Desplegar la base de datos:**
   ```bash
   .\deploy_database.bat
   ```
   
   Este script:
   - Detecta automáticamente la instalación de MySQL/MariaDB (XAMPP, WAMP, o MariaDB independiente)
   - Crea la base de datos `zoo_arcadia`
   - Ejecuta todos los scripts SQL en orden:
     - `01_init.sql` - Inicialización
     - `02_tables.sql` - Creación de tablas
     - `03_constraints.sql` - Constraints y relaciones
     - `06_seed_data.sql` - Datos de prueba

#### Opción B: Trabajar con Docker

Si prefieres usar Docker:

1. **Seleccionar configuración Docker:**
   ```bash
   .\switch-to-docker.bat
   ```
   
   Crea/configura el archivo `.env` para usar:
   - `DB_HOST=db` (nombre del servicio Docker)
   - `DB_USER=zoo_user`
   - `DB_PASS=zoo_password`
   
   **Nota:** Este script copia desde `.env.docker` si existe. Si no existe, crearlo manualmente con el contenido de arriba.

2. **La base de datos se crea automáticamente** cuando arrancas Docker (ver paso 6).

### 5. Compilar Assets (CSS y JavaScript)

Antes de arrancar el proyecto, compilar los archivos CSS y JavaScript:

```bash
npx gulp buildCss && npx gulp buildJs
```

Esto:
- Compila los archivos SCSS de `src/scss/` a CSS en `public/build/css/`
- Compila y minifica los archivos JS de `src/js/` a JavaScript en `public/build/js/`

**Nota:** Si modificas archivos en `src/scss/` o `src/js/`, volver a ejecutar este comando para ver los cambios.

### 6. Arrancar el Proyecto

#### Opción A: Con Docker (Recomendado)

```bash
docker-compose restart web
```

O si es la primera vez:

```bash
docker-compose up -d
```

El proyecto estará disponible en: **http://localhost:8080**

#### Opción B: Con PHP Built-in Server (Local)

Si trabajas con base de datos local y no usas Docker:

```bash
php -S localhost:3001 -t public public/index.php
```

El proyecto estará disponible en: **http://localhost:3001**

## Detener el Proyecto

### Si usas Docker:

```bash
docker-compose down
```

Esto detiene y elimina los contenedores (pero **NO** elimina los datos de la base de datos).

### Si usas PHP Built-in Server:

Presionar `Ctrl + C` en la terminal donde está corriendo el servidor.

## Actualizar la Base de Datos

Si se han hecho cambios en la estructura de la base de datos (nuevas tablas, columnas, constraints, etc.), aplicar esos cambios:

### Para Base de Datos Local:

1. **Asegurarse de estar en modo local:**
   ```bash
   .\switch-to-local.bat
   ```

2. **Ejecutar el deploy:**
   ```bash
   .\deploy_database.bat
   ```

   ⚠️ **ADVERTENCIA:** Este script **eliminará y recreará** la base de datos. Todos los datos existentes se perderán.

### Para Base de Datos Docker:

Hay dos opciones dependiendo de si se quiere mantener los datos o empezar desde cero:

#### Opción 1: Aplicar Cambios SIN Perder Datos (Mantener datos persistentes)

**Usar cuando:**
- Ya hay datos importantes en la base de datos
- Solo se cambió un script SQL específico
- Se quiere mantener los datos existentes

**Ejemplo: Cambiar una columna en `database/02_tables.sql` pero mantener los datos**

**Pasos:**

1. **Asegurarse de que Docker esté corriendo:**
   ```bash
   docker-compose ps
   ```
   Debe mostrar `zoo-arcadia-db` como "Up". Si no está corriendo:
   ```bash
   docker-compose up -d
   ```

2. **Ejecutar SOLO el script que se cambió** contra el contenedor Docker:
   
   **Si se cambió `02_tables.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/02_tables.sql
   ```
   
   **Si se cambió `03_constraints.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/03_constraints.sql
   ```
   
   **Si se cambió `04_indexes.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/04_indexes.sql
   ```

3. El cambio se aplicó y los datos siguen ahí.

**⚠️ IMPORTANTE:**
- Este método solo funciona si el script SQL tiene comandos como `ALTER TABLE` o `CREATE TABLE IF NOT EXISTS`
- Si el script tiene `DROP TABLE` o `CREATE TABLE` sin `IF NOT EXISTS`, puede causar errores
- Si hay errores, usar la Opción 2 (recrear desde cero)

**Ejemplo de cambio que funciona con este método:**
```sql
-- En database/02_tables.sql
ALTER TABLE animals ADD COLUMN nueva_columna VARCHAR(100);
```

**Ejemplo de cambio que NO funciona con este método:**
```sql
-- En database/02_tables.sql
DROP TABLE IF EXISTS animals;
CREATE TABLE animals (...);
```
(En este caso, usar la Opción 2)

#### Opción 2: Recrear la Base de Datos desde Cero (Borra todos los datos)

**Usar cuando:**
- No importa perder los datos
- Se hicieron cambios importantes en varios scripts
- Se quiere empezar completamente limpio
- Es más simple y garantiza que todo funcione

**Ejemplo: Cambiar una columna en `database/02_tables.sql`**

**Pasos:**

1. **Editar el archivo** `database/02_tables.sql` y hacer el cambio (por ejemplo, agregar una columna a la tabla `animals`)

2. **Ejecutar estos 2 comandos en Git Bash:**
   ```bash
   docker-compose down -v
   docker-compose up -d
   ```

3. Docker automáticamente:
   - Elimina la base de datos antigua (por eso el `-v`)
   - Crea una nueva base de datos vacía
   - Ejecuta todos los scripts SQL en orden:
     - `01_init.sql` → Crea la base de datos
     - `02_tables.sql` → Crea las tablas (con el cambio)
     - `03_constraints.sql` → Agrega las relaciones
     - `04_indexes.sql` → Crea los índices
     - `05_procedures.sql` → Crea los procedimientos
     - `06_seed_data.sql` → Inserta datos de prueba

**¿Por qué `-v`?**
- El flag `-v` elimina los **volúmenes** (donde Docker guarda los datos de la BD)
- Sin `-v`, Docker no ejecutaría los scripts SQL de nuevo (solo los ejecuta la primera vez)
- Con `-v`, Docker ejecuta todos los scripts automáticamente

**⚠️ ADVERTENCIA:** 
- Esto **borra todos los datos** de la base de datos
- Si hay datos importantes, hacer un backup primero o usar la Opción 1

#### ¿Cuál opción usar?

- **Opción 1** → Si hay datos importantes y solo se cambió un script específico
  - ✅ Mantiene todos los datos existentes
  - ✅ Si se borra `seed_data.sql`, los datos se mantienen
  - ✅ Solo ejecuta el script que se especifique
  
- **Opción 2** → Si no importa perder datos o se quiere empezar limpio (más simple)
  - ⚠️ Borra todos los datos
  - ⚠️ Si se borra `seed_data.sql`, no habrá datos de prueba
  - ✅ Ejecuta todos los scripts desde cero

#### Verificar que los cambios se aplicaron:

Conectarse a la base de datos Docker para verificar:

```bash
# Conectarse a la base de datos
docker exec -it zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia

# Dentro de MariaDB, ejecutar:
SHOW TABLES;
DESCRIBE nombre_de_tabla;
EXIT;
```

O usar un cliente gráfico como DBeaver, MySQL Workbench, o phpMyAdmin conectándose a:
- **Host:** `localhost`
- **Puerto:** `3306`
- **Usuario:** `zoo_user`
- **Contraseña:** `zoo_password`
- **Base de datos:** `zoo_arcadia`

## Estructura del Proyecto

```
zoo-ARCADIA/
├── App/                    # Código de la aplicación (MVC por dominio)
├── public/                 # Punto de entrada público
│   ├── index.php          # Router principal
│   └── build/             # Archivos compilados (CSS/JS)
├── src/                    # Código fuente (SCSS/JS)
│   ├── scss/              # Estilos fuente
│   └── js/                # JavaScript fuente
├── database/               # Scripts SQL de la base de datos
├── includes/               # Funciones y helpers compartidos
├── vendor/                 # Dependencias PHP (Composer)
├── node_modules/          # Dependencias Node.js
├── composer.json          # Dependencias PHP
├── package.json           # Dependencias Node.js
├── docker-compose.yml     # Configuración Docker
└── gulpfile.js           # Tareas de compilación Gulp
```

## Comandos Útiles

### Compilar Assets

```bash
# Compilar CSS y JavaScript
npx gulp buildCss && npx gulp buildJs

# Compilar solo CSS
npx gulp buildCss

# Compilar solo JavaScript
npx gulp buildJs
```

### Docker

```bash
# Arrancar servicios
docker-compose up -d

# Reiniciar servicio web
docker-compose restart web

# Ver logs
docker-compose logs -f web

# Detener servicios
docker-compose down

# Detener y eliminar volúmenes (borra BD)
docker-compose down -v
```

### Cambiar entre Local y Docker

```bash
# Cambiar a configuración local
.\switch-to-local.bat

# Cambiar a configuración Docker
.\switch-to-docker.bat
```

## Problemas Comunes

### El proyecto no carga CSS/JS

**Solución:** Compilar los assets:
```bash
npx gulp buildCss && npx gulp buildJs
```

### Error de conexión a la base de datos

**Solución:** 
1. Verificar que MySQL/MariaDB esté corriendo
2. Verificar el archivo `.env` tiene la configuración correcta
3. Si usas Docker, verificar que el contenedor `zoo-arcadia-db` esté corriendo:
   ```bash
   docker-compose ps
   ```

### `deploy_database.bat` no encuentra MySQL

**Solución:** El script busca MySQL/MariaDB en estas rutas:
- `C:\Program Files\MariaDB 11.4\bin\mariadb.exe`
- `C:\xampp\mysql\bin\mysql.exe`
- `C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe`

Si tu instalación está en otra ruta, editar `deploy_database.bat` y agregar tu ruta.

### Los cambios en SCSS/JS no se reflejan

**Solución:** Recompilar después de cada cambio:
```bash
npx gulp buildCss && npx gulp buildJs
```

## Archivos de Configuración

### .gitignore

Este archivo define qué archivos y carpetas **NO** se suben al repositorio Git:

```
/node_modules
/docs/*
/.cursor
/.env
/vendor
# in other pc do npm install, and composer install

# after that run the project with php -S localhost:3001 -t . public/index.php
# npx gulp
# in another divided terminal run the project with npx gulp
```

**Archivos ignorados:**
- `/node_modules` - Dependencias de Node.js (se instalan con `npm install`)
- `/vendor` - Dependencias de PHP (se instalan con `composer install`)
- `/.env` - Variables de entorno (configuración sensible, no se sube)
- `/docs/*` - Documentación (no se sube al repo)
- `/.cursor` - Configuración del editor Cursor

### Archivos .env

El archivo `.env` contiene la configuración de la base de datos y **NO se sube a Git** por seguridad.

#### .env (Archivo principal - el que usa el sistema)

**Este es el único archivo que realmente usa el sistema.** El archivo `config.php` lee este archivo para obtener la configuración de la base de datos.

Este archivo se crea/modifica automáticamente cuando se ejecuta:
- `switch-to-local.bat` → Modifica `.env` para configuración local
- `switch-to-docker.bat` → Modifica `.env` para configuración Docker

**Contenido para Local:**
```
DB_HOST=localhost
DB_NAME=zoo_arcadia
DB_USER=root
DB_PASS=root
```

**Contenido para Docker:**
```
DB_HOST=db
DB_NAME=zoo_arcadia
DB_USER=zoo_user
DB_PASS=zoo_password
```

**Nota importante:** El sistema **siempre usa el archivo `.env`**, da igual si estás en local o Docker. Los scripts `.bat` solo modifican este archivo para cambiar entre configuraciones.

#### .env.docker (Opcional - solo plantilla/ejemplo)

Este archivo es **solo una plantilla de ejemplo**. El script `switch-to-docker.bat` intenta copiarlo como `.env` si existe, pero **no es necesario** para que el sistema funcione.

Si no existe, el script `switch-to-docker.bat` simplemente modifica el `.env` directamente con los valores de Docker.

**Contenido (solo referencia):**
```
DB_HOST=db
DB_NAME=zoo_arcadia
DB_USER=zoo_user
DB_PASS=zoo_password
```

#### .env.local (Opcional - backup automático)

El script `switch-to-local.bat` crea este archivo automáticamente como backup de la configuración local antes de cambiar a Docker. **No es necesario** para el funcionamiento del sistema.

**Notas importantes:**
- El archivo `.env` **NO se sube a Git** (está en `.gitignore`)
- El sistema **siempre lee el archivo `.env`** (da igual si es local o Docker)
- Si clonas el proyecto en otro ordenador, necesitarás crear el `.env` manualmente o usar los scripts `.bat`
- Si el `.env` no existe, `config.php` usa valores por defecto (localhost, root, root)

## Notas Importantes

- Compilar los assets antes de arrancar el proyecto o después de modificar archivos en `src/`
- El archivo `.env` controla la configuración de la base de datos. Usarlo para cambiar entre local y Docker.
- Los scripts SQL en `database/` se ejecutan en orden numérico. No modificar los nombres de los archivos.
- Docker es la forma recomendada de trabajar, ya que garantiza un entorno consistente.
