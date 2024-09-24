## Formularios Web
- Los formularios HTML van encerrados siempre entre las etiquetas **form**.
- **action**
    - El atributo **action** del elemento FORM indica la página a la que se le enviarán los datos del formulario. En este caso, se tratará de un script PHP
- **method**
    - El atributo **method** especifica el método usado para enviar la información. Este atributo puede tener dos valores:
        - **get**
            - con este método los datos del formulario se agregan al URI utilizando un signo de interrogación "?" como separadro, si hay varios se separan por "&"
        - **post**
            - con este método los datos se incluyen en el cuerpo del formulario y se envían utilizando el protocolo HTML

## Ejemplo de envío de datos con un formulario
- index.html
    ~~~html
    <form action="index.php" method="POST">
        <!-- for="nombre" se relaciona con id="nombre" -->
        <label for="nombre">Nombre del alumno: </label><br>
        <!-- name="nombre" es lo que se le manda a php -->
        <input type="text" id="nombre" name="nombre" required><br>

        <label>Cursos disponibles:</label><br>
        <input type="checkbox" id="curso1" name="cursos[]" value="Desarrollo Web en Entorno Servidor">
        <label for="curso1">Desarrollo Web en Entorno Servidor</label><br>

        <input type="checkbox" id="curso2" name="cursos[]" value="Desarrollo Web en Entorno Cliente">
        <label for="curso2">Desarrollo Web en Entorno Cliente</label><br>

        <input type="submit" value="Enviar">
    </form>
    ~~~
- index.php
    ~~~php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // ["nombre"] coincide con el name="nombre" del HTML
        $nombre = $_POST["nombre"];
        $cursos = $_POST["cursos"];

        // Conectar a la base de datos
        // usuario / contraseña / base de datos
        $conn = new mysqli("localhost", "root", "abc123.", "gestion_alumnos");

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Insertar el nombre del alumno en la tabla "alumnos"
        $stmt = $conn->prepare("INSERT INTO alumnos (nombre, curso) VALUES (?, ?)");
        foreach ($cursos as $curso) {
            $stmt->bind_param("ss", $nombre, $curso);
            $stmt->execute();
        }

        $stmt->close();
        $conn->close();

        echo "Datos guardados correctamente.";
    }
    ~~~
    ~~~html
    <!-- Botón para volver al index.html -->
    <form action="index.html" method="get">
        <button type="submit">Volver al inicio</button>
    </form>
    ~~~

## XAMPP
- Para conectarse a MySQL, ir a:    
    - C:\xampp\phpMyAdmin\config.inc.php
        ~~~php
        # Confirmar usuario y contraseña para poder acceder
        $cfg['Servers'][$i]['user'] = 'root';
        $cfg['Servers'][$i]['password'] = 'abc123.';
        ~~~

## PROCESAMIENTO DE LA INFORMACIÓN DEVUELTA POR UN FORMULARIO WEB
- Tipo de envios de datos:
    - GET
        ~~~php
        echo "Tu nombre es: {$_GET['nombre']}";
        ~~~
    - POST
        ~~~php
        echo "Tu nombre es: {$_POST['nombre']}";
        ~~~
    - REQUEST
        - Se puede usar para sustituir a get y post
    - 
- Validaciones en html
    - **required** en campos que no vayamos a permitir vacíos
    - Especificar longitud de cadenas con atributos como:
        - **maxlength**
        - **max**
        - **min**
        - ...
    - Poner en el **type** de los **input**, el tipo de dato que esperamos:
        - **mail**
        - **text**
        - **nunmber**
        - **data**
        - ...
    - Especificar en los **input** type='file' el atributo **accept** para que el navegaodr de archivos nos muestre solo el tipo permitido (ejemplo **accept=".pdf")
    - ...

## Validación de arrays o datos no requeridos al pasarse como datos
- isset()
    - es útil para verificar si se han enviado datos a través de formularios
- empty()
    - es útil para validar que los campos no estén vacíos antes de procesar la información
- En el .html
    ~~~html
    <!-- En el name se pone con [] -->
    <label for="cursos">Selecciona tus módulos</label><br>
        <input type="checkbox" id="cursos" name="courses[]" value="DWCC">
        <label for="cursos">DWCC</label><br>
        <input type="checkbox" id="cursos" name="courses[]" value="DWCS">
        <label for="cursos">DWCS</label><br>
        <input type="checkbox" id="cursos" name="courses[]" value="DIW">
        <label for="cursos">DIW</label><br>
    ~~~
- En el .php
    ~~~php
    # isset verifica si el dato viene con datos (true) o es null (false)
    # $_POST['courses'] no hace falta ponerlo como 'courses[]'
        if(isset($_POST['courses'])) {
            foreach ($_POST['courses'] as $curso) {
                echo "$curso<br>";
            }
        } else {
            echo "No estas matriculado en ningún módulo";
        }
    ~~~