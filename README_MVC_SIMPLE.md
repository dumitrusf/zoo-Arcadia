# Chuleta Rápida de MVC (Modelo-Vista-Controlador) con Ejemplos de "Employees"

Esta es una guía súper simple para recordar el papel de cada pieza en la arquitectura MVC, usando el código de nuestro dominio `employees`.

---

## 1. El Modelo (`Model`) - El Experto en Datos

**Su ÚNICO trabajo:** Hablar con la base de datos. No sabe nada de HTML ni de cómo se ven las cosas. Es un especialista en datos.

*   **Archivo de ejemplo:** `App/employees/models/employee.php`
*   **Misión:** Obtener datos (`SELECT`), guardar datos (`INSERT`), actualizarlos (`UPDATE`), etc.

### Ejemplo 1: Obtener todos los empleados (`check`)

El Modelo tiene un método `check()` que busca todos los usuarios y los devuelve. Es como pedirle al almacén: "Dame una lista de todo el inventario".

```php
// En: App/employees/models/employee.php
class Employee {
    public static function check() {
        // ... (conexión a la BDD) ...
        $sql = $connectionDB->query("SELECT * FROM users");
        // ... (recorre los resultados y devuelve una lista de empleados) ...
        return $employeesList;
    }
}
```

### Ejemplo 2: Crear un nuevo empleado (`create`)

El Modelo tiene un método `create()` que recibe los datos de un nuevo empleado y los guarda en la base de datos. Es como decirle al almacén: "Añade este nuevo producto a la estantería".

```php
// En: App/employees/models/employee.php
class Employee {
    public static function create($first_name, $last_name, $email, $role_id, $psw) {
        // ... (conexión a la BDD) ...
        $query = "INSERT INTO users (u_first_name, ...) VALUES (?, ?, ...)";
        // ... (prepara y ejecuta la consulta con los datos) ...
        return $connectionDB->lastInsertId(); // Devuelve el ID del nuevo empleado
    }
}
```

---

## 2. El Controlador (`Controller`) - El Cerebro

**Su ÚNICO trabajo:** Orquestar. Es el intermediario que recibe las órdenes del usuario y decide qué hacer. No habla directamente con la base de datos ni pinta HTML. Da órdenes.

*   **Archivo de ejemplo:** `App/employees/controllers/employees_gest_controller.php`
*   **Misión:**
    1.  Recibir una petición (p. ej., "el usuario quiere ver la lista de empleados").
    2.  Pedirle los datos necesarios al **Modelo**.
    3.  Pasarle esos datos a la **Vista** para que los muestre.

### Ejemplo 1: Mostrar la lista de empleados (`start`)

El Controlador, en su método `start()`, le pide al **Modelo** la lista de todos los empleados y luego le dice a la **Vista** `start.php` que se muestre.

```php
// En: App/employees/controllers/employees_gest_controller.php
class EmployeesGestController {
    public function start() {
        // 1. Pide los datos al Modelo
        $employees = Employee::check(); 
        
        // 2. (Opcional) Puedes hacer cosas con los datos, como imprimirlos para depurar
        print_r($employees);
        
        // 3. Carga la Vista para que pinte la página
        include_once __DIR__ . "/../views/gest/start.php";
    }
}
```

### Ejemplo 2: Crear un nuevo empleado (`create`)

El Controlador, en su método `create()`, comprueba si le han enviado datos por `$_POST`. Si es así, se los pasa al **Modelo** para que los guarde. Después, carga la **Vista** `create.php` (que contiene el formulario).

```php
// En: App/employees/controllers/employees_gest_controller.php
class EmployeesGestController {
    public function create() {
        // 1. Comprueba si el usuario ha enviado el formulario
        if ($_POST) {
            // 2. Recoge los datos del formulario
            $first_name = $_POST['firstname'];
            // ... (recoge el resto de datos) ...

            // 3. Le pasa los datos al Modelo para que los guarde
            $employee_id = Employee::create($first_name, ...);
        }
        
        // 4. Carga la Vista que contiene el formulario HTML
        include_once __DIR__ . "/../views/gest/create.php";
    }
}
```

---

## 3. La Vista (`View`) - El Artista

**Su ÚNICO trabajo:** Pintar el HTML. Es "tonta", no toma decisiones. Solo recibe datos del Controlador y los muestra de forma bonita.

*   **Archivo de ejemplo:** `App/employees/views/gest/create.php`
*   **Misión:** Contener el código HTML y usar `<?php echo ...; ?>` para mostrar los datos que le ha pasado el Controlador.

### Ejemplo: Formulario para crear un empleado

La vista `create.php` es puro HTML. Su única "lógica" es el `action` del formulario, que se enviará a sí mismo para que el **Controlador** pueda procesar los datos en el siguiente ciclo.

```html
<!-- En: App/employees/views/gest/create.php -->

<!--
    Este es el formulario. Cuando el usuario hace clic en "Submit", 
    los datos se envían por POST. El Controlador (`create` method) 
    verá que existe `$_POST` y llamará al Modelo.
-->
<form action="" method="post">

    <div class="mb-3">
        <label for="firstname" class="form-label">Name:</label>
        <input type="text" class="form-control" name="firstname" required>
    </div>

    <!-- ... (resto de campos del formulario) ... -->

    <div class="card-footer text-end">
        <input type="submit" class="btn btn-success" value="Register Employee">
    </div>
</form>
```

