# 🦁 Zoo ARCADIA - Guía de Inicio Rápido

Guía completa para desarrolladores nuevos que quieren arrancar el proyecto en localhost desde cero.

---

## 📋 Prerrequisitos

Antes de comenzar, asegúrate de tener instalado:

- **Git** - Para clonar el repositorio
- **Composer** - Gestor de dependencias PHP
- **Node.js y npm** - Para compilar assets (CSS/JS) - **npm incluye npx automáticamente**
- **MySQL o MariaDB** - Base de datos (puede ser XAMPP, WAMP, o instalación independiente)
- **Docker Desktop** (opcional) - Si prefieres trabajar con Docker

---

## 🔧 Instalación de Prerrequisitos

### 1. Instalar Git

**Windows:**
- Descarga Git desde: https://git-scm.com/download/win
- Ejecuta el instalador y sigue las instrucciones
- Acepta las opciones por defecto (están bien configuradas)

**Verificar instalación:**
```bash
git --version
```

### 2. Instalar Node.js y npm (incluye npx)

**Windows:**
1. Ve a: https://nodejs.org/
2. Descarga la versión **LTS (Long Term Support)** - Recomendada
3. Ejecuta el instalador `.msi`
4. Acepta todas las opciones por defecto
5. Durante la instalación, asegúrate de marcar la opción **"Add to PATH"** si está disponible

**Verificar instalación:**
```bash
node --version
npm --version
npx --version
```

**Nota:** `npx` viene incluido automáticamente con npm (versión 5.2+), no necesitas instalarlo por separado.

### 3. Instalar Composer

**Windows:**
1. Ve a: https://getcomposer.org/download/
2. Descarga el instalador `Composer-Setup.exe`
3. Ejecuta el instalador
4. El instalador detectará automáticamente tu instalación de PHP
5. Acepta las opciones por defecto
6. Asegúrate de marcar la opción para agregar Composer al PATH del sistema

**Si no tienes PHP instalado:**
- Opción A: Instala XAMPP (incluye PHP, MySQL y Apache): https://www.apachefriends.org/
- Opción B: Instala PHP manualmente: https://windows.php.net/download/

**Verificar instalación:**
```bash
composer --version
```

**Nota:** Si después de instalar Composer no lo reconoces en Git Bash, cierra y vuelve a abrir Git Bash, o reinicia tu terminal.

### 4. Instalar MySQL/MariaDB

**Opción A: XAMPP (Recomendado para principiantes)**
- Descarga desde: https://www.apachefriends.org/
- Incluye: Apache, MySQL, PHP y phpMyAdmin
- Durante la instalación, marca MySQL para que se instale

**Opción B: MariaDB (Recomendado)**
- Descarga desde: https://mariadb.org/download/
- Selecciona la versión para Windows
- Durante la instalación, configura la contraseña de root (anótala, la necesitarás)

**Opción C: WAMP**
- Descarga desde: https://www.wampserver.com/
- Similar a XAMPP pero específico para Windows

**Verificar instalación:**
- Abre el panel de control de XAMPP/WAMP o el servicio de MariaDB
- Verifica que MySQL/MariaDB esté corriendo

### 5. Instalar Docker Desktop (Opcional)

**Solo si quieres trabajar con Docker:**
1. Ve a: https://www.docker.com/products/docker-desktop/
2. Descarga Docker Desktop para Windows
3. Ejecuta el instalador
4. Reinicia tu computadora cuando se solicite
5. Abre Docker Desktop y espera a que termine de iniciar

**Verificar instalación:**
```bash
docker --version
docker-compose --version
```

---

## 🚀 Pasos para Arrancar el Proyecto

### 1. Clonar el Repositorio

```bash
git clone https://github.com/dumitrusf/zoo-Arcadia.git
cd zoo-ARCADIA
```

### 2. Instalar Dependencias de PHP (Composer)

```bash
composer install
```

Esto instalará todas las dependencias PHP definidas en `composer.json` (Intervention Image, PHPMailer, Cloudinary, etc.)

### 3. Instalar Dependencias de Node.js

```bash
npm install
```

Esto instalará todas las dependencias de desarrollo (Gulp, Sass, Terser, etc.) definidas en `package.json`.

### 4. Configurar la Base de Datos

**⚠️ IMPORTANTE - Primera vez:** Si acabas de clonar el proyecto, es posible que no tengas el archivo `.env`. Los scripts `.bat` lo crearán automáticamente, pero si prefieres crearlo manualmente, crea un archivo `.env` en la raíz del proyecto con:

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
   # En Git Bash o PowerShell
   .\switch-to-local.bat
   ```

   Esto creará/configurará el archivo `.env` para usar:
   - `DB_HOST=localhost`
   - `DB_USER=root`
   - `DB_PASS=root`
   
   **Nota:** Si no existe `.env`, el script intentará crearlo. Si hay problemas, créalo manualmente con el contenido de arriba.

2. **Desplegar la base de datos:**
   ```bash
   # En Git Bash o PowerShell
   .\deploy_database.bat
   ```

   Este script:
   - Detecta automáticamente tu instalación de MySQL/MariaDB (XAMPP, WAMP, o MariaDB independiente)
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

   Esto creará/configurará el archivo `.env` para usar:
   - `DB_HOST=db` (nombre del servicio Docker)
   - `DB_USER=zoo_user`
   - `DB_PASS=zoo_password`
   
   **Nota:** Este script copia desde `.env.docker` si existe. Si no existe, créalo manualmente con el contenido de arriba.

2. **La base de datos se crea automáticamente** cuando arrancas Docker (ver paso 6).

### 5. Compilar Assets (CSS y JavaScript)

**IMPORTANTE:** Antes de arrancar el proyecto, debes compilar los archivos CSS y JavaScript:

```bash
npx gulp buildCss && npx gulp buildJs
```

Esto:
- Compila los archivos SCSS de `src/scss/` a CSS en `public/build/css/`
- Compila y minifica los archivos JS de `src/js/` a JavaScript en `public/build/js/`

**Nota:** Si modificas archivos en `src/scss/` o `src/js/`, debes volver a ejecutar este comando para ver los cambios.

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
# En el directorio raíz del proyecto
php -S localhost:3001 -t public public/index.php
```

El proyecto estará disponible en: **http://localhost:3001**

---

## 🛑 Detener el Proyecto

### Si usas Docker:

```bash
docker-compose down
```

Esto detiene y elimina los contenedores (pero **NO** elimina los datos de la base de datos).

### Si usas PHP Built-in Server:

Simplemente presiona `Ctrl + C` en la terminal donde está corriendo el servidor.

---

## 🔄 Actualizar la Base de Datos

Si se han hecho cambios en la estructura de la base de datos (nuevas tablas, columnas, constraints, etc.), debes aplicar esos cambios:

### Para Base de Datos Local:

1. **Asegúrate de estar en modo local:**
   ```bash
   .\switch-to-local.bat
   ```

2. **Ejecuta el deploy:**
   ```bash
   .\deploy_database.bat
   ```

   ⚠️ **ADVERTENCIA:** Este script **eliminará y recreará** la base de datos. Todos los datos existentes se perderán.

### Para Base de Datos Docker:

Tienes **dos opciones** dependiendo de si quieres mantener tus datos o empezar desde cero:

---

#### Opción 1: Aplicar Cambios SIN Perder Datos (Mantener datos persistentes)

**Usa esto cuando:**
- Ya tienes datos importantes en la base de datos
- Solo cambiaste un script SQL específico
- Quieres mantener los datos existentes

**📝 Ejemplo: Cambias una columna en `database/02_tables.sql` pero quieres mantener tus datos**

**Pasos:**

1. **Asegúrate de que Docker esté corriendo:**
   ```bash
   docker-compose ps
   ```
   Debe mostrar `zoo-arcadia-db` como "Up". Si no está corriendo:
   ```bash
   docker-compose up -d
   ```

2. **Ejecuta SOLO el script que cambiaste** contra el contenedor Docker:
   
   **Si cambiaste `02_tables.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/02_tables.sql
   ```
   
   **Si cambiaste `03_constraints.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/03_constraints.sql
   ```
   
   **Si cambiaste `04_indexes.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/04_indexes.sql
   ```

3. **¡Listo!** El cambio se aplicó y tus datos siguen ahí.

**⚠️ IMPORTANTE:**
- Este método **solo funciona** si tu script SQL tiene comandos como `ALTER TABLE` o `CREATE TABLE IF NOT EXISTS`
- Si tu script tiene `DROP TABLE` o `CREATE TABLE` sin `IF NOT EXISTS`, puede causar errores
- Si hay errores, usa la Opción 2 (recrear desde cero)

**💡 Ejemplo práctico:**
- Si borras el archivo `database/06_seed_data.sql` y usas este método (Opción 1), **tus datos se mantienen** porque solo ejecutas el script que especifiques
- Los datos que ya están en la base de datos **NO se borran** automáticamente
- Solo se ejecuta el script que tú indiques con `docker exec`

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
(En este caso, usa la Opción 2)

---

#### Opción 2: Recrear la Base de Datos desde Cero (Borra todos los datos)

**Usa esto cuando:**
- No te importa perder los datos
- Hiciste cambios importantes en varios scripts
- Quieres empezar completamente limpio
- Es más simple y garantiza que todo funcione

**📝 Ejemplo práctico: Cambias una columna en `database/02_tables.sql`**

**Pasos exactos (súper simple):**

1. **Editas el archivo** `database/02_tables.sql` y haces tu cambio (por ejemplo, agregas una columna a la tabla `animals`)

2. **Ejecutas estos 2 comandos en Git Bash:**
   ```bash
   docker-compose down -v
   docker-compose up -d
   ```

3. **¡Eso es todo!** Docker automáticamente:
   - Elimina la base de datos antigua (por eso el `-v`)
   - Crea una nueva base de datos vacía
   - Ejecuta todos los scripts SQL en orden:
     - `01_init.sql` → Crea la base de datos
     - `02_tables.sql` → Crea las tablas (con tu cambio)
     - `03_constraints.sql` → Agrega las relaciones
     - `04_indexes.sql` → Crea los índices
     - `05_procedures.sql` → Crea los procedimientos
     - `06_seed_data.sql` → Inserta datos de prueba

**¿Por qué `-v`?**
- El flag `-v` elimina los **volúmenes** (donde Docker guarda los datos de la BD)
- Sin `-v`, Docker no ejecutaría los scripts SQL de nuevo (solo los ejecuta la primera vez)
- Con `-v`, Docker "piensa" que es la primera vez y ejecuta todos los scripts automáticamente

**⚠️ ADVERTENCIA:** 
- Esto **borra todos los datos** de la base de datos
- Si tienes datos importantes, haz un backup primero o usa la Opción 1

**💡 Ejemplo práctico:**
- Si borras el archivo `database/06_seed_data.sql` y usas este método (Opción 2), **NO habrá datos de prueba** porque ese script no existe
- Todos los scripts se ejecutan desde cero, así que si falta `seed_data.sql`, no se insertarán datos de prueba
- Si quieres mantener tus datos actuales, usa la Opción 1 en su lugar

---

#### ¿Cuál opción usar?

- **Opción 1** → Si tienes datos importantes y solo cambiaste un script específico
  - ✅ Mantiene todos los datos existentes
  - ✅ Si borras `seed_data.sql`, tus datos se mantienen
  - ✅ Solo ejecuta el script que especifiques
  
- **Opción 2** → Si no te importa perder datos o quieres empezar limpio (más simple)
  - ⚠️ Borra todos los datos
  - ⚠️ Si borras `seed_data.sql`, no habrá datos de prueba
  - ✅ Ejecuta todos los scripts desde cero

#### Verificar que los cambios se aplicaron:

Puedes conectarte a la base de datos Docker para verificar:

```bash
# Conectarte a la base de datos
docker exec -it zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia

# Dentro de MariaDB, puedes ejecutar:
SHOW TABLES;
DESCRIBE nombre_de_tabla;
EXIT;
```

O usar un cliente gráfico como DBeaver, MySQL Workbench, o phpMyAdmin conectándote a:
- **Host:** `localhost`
- **Puerto:** `3306`
- **Usuario:** `zoo_user`
- **Contraseña:** `zoo_password`
- **Base de datos:** `zoo_arcadia`

---

## 📁 Estructura del Proyecto

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

---

## 🔧 Comandos Útiles

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

---

## ⚠️ Problemas Comunes

### El proyecto no carga CSS/JS

**Solución:** Asegúrate de haber compilado los assets:
```bash
npx gulp buildCss && npx gulp buildJs
```

### Error de conexión a la base de datos

**Solución:** 
1. Verifica que MySQL/MariaDB esté corriendo
2. Verifica el archivo `.env` tiene la configuración correcta
3. Si usas Docker, verifica que el contenedor `zoo-arcadia-db` esté corriendo:
   ```bash
   docker-compose ps
   ```

### `deploy_database.bat` no encuentra MySQL

**Solución:** El script busca MySQL/MariaDB en estas rutas:
- `C:\Program Files\MariaDB 11.4\bin\mariadb.exe`
- `C:\xampp\mysql\bin\mysql.exe`
- `C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe`

Si tu instalación está en otra ruta, edita `deploy_database.bat` y agrega tu ruta.

### Los cambios en SCSS/JS no se reflejan

**Solución:** Debes recompilar después de cada cambio:
```bash
npx gulp buildCss && npx gulp buildJs
```

---

## 📝 Notas Importantes

- **Siempre compila los assets** antes de arrancar el proyecto o después de modificar archivos en `src/`
- **El archivo `.env`** controla la configuración de la base de datos. Úsalo para cambiar entre local y Docker.
- **Los scripts SQL** en `database/` se ejecutan en orden numérico. No modifiques los nombres de los archivos.
- **Docker** es la forma recomendada de trabajar, ya que garantiza un entorno consistente.

---

## 🆘 ¿Necesitas Ayuda?

Si tienes problemas:
1. Revisa los logs de Docker: `docker-compose logs -f`
2. Verifica que todas las dependencias estén instaladas
3. Asegúrate de haber ejecutado todos los pasos en orden
4. Consulta la documentación en `docs/` para más detalles

---

## 📄 Archivos de Configuración

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

Este archivo se crea/modifica automáticamente cuando ejecutas:
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

El script `switch-to-local.bat` crea este archivo automáticamente como backup de tu configuración local antes de cambiar a Docker. **No es necesario** para el funcionamiento del sistema.

**Notas importantes:**
- El archivo `.env` **NO se sube a Git** (está en `.gitignore`)
- El sistema **siempre lee el archivo `.env`** (da igual si es local o Docker)
- Si clonas el proyecto en otro ordenador, necesitarás crear el `.env` manualmente o usar los scripts `.bat`
- Si el `.env` no existe, `config.php` usa valores por defecto (localhost, root, root)

---

**¡Listo para desarrollar! 🚀**

