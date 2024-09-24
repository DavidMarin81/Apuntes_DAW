## FECHAS
- Ejemplo
    ~~~php
    # Ejemplo 1
    <p>
        <?php
            date_default_timezone_set('Asia/Seoul');
            $fechaCorea = date("Y-m-d H:i:s");
            echo "Seul: " . date("d/m/Y -> H:i:s<br>") . "<br>";
            
            date_default_timezone_set('America/Mexico_City');
            $fechaMexico = date("Y-m-d H:i:s");
            echo "Mexico: " . date("d/m/Y -> H:i:s<br>") . "<br>";

            date_default_timezone_set('Europe/Madrid');
            $fechaVigo = date("Y-m-d H:i:s");
            echo "Vigo: " . date("d/m/Y -> H:i:s") . "<br>";
        ?>
    </p>

    # Ejemplo 2
    <?php
        setlocale(LC_ALL, 'es_ES.UTF-8');
        date_default_timezone_set('Europe/Madrid');
        $ahora=new DateTime();
        $fecha = strftime("Hoy es %A, %d de %B de %Y y son las %H:%M:%S", date_timestamp_get($ahora));
        echo $fecha;
    ?>
    ~~~
- En PHP no existe un tipo de datos específico para trabajar con fechas y horas. La información de fecha y hora se almacena internamente como un número entero.
- Dentro de las funciones de PHP hay unas cuantas para trabajar con este tipo de datos:
    - date = permite obtener una cadena de texto a partir de una fecha y hora, con el formato que tu elijas. La función recibe dos parámetros:
        - la descripción del formato
        - el número entero que identifica la fecha y devuelve una cadena de texto formateada
        ~~~php
        // string date (string $formato  [, int $fechahora]);
        # El segundo parámetro es opcional. Si no se indica, se utilizará la hora actual para crear la cadena de texto
        # Ver tabla con formatos
        <?php
            // Ejemplo correcto del uso de la función date()
            echo "La fecha actual es: " . date("Y-m-d H:i:s");
        ?>
        ~~~
    - Para que el sistema pueda darte la información sobre tu fecha y hora, debes indicarle tu zona horaria
        ~~~php
        date_default_timezone_set('Europe/Madrid');
        ~~~
    - Para que los días de la semana o el nombre de los meses aparezca en español, deberás indicar los "locales" de la siguiente forma:
        ~~~php
        setlocale(LC_ALL, 'es_ES.UTF-8');
        ~~~
    - Debes tener en cuenta que la función **date()** no lee los "locales", para hacer uso de los nombres en español deberás usar la función **strftime()**
    - Otras funciones como **getdate()** devuelven un array con información sobre la fecha y hora actual
    - RECOMENDACION
        - Si vas a trabajar con fechas y deseas que el formato y los nombres de días y meses aparezcan en castellano no es mala idea poner al principio de tu archivo lo siguiente:
            ~~~php
            <?php
                setlocale(LC_ALL, 'es_ES.UTF-8');
                date_default_timezone_set('Europe/Madrid');
            ?>
            ~~~
## EJEMPLOS
- Ejempo 1.- Crear una fecha a partir de cualquier cadena
    ~~~php
    $fechaMySql="2020-12-31";
    $objetoDateTime=date_create_from_format('Y-m-d', $fechaMySql);
    var_dump($objetoDateTime);
    //o más rápido
    $fecha1=new DateTime("2020-12-31");
    echo "<br>";
    var_dump($fecha1); 
    ~~~
- Ejempo 2.- Pasar la fecha al formato que queramos y sacar el "timestamp" (marca de tiempo a una fecha)
    ~~~php
    //Ejemplo 2.- Pasar la fecha al formato que queramos$miFecha=new DateTime();
    $fecha=date_format($miFecha, 'd/m/Y');
    echo "<br>";
    var_dump($fecha);  
    //Sacar la marca de tiempo a un objeto de tipo dateTime
    $ahora=new DateTime();echo "<br>Timestamp: " . date_timestamp_get($ahora);
    ~~~
- Ejempo 3.- Las posibilidades son múltiples
    ~~~php
    //fecha actual
        $ahora=new DateTime();
        echo "<br>";
        var_dump($ahora);
    //Fecha de ayer
            $ayer=new dateTime("yesterday");
            echo "<br>";
            var_dump($ayer);
    //Fecha del último lunes
            $ultimoLunes=new DateTime("Last Monday");
            echo "<br>";
            var_dump($ultimoLunes); 
    ~~~