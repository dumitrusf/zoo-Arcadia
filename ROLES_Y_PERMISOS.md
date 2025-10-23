#  Mapeo de Roles y Permisos en Zoo Arcadia

Este documento es la fuente de verdad que define qué acciones puede realizar cada rol dentro de la aplicación.

---

## 👑 Rol: Administrador (`ADMIN`)

El administrador tiene control casi total sobre la gestión del contenido y los usuarios del zoo.

### Permisos:
-   **Cuentas de Usuario (`users`):**
    -   `[x]` Crear
    -   `[x]` Leer
    -   `[x]` Actualizar
    -   `[x]` Borrar
-   **Servicios del Zoo (`services`):**
    -   `[x]` Crear
    -   `[x]` Leer
    -   `[x]` Actualizar
    -   `[x]` Borrar
-   **Animales del Zoo (`animals`):**
    -   `[x]` Crear
    -   `[x]` Leer
    -   `[x]` Actualizar
    -   `[x]` Borrar
-   **Testimonios de Visitantes (`testimonials`):**
    -   `[x]` Leer
    -   `[x]` Actualizar (Validar/Invalidar)
    -   `[x]` Borrar
-   **Sugerencias de Hábitats (`habitat_suggestions`):**
    -   `[x]` Leer
    -   `[x]` Actualizar (Aceptar/Rechazar)
    -   `[x]` Borrar
-   **Horarios del Zoo (`schedules`):**
    -   `[x]` Leer
    -   `[x]` Actualizar
-   **Hábitats del Zoo (`habitats`):**
    -   `[x]` Leer
    -   `[x]` Actualizar
-   **Informes Veterinarios (`vet_reports`):**
    -   `[x]` Solo Leer
-   **Estadísticas de Animales (`animal_stats`):**
    -   `[x]` Solo Leer

---

## 🩺 Rol: Veterinario (`VETERINARIO`)

El veterinario se enfoca exclusivamente en la salud y el bienestar de los animales y sus hábitats.

### Permisos:
-   **Informes Veterinarios (`vet_reports`):**
    -   `[x]` Crear
    -   `[x]` Leer
    -   `[x]` Actualizar
-   **Sugerencias de Mejoras de Hábitats (`habitat_suggestions`):**
    -   `[x]` Crear
    -   `[x]` Leer
    -   `[x]` Actualizar

---

## 👷 Rol: Empleado (`EMPLEADO`)

El empleado tiene tareas operativas relacionadas con los servicios del día a día, la alimentación y la interacción con los testimonios de los visitantes.

### Permisos:
-   **Testimonios de Visitantes (`testimonials`):**
    -   `[x]` Leer
    -   `[x]` Actualizar (Validar/Invalidar)
-   **Servicios del Zoo (`services`):**
    -   `[x]` Leer
    -   `[x]` Actualizar
-   **Alimentación de Animales (`animal_feeding`):**
    -   `[x]` Leer datos de comida
    -   `[x]` Actualizar y asignar datos de comida
