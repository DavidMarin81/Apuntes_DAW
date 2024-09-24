## Arrays
- Ejemplo
    ~~~php
    # Crear un array
    # Opción 1
    $languages = ["PHP", "JavaScript", "Python", 2, 12];
    # Opción 2
    # Si no se le indica el valor de la clave, crea un array numérico (con base 0)
    $frutas = array("Manzana", "Banana", "Cereza");
    
    # Si no se le pasa ningún parámetro, crea un array vacío
    $a = array(); // array vacío

    # Añadir un elemento al array al final
    $languages[] = "Java";

    # Añadir un elemento en una posición concreta
    $languages[3] = "TypeScript";

    # Imprimir un elemento del array
    echo $languages[3];

    # Para iterar arrays
    foreach () : 
    ~~~
- Otros ejemplos
    ~~~php
    # No es necesario que la clave de un array sea siempre numérica o texto. Pueden mezclarse ambos tipos de valores o incluso omitirse
    $a[0] = 0;
    $a[1] = "uno";
    $a["tres"] = 3;
    $a[] = 8;
    ~~~
## Elementos de un array
- Se usa la función count(array)
    ~~~php
    $elementos = counts($languages);
    ~~~

## Eliminar un elemento del array
- En el caso de los arrays numéricos, eliminar un elemento significa que las claves del mismo ya no estarán consecutivas
    ~~~php
    $modulos = array("Programación", "Bases de datos", ..., "Desarrollo web en entorno servidor");   // array numérico
    unset ($modulos [0]);

    // El primer elemento pasa a ser $modulos [1] == "Bases de datos";
    ~~~

## Buscar encontrar la clave correspondiente al elemento
- Busca un valor específico en un array y devuelve la clave correspondiente si encuentra ese valor. Si no lo encuentra devuelve false
    ~~~php
    array_search($valor_buscado, $array, $modo);
    # $valor_buscado = el valor que se busca
    # $array = array en el que se realiza la búsqueda
    # modo (opcional) = parámetro que define el tipo de comparación. Puede ser
    #   - 0: Comparación estricta (tipo y valor)
    #   - 1: Comparación con tipos convertidos (no estricta)
    ~~~

## Buscar si exista la clave en un array
- Se utiliza para verificar si una clave específica existe en un array. Se suele utilizar cuando quieres comprobar la existencia de la clave antes de acceder a su valor
    ~~~php
    array_key_exists($clave, $array);

    # Ejemplo
    $modulos = array(
        "M01" => "Programación",
        "M02" => "Bases de datos",
        "M03" => "Desarrollo web"
    );

    // Verificar si la clave "M02" existe en el array
    if (array_key_exists("M02", $modulos)) {
        echo "La clave 'M02' existe y su valor es: " . $modulos["M02"];
    } else {
        echo "La clave 'M02' no existe.";
    }
    ~~~

- Para reindexar las claves para que aparezcan ordenadas, se usa la función **array_values()**
    ~~~php
    $modulos = array(
        2 => "Programación", 
        5 => "Bases de datos", 
        9 => "Desarrollo web en entorno servidor"
    );
    // Se elimina un elemento
    unset ($modulos [0]);
    // Aplicamos array_values() para reindexar
    $modulosReindexados = array_values($modulos);
    // A partir de aquí, el array volverá a tener del 0 al X las claves
    ~~~

## Tipos de arrays
- Arrays indexados (por número)
    - Estos arrays usan índices numéricos para acceder a los elementos, donde el primer elemento tiene el índice 0
    - Ejemplo:
        ~~~php
        $frutas = ["Manzana", "Banana", "Cereza"];
        // Acceder a los elementos
        echo $frutas[0]; // Imprime "Manzana"
        echo $frutas[1]; // Imprime "Banana"
        
        # Para recorrer el array
        foreach ($frutas as $fruta) {
            echo $fruta . "\n"; // Imprime cada fruta en una línea nueva
        }
        ~~~

- Arrays asociativos
    - En este tipo de arrays, las claves son cadenas en lugar de números. Cada elemento está asociado a una clave específica
    - Ejemplo:
        ~~~php
        $persona = [
            "nombre" => "Juan",
            "edad" => 25,
            "ciudad" => "Madrid",
            "lenguajes" => ["PHP", "Javascript", "Python"]
        ];

        // Acceder a los elementos
        echo $persona["nombre"]; // Imprime "Juan"
        echo $persona["edad"];   // Imprime 25

        # Agregar elementos a un array asociativo
        $persona["profesión"] = "Ingeniero"; // Añade una nueva clave "profesión"
        # Añade un elemento al array de lenguajes
        $persona["lenguajes"][] = "Java";

        # Recorrer un array asociativo
        foreach ($persona as $clave => $valor) {
            echo "$clave: $valor\n"; // Imprime el nombre de la clave y su valor
        }
        ~~~

- Arrays multidimensionales
    - Son arrays que contienen otros arrays como elementos. Esto permite crear estructuras más complejas como tablas o matrices
    - Ejemplo:
        ~~~php
        $alumnos = [
            ["nombre" => "Juan", "edad" => 20],
            ["nombre" => "Ana", "edad" => 22],
            ["nombre" => "Luis", "edad" => 19],
        ];

        // Acceder a los elementos
        echo $alumnos[0]["nombre"]; // Imprime "Juan"
        echo $alumnos[1]["edad"];   // Imprime 22

        # Recorrer un array multidimensional
        foreach ($alumnos as $alumno) {
            echo $alumno["nombre"] . " tiene " . $alumno["edad"] . " años.\n";
        }
        ~~~

## Recorrer Arrays
- Recorriendo solo los elementos
    ~~~php
    $modulos = arrays("PR" => "Programación", "BD" => "Bases de datos", ..., "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $modulo) {
        echo "Módulo: ".$modulo. "<br />";
    }
    ~~~
- Otros ejemplos
## Foreach()
- Ejemplo
    ~~~php
    # Devuelve el valor de cada posición
    $modulos = arrays("PR" => "Programación", "BD" => "Bases de datos", ..., "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $modulo) {
        echo "Módulo: ".$modulo. "<br />";
    }

    # Devuelve los elementos y sus valores de forma simultánea
    $modulos = arrays("PR" => "Programación", "BD" => "Bases de datos", ..., "DWES" => "Desarrollo web en entorno servidor");
    foreach ($modulos as $key => $value) {
        echo  "El código del módulo ".$value." es ".$key."<br />";
    }
    ~~~
## Funciones para recorrer arrays
- reset()
    - Sitúa el puntero interno al comienzo del array
- next()
    - Avanza el puntero interno una posición
- prev()
    - Mueve el puntero interno una posición hacia atrás
- end()
    - Sitúa el puntero interno al final del array
- current()
    - Devuelve el elemento de la posición actual
- key()
    - Devuelve la clave de la posición actual
- each()
    - Devuelve un array con la clave y el elemento de la posición actual. Además, avanza el puntero interno una posición