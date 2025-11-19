# 🦆 Guía de Construcción Paso a Paso para el Sistema de Permisos

Hola, soy tu patito de goma. Esta es tu guía personal. Sigue estos pasos uno por uno, en orden, y construiremos juntos el mejor sistema de permisos del mundo. ¡Vamos allá!

---

## **FASE 1: Construir la Biblioteca de Permisos (Tareas 38, 39, 39.1)**

**Objetivo:** Crear el "catálogo" de todos los permisos que existen y una página para que el administrador pueda verlos (pero no tocarlos).

### **Tarea #38: Definir el Catálogo de Permisos y Poblar la Base de Datos**

*   **Paso 1: Preparar tu Espacio de Trabajo (Git)**
    1.  Abre tu terminal.
    2.  Ve a la rama principal: `git checkout main`
    3.  Asegúrate de tener lo último: `git pull`
    4.  Crea una nueva rama para esta tarea: `git checkout -b feature/auth-permissions-catalog`
    5.  ¡Listo! Ahora estás en un lugar seguro para trabajar.

*   **Paso 2: Crear el "Diccionario" de Permisos (`PermissionList.php`)**
    1.  Crea un nuevo archivo en: `App/permissions/PermissionList.php`
    2.  Abre el archivo y pega este código. Es nuestro "diccionario" para no usar texto plano.
        ```php
        <?php
        // App/permissions/PermissionList.php

        final class PermissionList {
            // No queremos que nadie cree un objeto de esta clase
            private function __construct() {}

            // --- PERMISOS DE USUARIOS ---
            const USERS_VIEW_LIST = 'ver-lista-usuarios';
            const USERS_CREATE = 'crear-usuarios';
            const USERS_EDIT = 'editar-usuarios';
            const USERS_DELETE = 'eliminar-usuarios';

            // --- PERMISOS DE ROLES ---
            const ROLES_VIEW_LIST = 'ver-lista-roles';
            const ROLES_CREATE = 'crear-roles';
            const ROLES_EDIT = 'editar-roles';
            const ROLES_DELETE = 'eliminar-roles';
            
            // --- AÑADE AQUÍ MÁS PERMISOS BASADOS EN EL PDF DEL CLIENTE ---
        }
        ```
    3.  **¡ACCIÓN!** Abre el PDF del cliente y añade más constantes por cada acción que encuentres.

*   **Paso 3: Llenar la Base de Datos (`seed_permissions.sql`)**
    1.  Crea un nuevo archivo en: `database/2025_10_23_seed_permissions.sql`
    2.  Pega este código SQL. Esto llenará tu tabla `permissions` con los mismos permisos que pusiste en `PermissionList.php`. ¡Deben coincidir!
        ```sql
        -- database/2025_10_23_seed_permissions.sql
        INSERT INTO `permissions` (`permission_name`, `permission_desc`) VALUES
        ('ver-lista-usuarios', 'Permite ver la lista de todos los usuarios del sistema.'),
        ('crear-usuarios', 'Permite crear nuevos usuarios.'),
        ('editar-usuarios', 'Permite editar la información de los usuarios existentes.'),
        ('eliminar-usuarios', 'Permite eliminar usuarios del sistema.'),
        ('ver-lista-roles', 'Permite ver la lista de todos los roles del sistema.'),
        ('crear-roles', 'Permite crear nuevos roles.'),
        ('editar-roles', 'Permite editar los roles existentes.'),
        ('eliminar-roles', 'Permite eliminar roles del sistema.');
        -- AÑADE AQUÍ LOS MISMOS PERMISOS QUE EN PermissionList.php
        ```
    3.  **¡ACCIÓN!** Ejecuta este archivo SQL en tu base de datos para que se inserten los datos.

*   **Paso 4: Guardar tu Trabajo (Git)**
    1.  Añade tus nuevos archivos: `git add .`
    2.  Crea un "punto de guardado": `git commit -m "feat(auth): define permissions catalog and seed"`
    3.  Sube tus cambios a la nube: `git push origin feature/auth-permissions-catalog`
    4.  **¡Felicidades! Has completado la Tarea #38.**

---

### **Tarea #39 (Backend): Crear el Modelo para Leer Permisos**

*   **Paso 1: Preparar tu Espacio de Trabajo (Git)**
    1.  Vuelve a la rama principal: `git checkout main`
    2.  Actualiza tu rama: `git pull`
    3.  Crea la nueva rama para esta tarea: `git checkout -b feature/auth-read-permissions`

*   **Paso 2: Crear el Modelo `permission.php`**
    1.  Crea un nuevo archivo en: `App/permissions/models/permission.php`
    2.  Pega este código. Es la clase que sabrá cómo hablar con la tabla `permissions`.
        ```php
        <?php
        // App/permissions/models/permission.php

        class Permission
        {
            public $id_permission;
            public $permission_name;
            public $permission_desc;

            public function __construct($id, $name, $desc)
            {
                $this->id_permission = $id;
                $this->permission_name = $name;
                $this->permission_desc = $desc;
            }

            // Esta es una CONSULTA (Query de CQRS)
            // Devuelve una lista simple y rápida de todos los permisos.
            public static function check()
            {
                $connectionDB = DB::createInstance();
                $sql = $connectionDB->query("SELECT * FROM permissions ORDER BY permission_name ASC");
                
                // Devolvemos un array simple de arrays, ¡optimizado para lectura!
                return $sql->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        ```

*   **Paso 3: Guardar tu Trabajo (Git)**
    1.  Añade tu nuevo archivo: `git add .`
    2.  Crea el punto de guardado: `git commit -m "feat(auth): create permission model with read method"`
    3.  Sube tus cambios: `git push origin feature/auth-read-permissions`
    4.  **¡Felicidades! Has completado la Tarea #39.**

---

### **Tarea #39.1 (Frontend): Crear la Vista de Solo Lectura**

*   **Paso 1: Preparar tu Espacio de Trabajo (Git)**
    1.  Vuelve a la rama principal: `git checkout main`
    2.  Actualízala: `git pull`
    3.  Crea la nueva rama: `git checkout -b feature/auth-view-permissions`

*   **Paso 2: Crear el Controlador (`permissions_pages_controller.php`)**
    1.  Crea una nueva carpeta: `App/permissions/controllers`
    2.  Crea un nuevo archivo dentro: `App/permissions/controllers/permissions_pages_controller.php`
    3.  Pega este código. El controlador es el "cerebro" que pide los permisos y se los pasa a la vista.
        ```php
        <?php
        // App/permissions/controllers/permissions_pages_controller.php
        require_once __DIR__ . '/../models/permission.php';

        class PermissionsPagesController {
            public function start() {
                // 1. Pedimos al modelo la lista de todos los permisos
                $permissions = Permission::check();

                // 2. Incluimos la vista y le pasamos la lista
                require_once __DIR__ . '/../views/pages/start.php';
            }
        }
        ```

*   **Paso 3: Crear la Vista (`start.php`)**
    1.  Crea dos nuevas carpetas: `App/permissions/views` y dentro `App/permissions/views/pages`
    2.  Crea un nuevo archivo dentro: `App/permissions/views/pages/start.php`
    3.  Pega este código. Esta es la tabla HTML que el administrador verá.
        ```php
        <!-- App/permissions/views/pages/start.php -->
        <h1>Catálogo de Permisos del Sistema (Solo Lectura)</h1>
        <p>Estos son todos los permisos definidos en el código. No se pueden modificar desde aquí.</p>
        
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre del Permiso (Clave)</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($permissions as $permission): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($permission['permission_name']); ?></td>
                        <td><?php echo htmlspecialchars($permission['permission_desc']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        ```
        
*   **Paso 4: Crear el Router del Dominio (`permissionsRouter.php`)**
    1.  Crea el archivo: `App/permissions/permissionsRouter.php`
    2.  Pega este código. Es el "recepcionista" que dirige las peticiones dentro del dominio de permisos.
        ```php
        <?php
        // App/permissions/permissionsRouter.php
        require_once __DIR__ . '/controllers/permissions_pages_controller.php';

        $controller = new PermissionsPagesController();
        $controller->start();
        ```

*   **Paso 5: Conectar el Dominio al Router Principal**
    1.  Abre el archivo `App/router.php`.
    2.  Busca la línea `$allowed_domains = [...]`.
    3.  Añade `'permissions'` a la lista. Debería quedar algo así:
        ```php
        // App/router.php
        $allowed_domains = ['employees', 'roles', 'users', 'permissions']; // <-- AÑADIDO
        ```

*   **Paso 6: Guardar tu Trabajo (Git)**
    1.  Añade todos tus archivos nuevos: `git add .`
    2.  Crea el punto de guardado: `git commit -m "feat(auth): create read-only view for permissions"`
    3.  Sube tus cambios: `git push origin feature/auth-view-permissions`
    4.  **¡Felicidades! Has completado la Tarea #39.1.** Ahora deberías poder ir a la URL de tu app que apunte al dominio `permissions` y ver la tabla.

---
*(Esta guía continuará con las Fases 2 y 3 una vez completemos esta primera parte...)*
