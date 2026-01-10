# Zoo ARCADIA

Zoo management system developed in PHP with domain-based architecture (Screaming Architecture).

## Requirements

- **Git** - Version control
- **Composer** - PHP dependency manager
- **Node.js and npm** - For compiling assets (CSS/JS). npm includes npx automatically
- **Apache** - Web server (standalone installation recommended)
- **PHP** - PHP 7.4+ (standalone installation recommended)
- **MySQL or MariaDB** - Database (standalone installation recommended, or XAMPP/WAMP)
- **Docker Desktop** (optional) - For working with Docker

## Prerequisites Installation

### Git

**Windows:**
- Download from: https://git-scm.com/download/win
- Run the installer and follow the instructions

**Verify installation:**
```bash
git --version
```

### Node.js and npm

**Windows:**
1. Download from: https://nodejs.org/ (LTS version recommended)
2. Run the `.msi` installer
3. Accept the default options
4. Check the "Add to PATH" option if available

**Verify installation:**
```bash
node --version
npm --version
npx --version
```

**Note:** `npx` is automatically included with npm (version 5.2+).

### Composer

**Windows:**
1. Download from: https://getcomposer.org/download/
2. Download the `Composer-Setup.exe` installer
3. Run the installer (automatically detects PHP)
4. Accept the default options
5. Check the option to add Composer to the system PATH

**If you don't have PHP installed:**
- Option A: Install PHP manually (recommended): https://windows.php.net/download/
- Option B: Install XAMPP (includes PHP, MySQL and Apache): https://www.apachefriends.org/

**Verify installation:**
```bash
composer --version
```

**Note:** If after installing Composer it's not recognized in Git Bash, close and reopen Git Bash, or restart the terminal.

### Apache

**Standalone Installation (Recommended):**
- Download from: https://httpd.apache.org/download.cgi
- Select the Windows version (usually from Apache Lounge or similar)
- Extract to a folder (e.g., `C:\Apache24`), and rename it Apache
- Configure `httpd.conf` to point to your PHP installation
- Configure DocumentRoot to point to your project's `public` folder

**Install Apache as a Windows Service (Auto-start on boot):**
Open PowerShell as Administrator and run:
```powershell
cd C:\Apache\bin
.\httpd.exe -k install
```

This installs Apache as a Windows service and configures it to **start automatically when your PC boots**. The service name is usually `Apache2.4`.

**Start/Stop Apache Service:**
```powershell
# Start Apache service
.\httpd.exe -k start

# Stop Apache service
.\httpd.exe -k stop

# Restart Apache service
.\httpd.exe -k restart
```

**Alternative: Use Apache Service Commands:**
```powershell
# Start service
net start Apache2.4

# Stop service
net stop Apache2.4
```

**Note:** After installing as a service, Apache will start automatically on every PC boot. If you want to change this behavior, you can modify the service startup type in Windows Services (`services.msc`).

**Verify installation:**
- Open browser and go to `http://localhost` - you should see Apache's default page or your project
- Check Apache version in PowerShell:
  ```powershell
  cd C:\Apache\bin
  .\httpd.exe -v
  ```

**Note:** Make sure to configure `httpd.conf` to load PHP module and set the correct DocumentRoot.

### PHP

**Standalone Installation (Recommended):**
- Download from: https://windows.php.net/download/
- Download the Thread Safe version
- Extract to a folder (e.g., `C:\php`)
- Add PHP to system PATH
- Copy `php.ini-development` to `php.ini` and configure extensions

**Verify installation:**
```bash
php --version
```

**Check detailed PHP configuration:**
Create a file named `info.php` in your public folder with `<?php phpinfo(); ?>` and visit `http://localhost/info.php` (or your local server address).

### MySQL/MariaDB

#### Option A: MariaDB Standalone (Recommended)

**Download and Installation:**

1. **Download MariaDB:**
   - Go to: https://mariadb.org/download/
   - Select "Windows" as your platform
   - Choose the latest stable version (e.g., MariaDB 11.x)
   - Download the MSI installer

2. **Run the Installer:**
   - Run the downloaded `.msi` file
   - Accept the license agreement
   - Choose "Complete" installation type
   - Select installation directory (default: `C:\Program Files\MariaDB 11.4`)

3. **Configure Root Password:**
   - During installation, you'll be prompted to set a **root password**
   - Enter a secure password (remember it, you'll need it for database access)
   - Confirm the password

4. **Configure Service:**
   - Check "Install MariaDB as a Service"
   - Service name: `MariaDB` (default)
   - Check "Start the service after installation"
   - Port: `3306` (default)

5. **Complete Installation:**
   - Finish the installation
   - MariaDB will start automatically as a Windows service

**Using MariaDB:**

**From Command Line (MariaDB Client):**
```bash
# Connect to MariaDB
mysql -u root -p

# Enter your root password when prompted
# You'll see: MariaDB [(none)]>
```

**From Command Line (Execute SQL files):**
```bash
# Execute a SQL file
mysql -u root -p zoo_arcadia < database/02_tables.sql

# Or connect and run commands interactively
mysql -u root -p
USE zoo_arcadia;
SOURCE database/02_tables.sql;
```

**From Visual Studio Code:**
1. Install the "MySQL" extension (by WeChat)
2. Or install "SQLTools" extension with "SQLTools MySQL/MariaDB" driver
3. Create a connection:
   - Host: `localhost`
   - Port: `3306`
   - User: `root`
   - Password: (your root password)
   - Database: `zoo_arcadia`
4. Open `.sql` files and execute them using the extension

**Access phpMyAdmin (if installed separately):**
- phpMyAdmin is not included with standalone MariaDB
- To use phpMyAdmin, you need to install it separately or use XAMPP/WAMP
- If using XAMPP: Access at `http://localhost/phpmyadmin`
- If using WAMP: Access at `http://localhost/phpmyadmin`
- Login with:
  - Username: `root`
  - Password: (your MariaDB root password)

**Verify installation:**
```bash
# Check MariaDB version (MariaDB uses 'mysql' command for compatibility)
mysql --version

# Or if you have the specific MariaDB client in PATH:
mariadb --version

# Or check if service is running
# Open Services (services.msc) and look for "MariaDB" service
```

**Note:** If `mysql` or `mariadb` command is not found, you need to add the bin folder (e.g., `C:\Program Files\MariaDB 11.4\bin`) to your Windows PATH environment variable.

#### Option B: MySQL Standalone

**Download and Installation:**
- Download from: https://dev.mysql.com/downloads/mysql/
- Select the Windows version
- During installation, configure the root password
- Install as a Windows service

**Using MySQL:**
- Same commands as MariaDB (replace `mysql` with `mysql` - they're compatible)
- Default port: `3306`
- Default user: `root`

#### Option C: XAMPP (For beginners)

**Download and Installation:**
- Download from: https://www.apachefriends.org/
- Includes: Apache, MySQL, PHP and phpMyAdmin
- During installation, check MySQL to be installed
- After installation, start XAMPP Control Panel
- Start Apache and MySQL services

**Access phpMyAdmin with XAMPP:**
- Open browser: `http://localhost/phpmyadmin`
- Default login:
  - Username: `root`
  - Password: (leave empty by default, or set during XAMPP installation)

#### Option D: WAMP

**Download and Installation:**
- Download from: https://www.wampserver.com/
- Similar to XAMPP but Windows-specific
- Includes phpMyAdmin

**Access phpMyAdmin with WAMP:**
- Open browser: `http://localhost/phpmyadmin`
- Default login:
  - Username: `root`
  - Password: (leave empty by default)

### Docker Desktop (Optional)

**Only if you want to work with Docker:**
1. Download from: https://www.docker.com/products/docker-desktop/
2. Download Docker Desktop for Windows
3. Run the installer
4. Restart your computer when prompted
5. Open Docker Desktop and wait for it to finish starting

**Verify installation:**
```bash
docker --version
docker-compose --version
```

## Steps to Start the Project

### 1. Clone the Repository

```bash
git clone https://github.com/dumitrusf/zoo-Arcadia.git
cd zoo-ARCADIA
```

### 2. Install PHP Dependencies (Composer)

```bash
composer install
```

Installs all PHP dependencies defined in `composer.json` (Intervention Image, PHPMailer, Cloudinary, etc.)

### 3. Install Node.js Dependencies

```bash
npm install
```

Installs all development dependencies (Gulp, Sass, Terser, etc.) defined in `package.json`.

### 4. Configure the Database

**First time:** If you just cloned the project, you may not have the `.env` file. The `.bat` scripts will create it automatically, but if you prefer to create it manually, create a `.env` file in the project root with:

**For Local:**
```
DB_HOST=localhost
DB_NAME=zoo_arcadia
DB_USER=root
DB_PASS=root
```

**For Docker:**
```
DB_HOST=db
DB_NAME=zoo_arcadia
DB_USER=zoo_user
DB_PASS=zoo_password
```

#### Option A: Work with Local Database (Local MySQL/MariaDB)

If you have MySQL or MariaDB installed locally (XAMPP, WAMP, or standalone installation):

1. **Select local configuration:**
   ```bash
   .\switch-to-local.bat
   ```
   
   Creates/configures the `.env` file to use:
   - `DB_HOST=localhost`
   - `DB_USER=root`
   - `DB_PASS=root`
   
   **Note:** If `.env` doesn't exist, the script will try to create it. If there are problems, create it manually with the content above.

2. **Deploy the database:**
   ```bash
   .\deploy_database.bat
   ```
   
   This script:
   - Automatically detects your MySQL/MariaDB installation (XAMPP, WAMP, or standalone MariaDB)
   - Creates the `zoo_arcadia` database
   - Executes all SQL scripts in order:
     - `01_init.sql` - Initialization
     - `02_tables.sql` - Table creation
     - `03_constraints.sql` - Constraints and relationships
     - `06_seed_data.sql` - Test data

#### Option B: Work with Docker (Recommended)

**Why use Docker?**
When using Docker, **local versions of PHP, Apache, and MariaDB installed on Windows do not matter**. Docker creates isolated containers with the exact versions required by the project. This guarantees that the project works exactly the same on your PC and your Laptop, regardless of what you have installed locally.

**Steps:**

1. **Select Docker configuration:**
   ```bash
   .\switch-to-docker.bat
   ```
   
   Creates/configures the `.env` file to use:
   - `DB_HOST=db` (Docker service name)
   - `DB_USER=zoo_user`
   - `DB_PASS=zoo_password`
   
   **Note:** This script copies from `.env.docker` if it exists. If it doesn't exist, create it manually with the content above.

2. **Start the containers:**
   
   **First time (or if Dockerfile changed):**
   ```bash
   docker-compose up -d --build
   ```
   This builds the images from scratch and starts the services.

   **Daily use:**
   ```bash
   docker-compose up -d
   ```
   This simply starts the existing containers (much faster).

3. **Install dependencies inside Docker:**
   It is recommended to run Composer inside the container to ensure compatibility:
   ```bash
   docker-compose exec web composer install
   ```

4. **Compile Assets (locally):**
   Node/npm dependencies are only for compiling static files, so use your local installation:
   ```bash
   npm install
   npx gulp buildCss && npx gulp buildJs
   ```

**The project will be available at:** http://localhost:8080

### 5. Compile Assets (CSS and JavaScript)

Before starting the project, compile the CSS and JavaScript files:

```bash
npx gulp buildCss && npx gulp buildJs
```

This:
- Compiles SCSS files from `src/scss/` to CSS in `public/build/css/`
- Compiles and minifies JS files from `src/js/` to JavaScript in `public/build/js/`

**Note:** If you modify files in `src/scss/` or `src/js/`, run this command again to see the changes.

### 6. Start the Project

#### Option A: With Docker (Recommended)

```bash
docker-compose restart web
```

Or if it's the first time:

```bash
docker-compose up -d
```

The project will be available at: **http://localhost:8080**

#### Option B: With PHP Built-in Server (Local)

If you work without Docker:

1. **Switch to local configuration:**
   ```bash
   .\switch-to-local.bat
   ```

2. **Start the PHP server:**
   ```bash
   php -S localhost:3001 -t public public/index.php
   ```

3. **In another terminal, watch and compile assets:**
   ```bash
   npx gulp
   ```
   This will watch for changes in SCSS/JS files and recompile automatically.

**Why this works:**
- `-t public`: Sets DocumentRoot to `public/`, matching Docker/Apache.
- `public/index.php`: Smart router that serves `/build/`, `/src/`, and `/node_modules/` correctly.
- `npx gulp`: Compiles assets and watches for changes with BrowserSync.

The project will be available at: **http://localhost:3001**

## Stop the Project

### If you use Docker:

```bash
docker-compose down
```

This stops and removes the containers (but **does NOT** delete the database data).

### If you use PHP Built-in Server:

Press `Ctrl + C` in the terminal where the server is running.

## Update the Database

If changes have been made to the database structure (new tables, columns, constraints, etc.), apply those changes:

### For Local Database:

1. **Make sure you're in local mode:**
   ```bash
   .\switch-to-local.bat
   ```

2. **Run the deploy:**
   ```bash
   .\deploy_database.bat
   ```

   ⚠️ **WARNING:** This script **will delete and recreate** the database. All existing data will be lost.

### For Docker Database:

There are two options depending on whether you want to keep the data or start from scratch:

#### Option 1: Apply Changes WITHOUT Losing Data (Keep persistent data)

**Use when:**
- You already have important data in the database
- You only changed a specific SQL script
- You want to keep existing data

**Example: Change a column in `database/02_tables.sql` but keep the data**

**Steps:**

1. **Make sure Docker is running:**
   ```bash
   docker-compose ps
   ```
   Should show `zoo-arcadia-db` as "Up". If it's not running:
   ```bash
   docker-compose up -d
   ```

2. **Run ONLY the script you changed** against the Docker container:
   
   **If you changed `02_tables.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/02_tables.sql
   ```
   
   **If you changed `03_constraints.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/03_constraints.sql
   ```
   
   **If you changed `04_indexes.sql`:**
   ```bash
   docker exec -i zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia < database/04_indexes.sql
   ```

3. The change has been applied and the data remains.

**⚠️ IMPORTANT:**
- This method only works if your SQL script has commands like `ALTER TABLE` or `CREATE TABLE IF NOT EXISTS`
- If your script has `DROP TABLE` or `CREATE TABLE` without `IF NOT EXISTS`, it may cause errors
- If there are errors, use Option 2 (recreate from scratch)

**Example of a change that works with this method:**
```sql
-- In database/02_tables.sql
ALTER TABLE animals ADD COLUMN nueva_columna VARCHAR(100);
```

**Example of a change that does NOT work with this method:**
```sql
-- In database/02_tables.sql
DROP TABLE IF EXISTS animals;
CREATE TABLE animals (...);
```
(In this case, use Option 2)

#### Option 2: Recreate the Database from Scratch (Deletes all data)

**Use when:**
- You don't mind losing the data
- You made important changes to multiple scripts
- You want to start completely clean
- It's simpler and guarantees everything works

**Example: Change a column in `database/02_tables.sql`**

**Steps:**

1. **Edit the file** `database/02_tables.sql` and make the change (for example, add a column to the `animals` table)

2. **Run these 2 commands in Git Bash:**
   ```bash
   docker-compose down -v
   docker-compose up -d
   ```

3. Docker automatically:
   - Deletes the old database (that's why the `-v`)
   - Creates a new empty database
   - Executes all SQL scripts in order:
     - `01_init.sql` → Creates the database
     - `02_tables.sql` → Creates the tables (with your change)
     - `03_constraints.sql` → Adds relationships
     - `04_indexes.sql` → Creates indexes
     - `05_procedures.sql` → Creates procedures
     - `06_seed_data.sql` → Inserts test data

**Why `-v`?**
- The `-v` flag removes **volumes** (where Docker stores database data)
- Without `-v`, Docker wouldn't run the SQL scripts again (only runs them the first time)
- With `-v`, Docker runs all scripts automatically

**⚠️ WARNING:** 
- This **deletes all data** from the database
- If you have important data, make a backup first or use Option 1

#### Which option to use?

- **Option 1** → If you have important data and only changed a specific script
  - ✅ Keeps all existing data
  - ✅ If you delete `seed_data.sql`, the data remains
  - ✅ Only runs the script you specify
  
- **Option 2** → If you don't mind losing data or want to start clean (simpler)
  - ⚠️ Deletes all data
  - ⚠️ If you delete `seed_data.sql`, there will be no test data
  - ✅ Runs all scripts from scratch

#### Verify that changes were applied:

Connect to the Docker database to verify:

```bash
# Connect to the database
docker exec -it zoo-arcadia-db mariadb -uzoo_user -pzoo_password zoo_arcadia

# Inside MariaDB, run:
SHOW TABLES;
DESCRIBE nombre_de_tabla;
EXIT;
```

Or use a graphical client like DBeaver, MySQL Workbench, or phpMyAdmin connecting to:
- **Host:** `localhost`
- **Port:** `3306`
- **User:** `zoo_user`
- **Password:** `zoo_password`
- **Database:** `zoo_arcadia`

## Project Structure

```
zoo-ARCADIA/
├── App/                    # Application code (MVC by domain)
├── public/                 # Public entry point
│   ├── index.php          # Main router
│   └── build/             # Compiled files (CSS/JS)
├── src/                    # Source code (SCSS/JS)
│   ├── scss/              # Source styles
│   └── js/                # Source JavaScript
├── database/               # Database SQL scripts
├── includes/               # Shared functions and helpers
├── vendor/                 # PHP dependencies (Composer)
├── node_modules/          # Node.js dependencies
├── composer.json          # PHP dependencies
├── package.json           # Node.js dependencies
├── docker-compose.yml     # Docker configuration
└── gulpfile.js           # Gulp compilation tasks
```

## Useful Commands

### Compile Assets

```bash
# Compile CSS and JavaScript
npx gulp buildCss && npx gulp buildJs

# Compile CSS only
npx gulp buildCss

# Compile JavaScript only
npx gulp buildJs
```

### Docker

```bash
# Start services
docker-compose up -d

# Restart web service
docker-compose restart web

# View logs
docker-compose logs -f web

# Stop services
docker-compose down

# Stop and remove volumes (deletes DB)
docker-compose down -v
```

### Switch between Local and Docker

```bash
# Switch to local configuration
.\switch-to-local.bat

# Switch to Docker configuration
.\switch-to-docker.bat
```

## Common Problems

### Project doesn't load CSS/JS

**Solution:** Compile the assets:
```bash
npx gulp buildCss && npx gulp buildJs
```

### Database connection error

**Solution:** 
1. Verify that MySQL/MariaDB is running
2. Verify the `.env` file has the correct configuration
3. If you use Docker, verify that the `zoo-arcadia-db` container is running:
   ```bash
   docker-compose ps
   ```

### `deploy_database.bat` doesn't find MySQL

**Solution:** The script looks for MySQL/MariaDB in these paths:
- `C:\Program Files\MariaDB 11.4\bin\mariadb.exe`
- `C:\xampp\mysql\bin\mysql.exe`
- `C:\wamp64\bin\mysql\mysql8.0.31\bin\mysql.exe`

If your installation is in another path, edit `deploy_database.bat` and add your path.

### Changes in SCSS/JS don't reflect

**Solution:** Recompile after each change:
```bash
npx gulp buildCss && npx gulp buildJs
```

## Configuration Files

### .gitignore

This file defines which files and folders **are NOT** uploaded to the Git repository:

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

**Ignored files:**
- `/node_modules` - Node.js dependencies (installed with `npm install`)
- `/vendor` - PHP dependencies (installed with `composer install`)
- `/.env` - Environment variables (sensitive configuration, not uploaded)
- `/docs/*` - Documentation (not uploaded to repo)
- `/.cursor` - Cursor editor configuration

### .env Files

The `.env` file contains the database configuration and **is NOT uploaded to Git** for security.

#### .env (Main file - the one the system uses)

**This is the only file the system actually uses.** The `config.php` file reads this file to get the database configuration.

This file is created/modified automatically when you run:
- `switch-to-local.bat` → Modifies `.env` for local configuration
- `switch-to-docker.bat` → Modifies `.env` for Docker configuration

**Content for Local:**
```
DB_HOST=localhost
DB_NAME=zoo_arcadia
DB_USER=root
DB_PASS=root
```

**Content for Docker:**
```
DB_HOST=db
DB_NAME=zoo_arcadia
DB_USER=zoo_user
DB_PASS=zoo_password
```

**Important note:** The system **always uses the `.env` file**, whether you're on local or Docker. The `.bat` scripts only modify this file to switch between configurations.

#### .env.docker (Optional - template/example only)

This file is **just a template example**. The `switch-to-docker.bat` script tries to copy it as `.env` if it exists, but **it's not necessary** for the system to work.

If it doesn't exist, the `switch-to-docker.bat` script simply modifies the `.env` directly with Docker values.

**Content (reference only):**
```
DB_HOST=db
DB_NAME=zoo_arcadia
DB_USER=zoo_user
DB_PASS=zoo_password
```

#### .env.local (Optional - automatic backup)

The `switch-to-local.bat` script creates this file automatically as a backup of the local configuration before switching to Docker. **Not necessary** for the system to function.

**Important notes:**
- The `.env` file **is NOT uploaded to Git** (it's in `.gitignore`)
- The system **always reads the `.env` file** (whether local or Docker)
- If you clone the project on another computer, you'll need to create the `.env` manually or use the `.bat` scripts
- If the `.env` doesn't exist, `config.php` uses default values (localhost, root, root)

## Important Notes

- Compile assets before starting the project or after modifying files in `src/`
- The `.env` file controls the database configuration. Use it to switch between local and Docker.
- SQL scripts in `database/` are executed in numerical order. Do not modify the file names.
- Docker is the recommended way to work, as it guarantees a consistent environment.

## 🛑 How to STOP using Docker and switch to Local

If you want to stop using Docker and run the project locally (XAMPP/WAMP/Standalone):

1. **Stop Docker Containers:**
   ```bash
   docker-compose down
   ```

2. **Switch Configuration to Local:**
   ```bash
   .\switch-to-local.bat
   ```
   *This updates your `.env` file to point to `localhost`.*

3. **Ensure Local Database is Running:**
   - Start your local MySQL/MariaDB service (via XAMPP Control Panel or Services).

4. **Import Database (if needed):**
   - If you need to recreate the database locally:
     ```bash
     .\deploy_database.bat
     ```
   - *Note: This will erase any existing local data.*

5. **Start Local PHP Server:**
   ```bash
   php -S localhost:3001 -t public public/index.php
   ```

6. **(Optional) Watch and auto-compile assets:**
   In another terminal:
   ```bash
   npx gulp
   ```

Now you are running entirely on your local machine, without Docker.
