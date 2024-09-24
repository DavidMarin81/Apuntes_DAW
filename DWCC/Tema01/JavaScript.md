## JAVASCRIPT
- Incrustar JS en HTML
    - Usando las etiquetas script
        ~~~Javascript
        <script>
            // El código de JS vendrá aquí
        </script>
        ~~~
    - A través de un fichero externo
        ~~~Javascript
        <script type="text/javascript" src="miScript.js"></script>
        ~~~
- Ejemplo
    ~~~Javascript
    // Fichero JS
    const saludar = () => {
        alert('Hola mundo desde DWEC');
    }

    // FIchero HTML
    <!DOCTYPE html>
    <html lang="es-ES">
        <head>
            <meta charset="UTF-8">
            <title>Hola mundo desde DWEC</title>
            <script src="miScript.js"></script>
        </head>
        <body>
            <h1>
                Hola Mundo desde DWEC
            </h1>
            <button onclick="saludar()">Saludar</button>
        </body>
    </html>
    ~~~