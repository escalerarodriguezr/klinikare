Klinikare - Backend Test

## Instalación usando Makefile

````shell
$ make build 'to build the docker environment'
$ make run 'to spin up containers'
$ make composer-install 'to install composer dependencies'
$ make composer-install 'to install composer dependencies'
$ migrate-database 'to run migrations'
$ make all-tests 'to run the test suite'
$ make ssh-be 'to access the PHP container bash'
$ make stop 'to stop and start containers'
$ make restart 'to stop and start containers'
````

## Premisos carpetas en local
En local necesario en local establecer los permisos de carpeta.
Desde la raiz del proyecto:
````shell
$ sudo chmod -R 777 storage
````


## Instalación sin Makefile
````shell
$ docker network create klinikare-network
$ U_ID=$UID docker-compose up -d --build
$ U_ID=$UID docker exec --user $UID -it klinikare-be composer install --no-scripts --no-interaction --optimize-autoloader 
$ U_ID=$UID docker exec --user $UID -it klinikare-be php artisan migrate 
$ U_ID=$UID docker exec --user $UID -it klinikare-be php artisan test
$ U_ID=$UID docker exec -it --user $UID klinikare-be bash
$ U_ID=$UID docker-compose stop
````

## Ruta de acceso

Desarrollo:
http://localhost:250

VPS
https://klinikare-test.escasoft.com

## Stack:
- `NGINX 1.19` container
- `PHP 8.1 FPM` container
- `Laravel 10` framework


## Consideraciones sobre la prueba
1. El archivo que intenta procesar como input se válida para garantizar el formato de los datos así como el cumplimiento de los límites requeridos.
2. En caso de que no se supere la validación, se muestra una ntificación del archivo incorrecto.
3. En caso de que el archivo sea correcto, se obtiene como output la descarga de un archivo .txt con el resultado.
4. En el caso del segundoEjercicio, el archivo que se adjnuta como "input.txt", incumple la regla:

    0 ≤ Posición ≤ Tamaño del archivo hasta esa adición

Ya que el archivo original tiene un size de 153585 y todas las adiciones que se incluyen son para un postion superior a 153585

5.Un archico  con los datos que se detallan en la descripción del ejercicio:

    ChocoboRojo 2
    0 224
    0 192ChocoboAzul 4
    1 227
    2 232
    2 46
    0 169
Sí que cumple los límites y se procesa.

