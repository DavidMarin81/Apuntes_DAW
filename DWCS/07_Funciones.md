## Funciones
- Si una función no tiene sentencia return, devuelve null
- Ejemplo
    ~~~php
    $iva = true;
    $precio = 10;
    if ($iva) {
        //podemos hacer uso de la función
        //Antes de implementarla.
        precioConIva();
    }
    function precioConIva() {
        // No es buena practica usar variables locales aquí
        // Es mejor pasarle parámetros a la función
        $precio=$GLOBALS["precio"];
        $precioIva = $precio * 1.18;
        echo "El precio con IVA es ".$precioIva;
    }
    ~~~
- Ejemplo con argumentos
    ~~~php
    <?php
        function precioConIva($precio){
            return $precio * 1.18;
        }
        $precio = 10;
        $precioIva = precioConIva($precio);
        echo  "El precio con IVA es $precioIva";
    ?>
    ~~~

- Desde PHP 7.0, se puede especificar el tipo de dato que le pasamos a la función y lo que va a devolver la misma
    ~~~PHP
    function precioConIva(float $precio) :float{ //con :float especificamos el tipo d dato a devolver
            return $precio * 1.18;
    }
    $precio = 10;
    $precioIva = precioConIva($precio);
    echo  "El precio con IVA es $precioIva";
    ~~~

- Argumentos con valor
    - Deben estar los argumentos sin valor a la izquierda y los argumentos con valor a la izquierda
    - Ejemplo
        ~~~php
        // Si va algún argumento con valor antes de uno sin valor, el programa lanzará una excepción
        function precioConIva(float $precio, $iva = 0.21) : float{
            return $precio * (1 + $iva);
        }
        $precio = 100;
        $precioConIva = precioConIva($precio);
        echo "<p>Valor de la variable: $precioConIva</p>";
        ~~~