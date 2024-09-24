## phpDocumentor
- Definición
    - Es una herramienta que se utiliza para generar documentación automática a partir del código PHP. Es especialmente útil en proyectos grandes donde mantener documentación actualizada puede ser complejo y consume mucho tiempo. PhpDocumentor analiza el código fuente de PHP y genera documentación legible en HTML, permitiendo a los desarrolladores y equipos mantener una documentación coherente y precisa de sus proyectos.
    - Esto facilita:
         - La comprensión del código
         - Mejora la colaboración entre equipos
         - Ayuda en el mantenimiento a largo plazo de las aplicaciones PHP
    - La documentación se distribuye en bloques "DocBlock". Estos bloques siempre se colocan justo antes del elemento al que documentan y su formato es:
        ~~~php
        <?php
        /**
        * Calcula el área de un círculo.
        *
        * Esta función toma el radio de un círculo y devuelve su área.
        *
        * @param float $radio El radio del círculo.
        * @return float El área del círculo.
        */
        function calcularAreaCirculo($radio)
        {
            return pi() * pow($radio, 2);
        }
        ?>
        ~~~
- Marcas para phpDocumentor
    - @access
        - Si @access es 'private' no se genera documentación para el elemento. Muy interesante si sólo se desea generar documentación sobre la interfaz (métodos públicos) pero no sobre la implementación (métodos privados)
    - @author
        - Autor del código
    - @copyright
        - Información sobre derechos
    - @deprecated
        - Para indicar que el elemento no debería utilizarse, ya que en futuras versiones podría no estar disponible
    - @example
        - Permite especificar la ruta hasta un fichero con código PHP. phpDocumentor se encarga de mostrar el código resaltado
    - @ignore
        - Evita que phpDocumentor documente un determinado elemento
    - @internal
        - Para incluir información que no debería aparecer en la documentación pública, pero sí puede estar disponible como documentación interna para desarrolladores
    - @link
        - Para incluir un enlace (http://) a un determinado recurso
    - @see
        - Se utiliza para crear enlaces internos (enlaces a la documentación de un elemento)
    - @since
        - Permite indicar que el elemento está disponible desde una determinada versión del paquete o distribución
    - @version
        - Versión actual del elemento
    - **Existen otras marcas que solamente se pueden utilizar en bloques de determinados elementos**
        - @global
            - Para especificar el uso de variables globales dentro de una función
        - @param
            - Para documentar parámetros que recibe una función
        - @return
            - Valor devuelto por una función
