## IF
- Ejemplo:
    ~~~php
    if ($myAge > 17) {
        echo "Eres mayor de edad";
    else if ($myAge == 18) {
        echo "Tienes 18 años";
    } else {
        echo "Eres menor de edad";
    }
    ~~~

- Para poner trozos grandes de código
    - Importante, "elseif" aquí va junto, sino da un parse error
    ~~~php
    <?php if ($isOld) : ?>
        # Código html, por ejemplo
    <?php elseif ($isDev) : ?>
        # Código html, por ejemplo   
    <?php else : ?>
        # Código html, por ejemplo
    <?php endif; ?>
    ~~~

- If ternario
    ~~~php
    # ? = True - : = False
    $outputAge = $isOld
        ? 'Eres viejo'
        : 'Eres joven';
    ~~~

## While
- Ejemplo
    ~~~php
    $a = 1;
    while ($a < 8){
        $a += 3;
    }
    echo $a; // el valor obtenido es 10
    ~~~

## Do-While
- Ejemplo
    ~~~php
    $a = 5;
    do{
        $a -= 3;
    }while ($a > 10);
    print $a; // el bucle se ejecuta una sola vez, con lo que el valor obtenido es 2
    ~~~

## For
- Ejemplo
    ~~~php
    for ($a = 5; $a<10; $a+=3) {
        print $a; // Se muestran los valores 5 y 8
        print "<br />";
    }
    ~~~

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

## Break y Continue
- Break acepta un argumento numérico opcional que indica de cuántas estructuras anidadas circundantes se debe salir
- Continue también acepta un argumento numérico opcional, que indica cuántos niveles de bucle encerrados se ha de saltar al final

## Switch
- Ejemplo
    ~~~php
    $dia = "martes";

    switch ($dia) {
        case "lunes":
            echo "Hoy es lunes";
            break;
        case "martes":
            echo "Hoy es martes";
            break;
        default:
            echo "Es fin de semana o un día no válido";
    }
    ~~~
## Match (switch mejorado)
- Características de match:
    - Devuelve un valor
    - Usa comparaciones estrictas (===), a diferencia de switch que usa comparaciones flexibles (==)
    - No necesita break
    - Permite múltiples valores para un solo caso
    - Puede lanzar excepciones si no encuentra un caso coincidente y no hay un default
- Sintaxis
    - Ejemplo:
        ~~~php
        $resultado = match ($variable) {
            valor1 => resultado1,
            valor2 => resultado2,
            valor3 => resultado3,
            valor4, valor5, valor 6 => resultado4,
            default => valor_predeterminado,
        };

        echo $resultado;
        ~~~
    - Otro ejemplo:
        ~~~php
        # Entra en la primera coincidencia, las siguientes se las salta
        $resultado = match (true) {
            $age < 2 => "Eres un bebé",
            $age < 10 => "Eres un niño",
            $age < 18 => "Eres un adolescente",
            $age === 18 => "Eres mayor de edad",
            $age > 18 => "Eres adulto",
            default => "Valor incorrecto",
        };

        echo $resultado;

        # Otro ejemplo
        $resultado = match ($motor) {
            "gasolina" => "El motor es de tipo: gasolina",
            "diesel" => "El motor es de tipo: diesel",
            "electrico" => "El motor es de tipo: electrico",
            "hibrido" => "El motor es de tipo: hibrido",
            default => "Valor no reconocido",
        };
        echo "<p>$resultado</p>";
        ~~~
