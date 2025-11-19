# Guía Completa: Técnicas de Binding en PDO

## 📋 Tabla de Contenidos
1. [Introducción](#introducción)
2. [Marcadores Posicionales vs Nombrados](#marcadores-posicionales-vs-nombrados)
3. [bindValue vs bindParam](#bindvalue-vs-bindparam)
4. [Cuándo Usar Cada Técnica](#cuándo-usar-cada-técnica)
5. [Ejemplos Prácticos del Proyecto](#ejemplos-prácticos-del-proyecto)
6. [Reglas de Oro](#reglas-de-oro)

---

## 🎯 Introducción

Esta guía explica las diferentes técnicas para trabajar con consultas preparadas en PDO, aplicadas específicamente a nuestro proyecto del zoológico ARCADIA.

**¿Por qué usar consultas preparadas?**
- **Seguridad**: Previenen la inyección SQL
- **Rendimiento**: Mejoran el rendimiento en consultas repetitivas
- **Mantenibilidad**: Código más limpio y legible

---

## 🔢 Marcadores Posicionales vs Nombrados

### Marcadores Posicionales (`?`)

**Analogía**: Receta de cocina simple con ingredientes en orden fijo.

```php
// ✅ CORRECTO - Orden correcto
$query = "INSERT INTO users (username, psw, role_id) VALUES (?, ?, ?)";
$sql = $connectionDB->prepare($query);
$sql->execute([$username, $password, $role_id]);

// ❌ INCORRECTO - Orden incorrecto
$sql->execute([$role_id, $username, $password]); // ¡Datos en columnas equivocadas!
```

**Ventajas:**
- Código más corto para consultas simples
- Menos texto que escribir

**Desventajas:**
- **Muy propenso a errores** en consultas con muchos parámetros
- Difícil de depurar cuando hay problemas de orden
- Menos legible

### Marcadores Nombrados (`:nombre`)

**Analogía**: Receta de cocina con ingredientes nombrados.

```php
// ✅ CORRECTO - Orden no importa
$query = "INSERT INTO users (username, psw, role_id) VALUES (:user, :pass, :role)";
$sql = $connectionDB->prepare($query);
$sql->execute([
    ':role' => $role_id,    // Orden no importa
    ':user' => $username,
    ':pass' => $password
]);
```

**Ventajas:**
- **A prueba de errores de orden**
- **Súper legible**: Sabes exactamente qué valor va dónde
- **Reutilizable**: Puedes usar el mismo marcador varias veces
- **Mantenible**: Fácil de modificar sin romper nada

**Desventajas:**
- Un poco más de código que escribir

---

## 📸 bindValue vs bindParam

### bindValue() - "El Fotógrafo"

Toma una **foto instantánea** del valor de la variable en el momento que lo llamas.

```php
$username = "juan@zoo.com";
$sql->bindValue(':user', $username); // Foto: "juan@zoo.com"

$username = "maria@zoo.com"; // Cambiamos la variable
$sql->execute(); // Usa la foto: "juan@zoo.com"
```

**Características:**
- **Uso recomendado**: 99% de los casos
- **Comportamiento predecible**: Usa el valor que tenía la variable cuando hiciste bindValue
- **Seguro**: No hay sorpresas

### bindParam() - "El Cámara en Directo"

Apunta una **cámara en directo** a la variable. Mira el valor actual en el momento de execute().

```php
$username = "juan@zoo.com";
$sql->bindParam(':user', $username); // Cámara apuntando a $username

$username = "maria@zoo.com"; // Cambiamos la variable
$sql->execute(); // Usa el valor actual: "maria@zoo.com"
```

**Características:**
- **Uso específico**: Solo para bucles y optimización
- **Más eficiente**: Para ejecutar la misma consulta muchas veces
- **Requiere cuidado**: El valor puede cambiar inesperadamente

---

## 🎯 Cuándo Usar Cada Técnica

### Escenario 1: Operación Única (99% de tu código)

**Caso**: Crear, actualizar, eliminar o buscar un solo registro.

**Técnica recomendada**: Marcadores nombrados + execute() directo

```php
// ✅ MÉTODO RECOMENDADO
public function save() {
    $connectionDB = DB::createInstance();
    $query = "UPDATE users SET username = :username, psw = :psw WHERE id_user = :id";
    $sql = $connectionDB->prepare($query);
    
    // Directo y claro
    $sql->execute([
        ':username' => $this->username,
        ':psw'      => $this->psw,
        ':id'       => $this->id
    ]);
}
```

### Escenario 2: Consulta en Bucle (1% de los casos)

**Caso**: Ejecutar la misma consulta muchas veces seguidas.

**Técnica recomendada**: bindParam() fuera del bucle

```php
// ✅ OPTIMIZADO PARA BUCLES
public static function resetMultiplePasswords(array $userIds) {
    $connectionDB = DB::createInstance();
    $query = "UPDATE users SET psw = :psw WHERE id_user = :id";
    $sql = $connectionDB->prepare($query);
    
    // Variables plantilla
    $id_plantilla = null;
    $psw_plantilla = null;
    
    // Enlace una sola vez, fuera del bucle
    $sql->bindParam(':id', $id_plantilla);
    $sql->bindParam(':psw', $psw_plantilla);
    
    foreach ($userIds as $id) {
        // Solo cambiamos el contenido de las variables
        $id_plantilla = $id;
        $psw_plantilla = password_hash(random_bytes(10), PASSWORD_DEFAULT);
        
        // Ejecutamos (super eficiente)
        $sql->execute();
    }
}
```

---

## 🏗️ Ejemplos Prácticos del Proyecto

### Ejemplo 1: Crear Usuario (Operación Única)

```php
// En App/users/models/user.php
public static function create($username, $psw, $role_id, $employee_id) {
    $connectionDB = DB::createInstance();
    
    $query = "INSERT INTO users (username, psw, role_id, employee_id) VALUES (:username, :psw, :role_id, :employee_id)";
    $sql = $connectionDB->prepare($query);
    
    // Método recomendado: execute() directo
    $sql->execute([
        ':username'   => $username,
        ':psw'        => $psw,
        ':role_id'    => $role_id,
        ':employee_id' => $employee_id
    ]);
    
    return $connectionDB->lastInsertId();
}
```

### Ejemplo 2: Buscar Usuario (Operación Única)

```php
// En App/users/models/user.php
public static function find($id_user) {
    $connectionDB = DB::createInstance();
    
    $query = "SELECT u.*, e.last_name, r.role_name 
              FROM users u
              LEFT JOIN employees e ON e.id_employee = u.employee_id
              LEFT JOIN roles r ON r.id_role = u.role_id
              WHERE u.id_user = :id";
    
    $sql = $connectionDB->prepare($query);
    $sql->execute([':id' => $id_user]);
    
    $user = $sql->fetch();
    
    return new User(
        $user["id_user"], 
        $user["username"], 
        $user["psw"], 
        $user["role_id"], 
        $user["role_name"], 
        $user["employee_id"], 
        $user["last_name"], 
        $user["is_active"], 
        $user["created_at"], 
        $user["updated_at"]
    );
}
```

### Ejemplo 3: Actualización Masiva (Bucle)

```php
// En App/users/models/user.php
public static function activateMultipleUsers(array $userIds) {
    $connectionDB = DB::createInstance();
    $query = "UPDATE users SET is_active = :status, updated_at = NOW() WHERE id_user = :id";
    $sql = $connectionDB->prepare($query);
    
    $id_plantilla = null;
    $status_plantilla = null;
    
    $sql->bindParam(':id', $id_plantilla);
    $sql->bindParam(':status', $status_plantilla);
    
    foreach ($userIds as $id) {
        $id_plantilla = $id;
        $status_plantilla = 1; // Activar
        
        $sql->execute();
    }
}
```

---

## 🏆 Reglas de Oro

### Para Consultas Únicas (99% de casos)

1. **Usa marcadores nombrados** (`:nombre`)
2. **Pasa valores directamente en execute()**
3. **Mantén el código simple y legible**

```php
$sql->execute([':param1' => $valor1, ':param2' => $valor2]);
```

### Para Consultas en Bucle (1% de casos)

1. **Prepara la consulta fuera del bucle**
2. **Usa bindParam() fuera del bucle**
3. **Solo cambia el contenido de las variables dentro del bucle**

```php
$sql->bindParam(':param', $variable);
foreach ($datos as $dato) {
    $variable = $dato;
    $sql->execute();
}
```

### Errores Comunes a Evitar

❌ **NO hagas esto:**
```php
// Marcadores posicionales con muchos parámetros
$sql->execute([$val1, $val2, $val3, $val4, $val5, $val6]); // ¡Propenso a errores!

// bindParam en consultas únicas
$sql->bindParam(':user', $username);
$sql->execute(); // ¡Innecesario y confuso!
```

✅ **SÍ haz esto:**
```php
// Marcadores nombrados para máxima claridad
$sql->execute([':user' => $username, ':pass' => $password]);

// execute() directo para consultas simples
$sql->execute([':id' => $id]);
```

---

## 🚨 Recordatorios Importantes

1. **Nunca pongas arrays vacíos `[]` en bindParam()** - La BD espera valores simples, no arrays
2. **bindParam() necesita variables existentes** - Siempre inicializa con `null` o un valor por defecto
3. **El orden importa en marcadores posicionales** - El primer `?` corresponde al primer elemento del array
4. **El orden NO importa en marcadores nombrados** - Puedes ponerlos en cualquier orden en el array

---

## 📚 Referencias Rápidas

| Técnica | Cuándo Usar | Ejemplo |
|---------|-------------|---------|
| `?` posicional | Consultas muy simples (1-2 parámetros) | `execute([$val1, $val2])` |
| `:nombre` | **Recomendado para todo** | `execute([':user' => $val])` |
| `bindValue()` | **Recomendado para 99% de casos** | `bindValue(':user', $val)` |
| `bindParam()` | Solo para bucles de consultas | `bindParam(':user', $variable)` |

---

*Este README es tu guía de referencia. Consúltalo siempre que tengas dudas sobre técnicas de binding en PDO.*
