# PHP
## Extensiones para instalar en VSC
- PHP Extension Pack
- PHP Intelephense
## Hello World
- Desde la consola:
    ~~~bash
    php -r "echo 'Hello World';"
    ~~~
- Desde VSC:
    - Se arranca el servidor Apache (Xampp), que sirve mediante el servicio web todos los archivos que estén dentro de la carpeta C:\xampp\htdocs.
    - Para acceder a prueba, acceder a la URL
        - localhost/prueba
    ~~~php
    <?php
    echo "Hello World!";
    ?>
    ~~~
## Lanzar fichero .php en un navegador
- En la terminal:
    ~~~php
    php -S localhost:8080
    ~~~
- Si el fichero es index.php
    - URL -> localhost:8080
- Si el fichero tiene un nombre distinto
    - URL -> localhost:8080/prueba.php

