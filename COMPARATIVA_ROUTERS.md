# ⚔️ Comparativa de Routers: Simple vs. Avanzado

Este documento explica las diferencias fundamentales entre nuestro `router.php` original (Simple) y la arquitectura de enrutamiento avanzada propuesta en `README_ARQUITECTURA_AVANZADA.MD`.

---

## 🔬 1. Análisis del Router Simple (Nuestro `router.php` actual)

Este es el código que hemos estado usando. Es funcional, pero tiene limitaciones importantes para un proyecto que quiere crecer.

```php
<?php
// App/router.php (Versión Simple)

// --- COMENTARIO 1: ACOPLAMIENTO A $_GET ---
// El router depende directamente de la existencia de `$_GET`. 
// Esto nos obliga a usar URLs "feas" como `?domain=employees&controller=pages`.
$domain = $_GET["domain"] ?? "employees";
$controller = $_GET["controller"] ?? "pages";
$action = $_GET["action"] ?? "start";

// --- COMENTARIO 2: CONVENCIÓN DE NOMBRES RÍGIDA Y CENTRALIZADA ---
// Esta línea es el corazón del problema. ¡Es una "bomba de relojería"!
// FUERZA a que todos los controladores del sistema sigan EXACTAMENTE la misma estructura de nombres:
// `dominio_controlador_controller.php` (ej: `employees_pages_controller.php`).
// ¿Qué pasa si un dominio necesita una estructura diferente? No puede.
// ¿Qué pasa si queremos añadir un subdirectorio? No podemos.
// Toda la lógica de cómo encontrar un archivo está centralizada aquí.
include_once __DIR__ . "/" . $domain . "/controllers/" . $domain . "_" . $controller . "_controller.php";

// --- COMENTARIO 3: CONSTRUCCIÓN DE CLASES TAMBIÉN CENTRALIZADA ---
// Similar al punto anterior, forzamos a que el nombre de la CLASE también siga una regla fija:
// `EmployeesPagesController`.
// El router principal necesita saber los detalles íntimos de cómo cada dominio nombra sus clases.
$controllerClassName = ucfirst($domain) . ucfirst($controller) . "Controller";

// --- COMENTARIO 4: LÓGICA DE VISTAS MEZCLADA ---
// El router no solo se encarga de encontrar el controlador, sino que también se mete
// en el trabajo de cómo se renderiza la vista (usando `ob_start`).
// Esto rompe el "Principio de Responsabilidad Única": un router debería enrutar, no renderizar.
ob_start(); 
$controllerInstance = new $controllerClassName();
$controllerInstance->$action();
$viewContent = ob_get_clean(); 

// --- COMENTARIO 5: RESPONSABILIDAD DE CARGAR EL TEMPLATE ---
// ¡Otro problema! El router principal también es responsable de cargar el `template.php` de cada dominio.
// Sabe demasiado sobre la estructura interna de las vistas de cada dominio.
require_once __DIR__ . "/{$domain}/views/template.php";
?>
```

### **Conclusión del Router Simple:**
Es un "Chico para todo". Hace de router, de cargador de archivos, de constructor de clases y de motor de plantillas. Funciona para un proyecto pequeño, pero es un **cuello de botella** para crecer y para el trabajo en equipo.

---

## ✨ 2. Análisis del Router Avanzado (Sistema de 3 Niveles)

Esta arquitectura divide el trabajo en tres especialistas, cada uno con una única misión.

### **Nivel 1: El Portero (`index.php` en la raíz)**

```php
<?php
// index.php (El Portero)

// --- COMENTARIO A: PUNTO DE ENTRADA ÚNICO ---
// TODO el tráfico de la aplicación pasa por aquí. Es el único archivo que el servidor necesita conocer.
// Esto es un patrón de diseño profesional llamado "Front Controller".

// --- COMENTARIO B: MANEJO DE URLS "BONITAS" ---
// Esta es la magia. Transforma una URL amigable como `/employees/gest/create`
// en las variables `$_GET` que nuestra aplicación ya sabe usar.
// Separa el "cómo se ve la URL" del "cómo funciona la app por dentro".
$path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
$parts = explode('/', $path);
$_GET['domain'] = $parts[0] ?? 'home';
$_GET['controller'] = $parts[1] ?? 'pages';
$_GET['action'] = $parts[2] ?? 'start';

// --- COMENTARIO C: DELEGACIÓN TOTAL ---
// La única misión del portero es preparar las variables y luego pasarle el trabajo
// al siguiente nivel. No sabe nada de dominios, ni de controladores. Solo limpia la URL.
require_once 'App/router.php';
?>
```

### **Nivel 2: El Guardia Central (`App/router.php` mejorado)**

```php
<?php
// App/router.php (El Guardia Central)

$domain = $_GET['domain'] ?? 'home';

// --- COMENTARIO D: LISTA DE INVITADOS (SEGURIDAD) ---
// La única responsabilidad de este archivo es la seguridad y la delegación de alto nivel.
// Mantiene una "lista blanca" de dominios que existen. Si un dominio no está aquí, es rechazado.
$allowed_domains = ['employees', 'roles', 'users', 'permissions'];

if (in_array($domain, $allowed_domains)) {
    
    // --- COMENTARIO E: DELEGACIÓN A EXPERTOS ---
    // ¡Esta es la clave de la arquitectura!
    // El Guardia Central NO SABE NADA sobre cómo funciona el dominio `employees`.
    // Su único trabajo es decir: "Ah, es para `employees`... pues que se encargue el experto de `employees`".
    // Le pasa el control total al "Recepcionista" de ese dominio.
    $domainRouterPath = __DIR__ . "/{$domain}/{$domain}Router.php";

    if (file_exists($domainRouterPath)) {
        require_once $domainRouterPath;
    } else {
        // ... Manejo de error ...
    }
} else {
    // ... Error 404 ...
}
?>
```

### **Nivel 3: El Recepcionista de Dominio (ej: `employeesRouter.php`)**

```php
<?php
// App/employees/employeesRouter.php (El Recepcionista Experto)

// --- COMENTARIO F: AUTONOMÍA TOTAL DEL DOMINIO ---
// Este archivo es el DUEÑO de la lógica de enrutamiento DENTRO del dominio `employees`.
// Solo él sabe cómo se llaman sus controladores y dónde están.
$controller = $_GET['controller'] ?? 'pages';
$action = $_GET['action'] ?? 'start';

// --- COMENTARIO G: REGLAS DE NOMENCLATURA PROPIAS ---
// Si mañana el equipo de `employees` decide cambiar sus nombres de `Employees...Controller` a
// `Controller_..._Employee`, solo tienen que cambiarlo AQUÍ.
// El resto de la aplicación no se entera. ¡Esto permite trabajo en equipo sin conflictos!
$controllerClassName = "Employees" . ucfirst($controller) . "Controller";
$controllerFile = __DIR__ . "/controllers/{$controllerClassName}.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    // --- COMENTARIO H: RESPONSABILIDAD DE EJECUCIÓN ---
    // El recepcionista se encarga de crear la instancia del controlador y ejecutar la acción.
    // La lógica de renderizado con `ob_start` y `template.php` ahora viviría dentro
    // de una clase base de controlador o en el propio controlador, no en el router.
    $controllerInstance = new $controllerClassName();
    $controllerInstance->run($action); // Asumiendo que los controladores tienen un método `run`.
} else {
    // ... Manejo de error ...
}
?>
```

---

## 📊 3. Tabla Comparativa Final

| Característica | Router Simple | Router Avanzado (3 Niveles) | Ventaja del Avanzado |
| :--- | :--- | :--- | :--- |
| **Responsabilidad** | 😟 **Lo hace todo:** enruta, carga, construye, renderiza. | ✅ **Especialistas:** Portero (URL), Guardia (Seguridad), Recepcionista (Lógica).| **Código Limpio (Separation of Concerns)** |
| **URLs** | 🤮 `?domain=...&controller=...` | 😍 `/domain/controller/action` | **Profesional y SEO-Friendly** |
| **Escalabilidad** | 📉 **Pobre.** El archivo principal crece y se vuelve un monstruo. | 🚀 **Excelente.** Añadir un dominio no modifica la lógica central. | **Mantenimiento a Largo Plazo** |
| **Trabajo en Equipo** | ❌ **Alto Riesgo de Conflictos.** Todos modifican el mismo archivo. | ✅ **Cero Conflictos.** Cada equipo trabaja en la carpeta de su dominio. | **Productividad y Paralelismo** |
| **Flexibilidad** | 🔒 **Rígido.** Todos los dominios deben seguir la misma regla de nombres. | 🤸 **Flexible.** Cada dominio puede tener sus propias reglas internas. | **Autonomía de los Dominios** |
| **Seguridad** | 🤨 **Básica.** No hay una "lista blanca" clara de dominios. | 🛡️ **Robusta.** El Guardia Central actúa como un firewall de primer nivel. | **Más Seguro y Controlado** |

### **Conclusión Final:**
El Router Simple es un **monolito**. El Router Avanzado es un sistema de **micro-gestión modular**. Es la diferencia entre un aprendiz que lo hace todo y un equipo de profesionales coordinados.
