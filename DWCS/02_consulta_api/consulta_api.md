## CONSULTAR DATOS DE API
- Se crea un archivo .php (consulta_api.php)
- Se añade un formulario
    ~~~html
    <!-- Formulario para ingresar el ID del personaje -->
    <form method="POST" action="">
        <label for="character_id">Introduce el ID de un personaje:</label>
        <input type="number" id="character_id" name="character_id" required>
        <button type="submit">Buscar</button>
    </form>
    ~~~
- Se crea un if que comprobará:
    - Que la petición del formulario es de tipo "POST"
    - Que el campo de texto no esté vacío
    ~~~php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['character_id']))
    ~~~
    - **$_SERVER** es una variable global de PHP que contiene información sobre el entorno del servidor y la solicitud HTTP
    - **'REQUEST_METHOD'** dentro de **$_SERVER** indica el método HTTP que se utilizó para hacer la solicitud(por ejemplo, GET, POST, ...)
    - **!empty($_PORT['character_id'])** verifica que el valor de character_id fue enviado en el formulario y no está vacío
    - **$_PORT** es una superglobal en PHP que contiene los datos enviados desde un formulario con el método POST
- Se obtiene el ID del personaje introducido por el usuario y se guarda en una variable
    ~~~php
    # Obtener el ID del personaje introducido por el usuario
    $character_id = intval($_POST['character_id']);
    ~~~
- Se construye la URL de la API concatenada con el ID del personaje
    ~~~php
    # Para concatenar se usa el punto (.)
    $api_url = "https://rickandmortyapi.com/api/character/" . $character_id;
    ~~~
- Se inicializa una nueva sesión en cURL
    ~~~php
    # $ch es un recurso de cURL que se utilizará para realizar una solicitud HTTP
    # curl_init($api_url) inicializa una nueva sesión cURL con el URL de destino
    $ch = curl_init($api_url);
    ~~~
- Para decidir que hacemos con el resultado de la petición
    ~~~php
    # curl_setopt() es una función de PHP que permite establecer opciones de configuración para una sesión cURL
    # CURLOPT_RETURNTRANSFER controla cómo manejará cURL la respuest de la solicitud:
    # - Si se establece en true, debe devolver la respuesta de la solicitud como una cadena de texto (en lugar de imprimirla directamente en la pantalla)
    # - Si se establece en false (o no se configura), cURL imprimirá la respuesta directamente en la salida estándar (el navegador, por ejemplo)
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    ~~~
- Se ejecuta la peticón y se guarda el resultado
    ~~~php
    $result = curl_exec($ch);
    ~~~
---
- Verificamos si se obtuvo un resultado válido
    ~~~php
    if ($result)
    ~~~
    - Se transforma el resultado (cadena de texto o json) a una estructura de datos de PHP
        ~~~php
        $data = json_decode($result, true);
        ~~~
    - Se cierra **$ch**
        ~~~php
        curl_close($ch);
        ~~~
    - Se muestra el nombre del personaje si existe
        ~~~php
        # isset() es una función PHP que determinará si una variable está definida y no es nula
         if (isset($data['name']))
        ~~~
    - Se muestra la info (usando HTML)
        ~~~html
        <section>
            <h2><?= $data["name"]; ?></h2>  <!-- Mostrar el nombre del personaje -->
            <img src="<?= $data['image']; ?>" alt="<?= $data["name"]; ?>" width="100px">
            <p><?= $data["location"]["name"]; ?></p>
            <p><?= $data["gender"]; ?></p>
        </section>
        ~~~
    - Se muestra la info (usando PHP)
        ~~~php
        echo "<p>" . $data['name'] . "</p>";
        echo '<img src="' . htmlspecialchars($data['image']) . '" alt="Avatar" />';
        ~~~
---
## PARA VER LA PAGINA WEB
- Desde terminal y en la carpeta donde esté el archivo .php:
    ~~~bash
    php -S localhost:8080
    ~~~
    - *No tiene que estar ejecutándose XAMPP*