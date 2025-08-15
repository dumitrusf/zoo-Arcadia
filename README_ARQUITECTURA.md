# Guía de Arquitectura del Proyecto Arcadia

Este documento explica la arquitectura del software utilizada en este proyecto, basada en una combinación del patrón **Front Controller** y una estructura de **Screaming Architecture** por dominios, similar a MVC en cada dominio.

## El Flujo de una Petición (La Película Completa)

Cada vez que un usuario visita una URL, la aplicación sigue una serie de pasos predecibles para mostrar la página correcta. Este es el flujo completo, desde que el usuario escribe en el navegador hasta que ve el contenido:

1.  **URL Bonita:** El usuario escribe una URL limpia en su navegador, por ejemplo:
    `http://localhost:3000/employees/create`

2.  **El Portero (`_router.php`):**
    *   **Activación:** El servidor de desarrollo de PHP (`php -S`) está configurado para pasarle **todas** las peticiones a este archivo.
    *   **Misión:** Discernir si la petición es para un archivo estático (CSS, JS, imagen) o si es para la aplicación PHP.
    *   **Si es un archivo estático:** El portero lo detecta, se aparta (`return false;`) y deja que el servidor PHP entregue el archivo directamente. **Esta es la clave para que los estilos y scripts funcionen.**
    *   **Si es una URL de la aplicación:** El portero "traduce" la URL bonita. Descompone `/employees/create` y lo convierte en variables `$_GET` que el resto de la aplicación pueda entender: `$_GET['domain']='employees'`, `$_GET['controller']='gest'`, `$_GET['action']='create'`. Una vez traducido, le pasa la responsabilidad al...

3.  **El Guardia Central (`App/router.php`):**
    *   **Misión:** Actuar como el punto de entrada único para toda la lógica de la aplicación. Es el primer filtro de seguridad y organización.
    *   **Responsabilidades:**
        *   **Tareas Comunes:** Aquí se pondría la lógica que afecta a **todos** los dominios, como comprobar si el usuario ha iniciado sesión.
        *   **Validación de Dominio:** Comprueba que el `$_GET['domain']` ('employees') está en una lista blanca de dominios permitidos.
        *   **Delegación:** Si el dominio es válido, su único trabajo es cargar el router específico de ese dominio. Llama al...

4.  **El Recepcionista del Dominio (`App/{domain}/{domain}Router.php`):**
    *   *Ejemplo: `App/employees/employeesRouter.php`*
    *   **Misión:** Gestionar las peticiones **dentro de su propio dominio**. No sabe nada de otros dominios.
    *   **Responsabilidades:**
        *   Lee las variables `$_GET['controller']` y `$_GET['action']`.
        *   Construye el nombre de la clase del controlador que debe ejecutarse (p. ej., `EmployeesGestController`).
        *   Carga el archivo de ese controlador y crea una instancia de la clase.
        *   Llama al método correspondiente de ese controlador (p. ej., `->create()`). Le pasa la responsabilidad al...

5.  **El Jefe de la Tienda (El Controlador):**
    *   *Ejemplo: `App/employees/controllers/employees_gest_controller.php`*
    *   **Misión:** Es el cerebro del dominio. Orquesta todo el proceso para una acción específica.
    *   **Responsabilidades:**
        *   **Procesar Entradas:** Si es una petición POST de un formulario, aquí se leen y validan los datos.
        *   **Hablar con el Almacén (Modelo):** Llama a los métodos estáticos del Modelo para obtener o guardar datos en la base de datos (p. ej., `Employee::find($id)`).
        *   **Decidir qué mostrar:** Una vez que tiene los datos, su trabajo final es cargar el archivo de la...

6.  **El Escaparate (La Vista):**
    *   *Ejemplo: `App/employees/views/create.php`*
    *   **Misión:** Ser "tonta". Su única responsabilidad es pintar el HTML.
    *   **Responsabilidades:**
        *   Recibe los datos que le pasa el Controlador.
        *   Puede incluir una plantilla (`template.php`) para la cabecera y el pie de página.
        *   Muestra los datos dentro de la estructura HTML.

---

## Estructura y Código de Ejemplo (Dominio "Pokémon")

### 1. El Portero (`_router.php`)
*Ubicación: Raíz del proyecto (`/`)*
```php

<?php
// ===============================================================
// _router.php  →  "El Portero" del sitio web
// ---------------------------------------------------------------
// Este archivo es como el vigilante de la entrada de un edificio.
// Su trabajo: decidir si la petición es para un archivo físico 
// (CSS, JS, imágenes, PDFs...) o para una página dinámica.
// 
// Si es un archivo real → lo entrega directamente.
// Si es una URL bonita → traduce esa ruta en parámetros y llama 
// al enrutador principal para procesar la petición.
// ===============================================================


// ----------------------------------------------------------------
// 1️⃣ OBTENER EL CAMINO (PATH) DE LA URL SOLICITADA
// ----------------------------------------------------------------
// Paso a paso de dentro hacia afuera:
// 
// 1. $_SERVER['REQUEST_URI']
//    - Contiene TODO lo que el usuario escribió después del dominio.
//    - Ejemplo:
//         Si escribe: https://midominio.com/blog/articulo?id=25
//         $_SERVER['REQUEST_URI'] = "/blog/articulo?id=25"
//    - No incluye el dominio ni el protocolo porque el servidor web
//      (Apache, Nginx...) no se lo pasa así a PHP.
//
// 2. parse_url($_SERVER['REQUEST_URI'])
//    - Convierte esa URI en un array asociativo con partes como:
//        'path'  → ruta de acceso
//        'query' → cadena de parámetros GET
//    - Ejemplo con "/blog/articulo?id=25":
//        [
//            "path"  => "/blog/articulo",
//            "query" => "id=25"
//        ]
//
// 3. ['path']
//    - Le pedimos SOLO el valor que está en la clave 'path'.
//    - Resultado aquí: "/blog/articulo"
//
// 4. ltrim(..., '/')
//    - Elimina todas las barras '/' iniciales del string.
//    - Ejemplos:
//         ltrim("/blog/articulo", "/")    → "blog/articulo"
//         ltrim("////blog/articulo", "/") → "blog/articulo"
//    - Esto facilita trabajar con rutas internas sin barra inicial.
// 
// Flujo final:
//   $_SERVER['REQUEST_URI']  → "/blog/articulo?id=25"
//   parse_url()['path']      → "/blog/articulo"
//   ltrim(..., "/")          → "blog/articulo"
$path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');


// ----------------------------------------------------------------
// 2️⃣ COMPROBAR SI EL PATH CORRESPONDE A UN ARCHIVO REAL
// ----------------------------------------------------------------
// file_exists($path)
//    - Devuelve TRUE si existe un archivo o carpeta con ese nombre.
// 
// is_file($path)
//    - Devuelve TRUE si ese nombre es un archivo y no una carpeta.
// 
// ¿Por qué? 
// Porque si es un archivo físico (CSS, JS, JPG, PDF...), no necesitamos
// que PHP lo procese: el servidor lo entrega directamente.
//
// Ejemplo:
//   URL: /css/estilos.css
//   $path = "css/estilos.css"
//   file_exists("css/estilos.css") → TRUE
//   is_file("css/estilos.css")     → TRUE
//   Resultado: return false → PHP deja que el servidor lo sirva.
//
// Nota: en el servidor embebido de PHP (`php -S`),
//       `return false;` significa "no proceses esto con PHP".
if (file_exists($path) && is_file($path)) {
    return false; // 🚪 Salida directa, el archivo se entrega sin pasar por el router.
}


// ----------------------------------------------------------------
// 3️⃣ SI NO ES UN ARCHIVO, INTERPRETARLO COMO "URL BONITA"
// ----------------------------------------------------------------
// Una URL bonita es una convención que usamos para mapear partes de
// la ruta a secciones de la aplicación.
//
// Ejemplo:
//   URL: /productos/listar/categoria
//   Significa: domain = "productos", controller = "listar", action = "categoria"
//
// explode('/', $path)
//   - Divide la cadena usando '/' como separador.
//   - "blog/articulo/ver" → ["blog", "articulo", "ver"]
$parts = explode('/', $path);


// ----------------------------------------------------------------
// 4️⃣ ASIGNAR EL PRIMER SEGMENTO COMO "domain"
// ----------------------------------------------------------------
// "domain" aquí no es el dominio web (midominio.com),
// sino un nombre lógico para un módulo o sección.
//
// $parts[0] ?? null
//   - Usa el primer valor del array si existe.
//   - Si no existe, asigna null.
// 
// Ejemplo:
//   URL: /blog/articulo/ver → $parts[0] = "blog"
//   URL: / → $parts[0] no existe → null
$_GET['domain'] = $parts[0] ?? null;


// ----------------------------------------------------------------
// 5️⃣ ASIGNAR EL SEGUNDO SEGMENTO COMO "controller"
// ----------------------------------------------------------------
// "controller" indica la parte de la lógica que gestionará la petición.
// Si no existe, se usa "index" por defecto.
//
// Ejemplo:
//   URL: /blog/articulo/ver → $parts[1] = "articulo"
//   URL: /blog → $parts[1] no existe → "index"
$_GET['controller'] = $parts[1] ?? 'index';


// ----------------------------------------------------------------
// 6️⃣ ASIGNAR EL TERCER SEGMENTO COMO "action"
// ----------------------------------------------------------------
// "action" es el método o función del controlador que se ejecutará.
// Si no existe, se usa "home" por defecto.
//
// Ejemplo:
//   URL: /blog/articulo/ver → $parts[2] = "ver"
//   URL: /blog/articulo     → $parts[2] no existe → "home"
$_GET['action'] = $parts[2] ?? 'home';


// ----------------------------------------------------------------
// 7️⃣ CARGAR EL ENRUTADOR PRINCIPAL
// ----------------------------------------------------------------
// require_once 'App/router.php'
//   - Incluye el archivo que, usando domain, controller y action,
//     decidirá qué código ejecutar.
//   - require_once evita incluirlo dos veces.
//
// Aquí termina el trabajo del "portero" (_router.php):
//   - Interpreta la URL
//   - Decide si entregar un archivo o pasar al router principal
require_once 'App/router.php';

?>



```

### 2. El Guardia Central (`App/router.php`)
*Ubicación: `/App/`*
```php

<?php
// ===============================================================
// App/router.php → "El Guardia Central"
// ---------------------------------------------------------------
// Este archivo decide qué dominio (módulo) de la aplicación debe manejar
// la solicitud basada en el "domain" que _router.php ya ha definido.
//
// Funciona como un guardia: recibe la solicitud ya interpretada
// (_router.php ya le pasó $_GET['domain'], $_GET['controller'], $_GET['action'])
// y dirige la solicitud al "recepcionista" de cada dominio.
// ===============================================================


// ----------------------------------------------------------------
// 1️⃣ OBTENER EL DOMINIO SOLICITADO
// ----------------------------------------------------------------
// $_GET['domain'] → viene de _router.php, que lo tomó de la URL bonita.
// Ejemplo:
//     URL: "/employees/listar/ver"
//     $_GET['domain'] = "employees"
$domain = $_GET['domain'];


// ----------------------------------------------------------------
// 2️⃣ LISTA DE DOMINIOS PERMITIDOS
// ----------------------------------------------------------------
// Definimos los dominios válidos en la aplicación. Esto evita que
// un usuario escriba cualquier cosa en la URL y acceda a rutas inexistentes.
//
// Ejemplo de dominio permitido:
//     'pokemon' → sección Pokémon
//     'employees' → sección Empleados
//     'animals' → sección Animales
$allowed_domains = ['pokemon', 'employees', 'animals'];


// ----------------------------------------------------------------
// 3️⃣ COMPROBAR SI EL DOMINIO ES VÁLIDO
// ----------------------------------------------------------------
// in_array($domain, $allowed_domains) → verifica si el dominio
// recibido está en la lista de permitidos.
//
// Si es válido → se llama al router específico del dominio
// Si no → se devuelve un error 404 (dominio no encontrado)
if (in_array($domain, $allowed_domains)) {

    // ----------------------------------------------------------------
    // 4️⃣ INCLUIR EL ROUTER DEL DOMINIO
    // ----------------------------------------------------------------
    // require_once __DIR__ → asegura que la ruta sea relativa a App/
    // "{$domain}/{$domain}Router.php" → construye la ruta según el dominio.
    //
    // Ejemplo:
    //     Si $domain = "employees"
    //     Se incluye → App/employees/employeesRouter.php
    //
    // Nota: cada dominio tiene su propio router, siguiendo la
    // Screaming Architecture y MVC dentro del dominio.
    require_once __DIR__ . "/{$domain}/{$domain}Router.php";

} else {
    // ----------------------------------------------------------------
    // 5️⃣ DOMINIO NO VÁLIDO → ERROR 404
    // ----------------------------------------------------------------
    // http_response_code(404) → cambia el código HTTP a 404
    // echo "<h1>404 - Dominio no encontrado</h1>" → mensaje simple.
    //
    // Esto evita mostrar errores internos o rutas inexistentes.
    http_response_code(404);
    echo "<h1>404 - Dominio no encontrado</h1>";
}

?>


```

### 3. El Recepcionista del Dominio (`App/pokemon/pokemonRouter.php`)
*Ubicación: `/App/pokemon/`*
```php

<?php
// App/pokemon/pokemonRouter.php (El Recepcionista del Dominio Pokémon)

// 1. Recogemos el nombre del controlador que nos ha llegado desde _router.php
//    En la URL ejemplo sería 'show', que indica qué acción queremos sobre Pokémon.
$controller = $_GET['controller']; // 'show'

// 2. Recogemos la acción o parámetro que queremos ejecutar.
//    En nuestro ejemplo, puede ser un ID de Pokémon, por ejemplo '25'.
$action = $_GET['action'];       // '25'

// 3. Construimos dinámicamente el nombre completo de la clase del controlador.
//    Usamos la convención de Screaming Architecture: 
//    <Dominio><Controlador>Controller, por ejemplo "PokemonShowController".
$controllerClassName = "Pokemon" . ucfirst($controller) . "Controller"; // "PokemonShowController"

// 4. Construimos la ruta del archivo PHP que contiene ese controlador.
//    __DIR__ apunta a la carpeta del router del dominio, es decir App/pokemon/
//    Luego vamos a la carpeta 'controllers' y buscamos el archivo correspondiente.
$controllerFile = __DIR__ . "/controllers/{$controllerClassName}.php";

// 5. Verificamos si el archivo del controlador existe.
//    Si existe, lo incluimos y creamos una instancia de la clase.
if (file_exists($controllerFile)) {
    require_once $controllerFile;               // Incluimos el controlador
    $controllerInstance = new $controllerClassName(); // Creamos una instancia

    // 6. Ejecutamos el método run del controlador, pasándole la acción (en este caso el ID '25')
    //    El método run internamente decidirá qué hacer según la acción.
    $controllerInstance->run($action); // Ejecuta la lógica correspondiente
} else {
    // 7. Si no existe el controlador, mostramos un mensaje de error.
    echo "Controlador de Pokémon no encontrado.";
}
?>


```

### 4. El Jefe de la Tienda (Controlador)
*Ubicación: `/App/pokemon/controllers/PokemonShowController.php`*
```php

<?php
// App/pokemon/controllers/PokemonShowController.php (El Jefe de la Tienda)

// Incluimos el Modelo de Pokémon, que sabe cómo recuperar datos de la base.
require_once __DIR__ . '/../models/Pokemon.php';

// Incluimos la Vista específica para mostrar un Pokémon.
require_once __DIR__ . '/../views/show.php';

class PokemonShowController {
    
    // Función principal que ejecuta la acción solicitada.
    // $id viene de App/pokemon/pokemonRouter.php -> $_GET['action']
    public function run($id) {
        
        // 1. Pide los datos al Modelo.
        // Pokemon::find($id) busca en la base de datos o fuente de datos
        // el Pokémon con ese ID específico.
        $pokemon_data = Pokemon::find($id);

        // 2. Llama a la Vista y le pasa los datos.
        // show_pokemon_view() es la función de la vista que recibe la info
        // y genera el HTML para mostrarlo.
        show_pokemon_view($pokemon_data);
    }
}
?>


```

### 5. El Modelo (`App/pokemon/models/Pokemon.php`)
*Ubicación: `/App/pokemon/models/`*
```php

<?php
// App/pokemon/models/Pokemon.php (El Almacén de Datos)

// Definimos la clase Pokémon, que representa la información de cada Pokémon
class Pokemon {
    public $name; // Nombre del Pokémon
    public $type; // Tipo de Pokémon (por ejemplo: eléctrico, fuego, agua)

    // Constructor que inicializa un Pokémon con nombre y tipo
    public function __construct($name, $type) {
        $this->name = $name;
        $this->type = $type;
    }

    // Método estático para simular una búsqueda en la base de datos
    // $id viene del controlador (PokemonShowController -> run($id))
    public static function find($id) {
        // 1. Si el ID es 25, devolvemos un Pokémon concreto
        if ($id == 25) {
            return new Pokemon("Pikachu", "Eléctrico");
        } else {
            // 2. Para cualquier otro ID, devolvemos un Pokémon genérico
            return new Pokemon("Desconocido", "Misterio");
        }
    }
}
?>


```

### 6. La Vista (`App/pokemon/views/show.php`)
*Ubicación: `/App/pokemon/views/`*
```php

<?php
// App/pokemon/views/show.php (El Escaparate)

// Función que recibe un objeto Pokémon y lo pinta en HTML
function show_pokemon_view($pokemon) {
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Detalle de Pokémon</title>
        <!-- 
            Aquí podrían ir enlaces a CSS o scripts.
            Gracias al "portero" (_router.php y router.php) todas las rutas relativas funcionan correctamente.
        -->
    </head>
    <body>
        <!-- Mostramos el nombre del Pokémon -->
        <h1><?php echo htmlspecialchars($pokemon->name); ?></h1>
        <!-- Mostramos el tipo del Pokémon -->
        <p>Tipo: <?php echo htmlspecialchars($pokemon->type); ?></p>
    </body>
    </html>
<?php
}
?>


```

Este modelo separa claramente las responsabilidades, haciendo el código más limpio, seguro y fácil de mantener a medida que el proyecto crece.
