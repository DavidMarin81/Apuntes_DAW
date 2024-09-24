## Variables
- Variables
    ~~~php
    $name = "David";
    echo "Hello $name";
    ~~~
- Tipos de variables
    - booleano (boolean)
    - entero (integer)
    - real (float)
    - cadena (string)
    - null
- Variables globales
    - Son de ámbito global
    - Para llamarlas dentro de una función, se le antepone **global**
        ~~~php
        $mensaje = "Hola mundo";
        function mostrarMensaje() {
            global $mensaje;
            echo $mensaje;
        }
        mostrarMensaje();
        ~~~
- Variables estáticas
    - Solo se inicializan una vez, la primera vez que se ejecuta la función
    - Mantienen su valor entre llamadas sucesivas a la función
    - Solo son accesibles dentro de la función donde se declararon
        ~~~php
        <?php
        function contarLlamadas() {
            static $contador = 0; // Se inicializa solo una vez
            $contador++;
            echo "La función ha sido llamada $contador veces.\n";
        }

        contarLlamadas(); // Imprime: La función ha sido llamada 1 veces.
        contarLlamadas(); // Imprime: La función ha sido llamada 2 veces.
        contarLlamadas(); // Imprime: La función ha sido llamada 3 veces.
        ?>
        ~~~
- == y ===
    - == comprueba si dos valores son iguales en términos de valor, sin importar su tipo
    - === devuelve verdadero sólo si los operandos son del mismo tipo y además tienen el mismo valor
- Se concatena con el .
    ~~~php
    $name = "David";
    echo "Mi nombre es " . $name;
    ~~~
- El signo + solo suma, aunque un número esté entre comillas (como si fuera un string)
    ~~~php
    # Imprime 20
    $name = '19' + 1;
    echo "$name";
    ~~~
## Constantes
- define()
    ~~~php
    define("NOMBRE_CONSTANTE", "valor");
    define("PI", 3.1416);
    define("SALUDO", "Hola, Mundo!");
    ~~~
- const
    ~~~php
    const PI = 3.1416;
    ~~~
- Diferencias
    - const se utiliza en tiempo de compilación, lo que significa que su valor debe ser conocido cuando se está compilando el código, mientras que define() trabaja en tiempo de ejecución
    - Ámbito: const solo puede usarse en el ámbito global o dentro de una clase, mientras que define() puede usarse en cualquier parte del código
    - Sintaxis: la sintaxis de const es más sencilla, no requiere de una función
    - const es especialmetne útil cuando trabajas con clases, ya que define constantes de clase. A diferencia de define(), que no se puede usar dentro de clases.

    - Ejemplo con const
        ~~~php
        class MiClase {
            const VERSION = 1.0;
        }

        echo MiClase::VERSION;  // Imprime 1.0
        ~~~
    - Ejemplo con const
        ~~~php
        const NOMBRE = "David";
        echo NOMBRE;
        ~~~
## var_dump()
- Indica el tipo de dato de la variable
    ~~~php
    $name = '19' + 1;
    var_dump($name)
    # Imprime int(20)
    ~~~