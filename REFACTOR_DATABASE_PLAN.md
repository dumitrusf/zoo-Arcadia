# Plan de Refactorización de la Base de Datos

He leído y asimilado el nuevo diseño de la base de datos que propones. Me parece una excelente decisión, muy bien estructurada y profesional. Separar las responsabilidades de "quién es la persona" (`employees`) y "qué puede hacer en el sistema" (`users`) es una práctica muy sólida y escalable.

Has hecho un gran trabajo al definirlo. Ahora, como me pediste, te doy mi opinión y luego te organizo las etapas para implementarlo.

## Análisis del Diseño (Mi Opinión)

Tu esquema es casi perfecto. Los puntos fuertes son:

1.  **Claridad:** La separación entre `employees` y `users` es muy clara. Un empleado es una entidad de Recursos Humanos, un usuario es una entidad del sistema. ¡Genial!
2.  **Seguridad:** Centralizar el `role_id` y los permisos en el lado de `users` es la forma correcta de gestionar el acceso y la seguridad.
3.  **Escalabilidad:** El sistema de `roles` -> `role_permissions` -> `permissions` es un modelo de control de acceso basado en roles (RBAC) de manual. Te permitirá crear permisos muy granulares en el futuro sin problemas.

**Una pequeña observación para considerar (lo que "no cuadra del todo"):**

La restricción `UNIQUE` en `users.employee_id` establece una relación 1:1 estricta. Esto significa que **cada usuario DEBE estar asociado a un empleado, y solo a uno**.

Esto es correcto para la mayoría de los casos (veterinario, administrativo...). Sin embargo, te podrías encontrar con un problema si en el futuro necesitas un **usuario que no sea un empleado**. Por ejemplo:

*   Un "super administrador" que solo existe para mantenimiento del sistema.
*   Una cuenta de servicio para una API externa.

Con el diseño actual, no podrías crear ese tipo de usuarios porque no tendrías un `employee_id` al que asociarse.

**Sugerencia (tú decides):**
Podrías permitir que `users.employee_id` sea `NULL`. De esa forma, mantienes la relación 1:1 para los empleados (con la restricción `UNIQUE`), pero también te das la flexibilidad de tener usuarios que no son empleados.

---

## Plan de Acción en Etapas (Sin Tocar Código)

A continuación se detalla el plan de trabajo organizado en fases lógicas para que puedas implementarlo de forma ordenada.

### Etapa 1: Git y Preparación del Entorno

1.  **Crear una nueva rama en Git.** Es fundamental para no romper lo que ya funciona. Podrías llamarla `feature/refactor-database-users`.

### Etapa 2: Migración de la Base de Datos (Archivos SQL)

Este es el paso más delicado. Tenemos que transformar la estructura actual a la nueva.

1.  **Crear las nuevas tablas:**
    *   Crear un nuevo archivo SQL para la tabla `employees`.
    *   Crear la tabla `permissions`.
    *   Crear la tabla intermedia `role_permissions`.
2.  **Modificar la tabla `users` existente:**
    *   Añadir la columna `employee_id` (FK, `UNIQUE`, y decidir si será `NULL` o `NOT NULL`).
    *   Eliminar las columnas que ya no irán aquí (`u_first_name`, `u_last_name`).
3.  **Migrar los datos existentes:**
    *   Crear un script SQL que lea los nombres de la tabla `users` actual.
    *   Por cada usuario, insertar un nuevo registro en la tabla `employees`.
    *   Actualizar la tabla `users` para rellenar la nueva columna `employee_id` con el ID del empleado que acabas de crear.

### Etapa 3: Refactorización de los Modelos (PHP)

El código PHP que habla con la base de datos (los modelos) debe reflejar la nueva estructura.

1.  **Crear el modelo `Employee.php`:** Este modelo se corresponderá con la nueva tabla `employees`. Tendrá propiedades como `id`, `nombre`, `apellido`.
2.  **Crear (o renombrar) el modelo `User.php`:** El modelo que ahora se llama `Employee.php` debería pasar a llamarse `User.php` para corresponderse con la tabla `users`. Habrá que ajustarlo:
    *   Quitar las propiedades `first_name` y `last_name`.
    *   Añadir la propiedad `employee_id`.
3.  **Actualizar los métodos:** Los métodos como `check()`, `find()`, `create()` ahora serán más complejos. Por ejemplo, `check()` necesitará hacer un `JOIN` entre `users` y `employees` para obtener el nombre del empleado.

### Etapa 4: Refactorización de Controladores y Vistas

1.  **Controladores:** Ajustar todos los controladores (`employees_gest_controller.php`, etc.) para que usen los nuevos modelos (`User` y `Employee`). La lógica para crear un empleado/usuario ahora implicará guardar en dos tablas.
2.  **Vistas:** Actualizar las vistas (`start.php`, `edit.php`...) para que muestren los datos de los nuevos objetos. Por ejemplo, en lugar de `$employee->first_name`, quizás sea algo como `$user->employee->nombre`.
