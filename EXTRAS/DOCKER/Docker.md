## EJEMPLO: CREANDO UN CONTENEDOR CON UN SERVIDOR WEB
- Crear un contendor y que se quede en ejecución
    ~~~Docker
    docker run -it --name prueba -p 8080:80 ubuntu /bin/bash
    ~~~
- Para volver a arrancar el contenedor
    ~~~Docker
    # Para arrancar el contenedor
    docker start prueba01
    # Para entrar en la consola
    docker exec -it prueba /bin/bash
    ~~~
- Instalar php y apache2 (dentro de la bash del contenedor)
    ~~~Docker
    # Actualizar
    apt-get update
    # Instalar apache2
    apt-get install -y apache2
    # Instalar PHP
    apt -get install -y php libapache2-mod-php
    # Reiniciar apache
    service apache2 restart
    # Para ver la pagina, ir a localhost:PUERTO/fichero.php o .html
    ~~~

---
---
---
- Creamos el demonio
    ~~~Docker
    docker run -d --name my-apache-app -p 8080:80 ubuntu
    # -d = ejecuta el contenedor en segundo plano
    # --name my-apache-app = asigna un nombre al contenedor
    # -p 8080:80 = mapea puertos entre el host y el contenedor
    # 8080 = puerto del host
    # 80 = puerto del contenedor en el que el servidor Apache está escuchando
    ~~~
- Para ver el contenido del servidor web, se pone en el navegador del host => localhost:8080 (y no el puerto del contenedor (80))
- Para ver el index.html del contenedor
    ~~~Docker
    docker exec -it my-apache-app bash
    # -it = para verlo de manera interactiva
    ~~~
    - Hay que ir a la ruta del index.html
        ~~~Docker
        /usr/local/apache2/htdocs
        ~~~
    - Para cambiar el contenido del html
        ~~~Docker
        echo "<h1>Curso de Docker</h1>" > index.html
        ~~~
- Con exec, podemos ejecutar acciones en contendores que están en ejecución
    - Arrancamos un contenedor ubuntu en una ventana
    ~~~Docker   
    docker start -i ubuntu01
    ~~~
    - Abrimos otra ventana y usamos la siguiente orden
    ~~~Docker   
    docker exec ubuntu01 mkdir david
    # docker + exec + contenedor + acción
    # Este comando creará un directorio en el contenedor ubuntu01
    ~~~
---

## ¿QUE ES UNA IMAGEN DOCKER?
    - Plantilla de sólo lectura
    - Contiene el sistema de fichero
    - Establece el comando de ejecución
    - Contenedor: instancia ejecutable de una imagen

- Nombre de las imágenes
    - usuario/nombre:etiqueta
- Etiquetas
    - Cada imagen tiene un identificador y puede tener varias etiquetas
        - versiones de las imágenes
        - indicar servicios que tienen instalada
        - indicar imagen base
    - Si no indicamos la etiqueta, será **latest**
- Para desplegar el menú de ayuda para trabajar con las imágenes
    ~~~Docker
    docker image
    ~~~
- Para ver las imágenes que tenemos
    ~~~Docker
    docker images
    ~~~
- Para descargar imágenes de Docker Hub
    ~~~Docker
    docker pull nginx:stable
    # Contenedor:version
    ~~~
- Para borrar imágenes
    ~~~Docker
    docker rmi hello-world:latest
    # rmi -> remove image
    ~~~
- Para hacer búsquedas en docker hub desde la consola
    ~~~Docker
    docker search nginx
    ~~~
- Para ver los metadatos de la imagen
    ~~~Docker
    docker inspect python
    # inspect + contenedor
    # Se muestra un fichero json
    ~~~
---
## GESTION DE PUERTOS
- Para arrancar un contenedor con nginx
    ~~~Docker
    docker run -d -P nginx
    # -P hace que docker elija puertos libres automáticamente
    ~~~
- Para arrancar un contenedor con nginx y asignarle un puerto
    ~~~Docker
    docker run -d --name my_nginx -p 8080:80 nginx
    # Para asignarle un puerto, se usa la p minúscula
    # Una vez que el contenedor se crea, no se puede cambiar el puerto???
    ~~~


    
