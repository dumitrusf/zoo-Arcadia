# 🦆 Plan de Implementación: Sistema de Permisos (RBAC + CQRS)

Este documento es nuestra guía y "chuleta" interna para construir el sistema de permisos y roles.

---

## 🎯 1. Principios Clave (Nuestras Reglas de Oro)

1.  **CQRS (Command Query Responsibility Segregation):**
    *   **✍️ Comandos (Escritura):** Toda modificación (`create`, `update`, `delete`, `assign`) se hará a través de los **Modelos de Dominio** (`Permission`, `Role`, `User`). Son los únicos guardianes de los datos.
    *   **🦆 Consultas (Lectura):** Las operaciones de lectura (`find`, `check`, `hasPermission`) serán flexibles. Pueden devolver objetos completos o arrays `FETCH_ASSOC` optimizados para velocidad.

2.  **No "Magic Strings":**
    *   Todos los nombres de los permisos se definirán como **constantes** en un único archivo: `App/permissions/PermissionList.php`.
    *   En el código, usaremos `PermissionList::USERS_CREATE` en lugar de `'crear-usuarios'` para evitar errores de tipeo y facilitar el mantenimiento.

3.  **Arquitectura de Dominios (Screaming Architecture):**
    *   **NO** se crearán nuevos dominios para las tablas pivote (`roles_permissions`, `user_permissions`).
    *   La lógica para gestionar estas relaciones vivirá **dentro de los modelos de los dominios implicados** (`Role` y `User`).

---

## 🗺️ 2. El Plan de Construcción en 3 Fases

### **Fase 1: El Catálogo Fijo de Permisos (Definido por Desarrolladores)**

**Objetivo:** Establecer una lista fija y centralizada de todos los permisos posibles en la aplicación, basados en los requisitos del cliente (PDF). **El administrador no crea, edita ni borra permisos; solo los utiliza.**

*   **Tarea #38: Crear el Contrato de Permisos**
    *   **Acción del Desarrollador:** Leer el PDF de requisitos del cliente e identificar todas las acciones singulares (ej: "gestionar horarios", "validar testimonio").
    *   **Archivo:** `App/permissions/PermissionList.php`.
    *   **Contenido:** Crear una `final class PermissionList` con una constante pública para cada acción identificada (`const GESTIONAR_HORARIOS = 'gestionar-horarios';`). Este archivo es la **única fuente de verdad**.

*   **Tarea #39 (Modificada): Poblar la Base de Datos con los Permisos**
    *   **Acción del Desarrollador:** Crear un script de `seed` (ej: en `database/seed_permissions.sql`) que inserte todos los permisos definidos en `PermissionList.php` en la tabla `permissions`.
    *   **Resultado:** La tabla `permissions` queda sincronizada con las constantes del código.

*   **Tareas #40, #41, #42: CRUD de Permisos (ELIMINADAS)**
    *   **Decisión Arquitectural:** Se elimina la necesidad de un CRUD de permisos para el administrador. Se reemplaza por una **vista de solo lectura** para que pueda consultar el catálogo.

### **Fase 2: El Creador de Llaveros (Dominio `roles`)**

**Objetivo:** En la página de edición de un Rol, poder asignarle un conjunto de permisos del catálogo fijo.

*   **Tarea #43: Fusionar Permisos para Crear un Rol**
    *   **Modelo:** Modificar `App/roles/models/role.php`.
        *   Añadir `getPermissions()`: **Consulta (Query)** para obtener los permisos actuales de un rol.
        *   Añadir `syncPermissions(array $permission_ids)`: **Comando (Command)** que borra los permisos antiguos del rol y asigna los nuevos. Debe usar una transacción.
    *   **Vista:** Modificar `App/roles/views/gest/edit.php`.
        *   Obtener todos los permisos disponibles con `Permission::check()`.
        *   Obtener los permisos que este rol ya tiene con `$role->getPermissions()`.
        *   Mostrar una lista de checkboxes con todos los permisos, marcando los que el rol ya posee.

### **Fase 3: La Tarjeta de Acceso del Usuario (Dominio `users`)**

**Objetivo:** Asignar un Rol principal a un usuario y, opcionalmente, añadirle permisos "VIP" directos, **evitando redundancias**.

*   **Tarea #44: Dar Permisos VIP a un Usuario**
    *   **Modelo:** Modificar `App/users/models/user.php`.
        *   Añadir `getDirectPermissions()`: **Consulta (Query)**.
        *   Añadir `syncDirectPermissions(array $permission_ids)`: **Comando (Command)**.
            *   **Lógica de Negocio Clave:** Antes de guardar, este método debe filtrar la lista de `$permission_ids` para **eliminar cualquier permiso que el usuario ya posea a través de su rol**. Solo se guardarán los permisos que sean verdaderamente adicionales.
    *   **Vista:** Modificar `App/users/views/gest/edit.php`.
        *   Añadir un dropdown para seleccionar el `role_id` del usuario.
        *   Añadir la misma lista de checkboxes de permisos para asignar permisos directos (VIP).
        *   **Mejora de UX:** La vista deberá **deshabilitar y marcar** visualmente los checkboxes de los permisos que el usuario ya tiene gracias a su rol seleccionado, para que el administrador sepa que no necesita asignarlos directamente.

---

## 📚 3. Desglose de Tareas Final (La Hoja de Ruta)

| Tarea | Descripción | Categoría | Rama BE/FE | Rama Git | Grupo |
| :--- | :--- | :--- | :--- | :--- | :--- |
| **38.** | **(BE)** Definir catálogo de permisos y poblar BD | `AT2.2 - Acceso a datos` | `BE-AT2.2` | `feature/auth-permissions-catalog`| `10 - Permisos`|
| **39.** | **(BE)** Leer catálogo de permisos (Modelo) | `AT2.2 - Acceso a datos` | `BE-AT2.2` | `feature/auth-read-permissions` | `10 - Permisos`|
| **39.1**| **(FE)** Crear vista de solo lectura de Permisos | `FE-AT_1.4 - Interfaces dinámicas` | `FE-AT1.4`|`feature/auth-view-permissions`| `10 - Permisos`|
| **43.** | **(BE/FE)** Fusionar permisos para crear un rol | `AT2.2 / FE-AT_1.4` | `BE-AT2.2` | `feature/crud-fusion-permissions` | `11 - Roles` |
| **44.** | **(BE/FE)** Dar 1 solo permiso a un usuario | `AT2.2 / FE-AT_1.4` | `BE-AT2.2` | `feature/crud-conced-1-permission`| `12 - Usuarios`|
| **45.** | **(BE)** Verificar si un usuario tiene un permiso | `AT2.3 - Lógica de negocio` | `BE-AT2.3` | `feature/auth-check-permission` | `13 - Seguridad` |

---

## 🚀 4. El Paso Final: La Integración (Los "Guardias de Seguridad")

**Objetivo:** Usar el sistema de permisos para proteger la aplicación de verdad.

*   **Tarea #45: Verificar si un Usuario Tiene un Permiso**
    *   **Modelo:** Modificar `App/users/models/user.php`.
    *   **Método Clave:** Crear `public function hasPermission($permission_name)`.
    *   **Lógica:** Esta función debe hacer una consulta SQL que revise si el permiso existe en la tabla `roles_permissions` (a través del `role_id` del usuario) **O** en la tabla `user_permissions` (a través del `id` del usuario). Devolverá `true` o `false`.

*   **Aplicación Práctica ("Poner los Guardias"):**
    *   **En Controladores (para bloquear acciones):**
        ```php
        if (!$currentUser->hasPermission(PermissionList::USERS_CREATE)) {
            // Redirigir a una página de "Acceso Denegado".
            header('Location: /acceso-denegado');
            exit();
        }
        ```
    *   **En Vistas (para ocultar botones/enlaces):**
        ```php
        <?php if ($currentUser->hasPermission(PermissionList::USERS_CREATE)): ?>
            <a href="/users/gest/create" class="button">Crear Nuevo Usuario</a>
        <?php endif; ?>
        ```
