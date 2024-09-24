## Ejercicio 00
1. Crea una carpeta e inicializa el repositorio de git.
    ~~~bash
    mkdir Ejercicio00
    cd Ejercicio00
    git init
    ~~~
2. Cambia tu nombre y correo electrónico para los commits.
    ~~~bash
    # Cambiar el nombre y el email
    git config user.name "David"
    git config user.email "david@gmail.com"
    # Comprobar el nombre y el email
    git config user.name
    git config user.email
    # Devuelve los valores
    ~~~
3. Crea un fichero, añádelo al stage y comitea los cambios.
    ~~~bash
    # Para crear un fichero
    touch fichero.txt
    # Para crear un fichero y añadirle texto
    echo "Hola mundo" > fichero.txt
    # Para ver el contenido del fichero 
    cat fichero.txt

    # Para añadirlo al stage
    git add .
    # Para commitear los cambios
    git commit -m "Primer commit"
    ~~~
4. Comprueba el estado del repositorio.
    ~~~bash
    git status
    ~~~
5. Cambia algo en el fichero.
    ~~~bash
    # Para añadir algo al fichero
    echo "Añadiendo más texto" >> fichero.txt
    # Si se usa > se sobreescribirá el fichero
    ~~~
6.  Vuelve a comprobar el estado de la rama.
    ~~~bash
    git status
    ~~~
7.  Añádelo al stage
    ~~~bash
    git add .
    ~~~ 
8.  Vuelve a comprobar el estado de la rama.
    ~~~bash
    git status
    ~~~
9.  Comitéalo
    ~~~bash
    git commit -m "Segundo commit"
    ~~~
10. Vuelve a comprobar el estado de la rama.
    ~~~bash
    git status
    ~~~
11. Crea una nueva rama llamada development
    ~~~bash
    # Para crear una rama
    git branch development
    # Para moverte a ella
    git checkout development
    # Para crear una rama y moverte a ella
    git checkout -b nombre_de_la_rama
    # Para borrar la rama
    git branch -d nombre_de_la_rama
    # Para borrar una rama no fusionada
    git branch -D nombre_de_la_rama
    ~~~
12. Modifica algo del fichero y comitéalo
    ~~~bash
    echo "Modificación en la rama development" >> fichero.txt
    ~~~
13. Haz un merge la rama main con la rama development.
    ~~~bash
    # Primero nos movemos a la rama main
    git checkout main
    # Ahora hacemos el merge de development a main
    git merge development
    ~~~
14. Comprueba el log con un “git log –oneline”
    ~~~bash
    git log --oneline
    ~~~
15. Haz 3 commits en main
    ~~~bash
    # Se modifica el fichero y se commitea 3 veces
    ~~~
16. Haz un diff con el primer commit
    ~~~bash
    # Para ver las diferencias con el primer commit
    git diff <hash del primer commit>
    # Para ver las diferencias entre dos commits
    git dif <hash de un commit> <hash del otro commit>
    ~~~
17. Revierte al primer commit
    ~~~bash
    # Descarta todo los cambios despues del primer commit
    git reset --hard <hash del commit>
    # Mantiene los cambios en el directorio de trabajo
    git reset  --soft <hash del commit>
    # Mantiene los cambios en el directorio de trabajo, pero no en el área de preparación
    git reset --mixed <hash del commit>
    ~~~
18. Borra la rama development
    ~~~bash
    # Borra una rama fusionada
    git branch -d nombre_de_la_rama
    # Fuerza el borrado de una rama no fusionada
    git branch -D nombre_de_la_rama
    ~~~


