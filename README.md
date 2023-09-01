Kaira - Backend Test

## Instalación usando Makefile

````shell
$ make build 'to build the docker environment'
$ make run 'to spin up containers'
$ make composer-install 'to install composer dependencies'
$ make all-tests 'to run the test suite'
$ make ssh-be 'to access the PHP container bash'
$ make stop 'to stop and start containers'
$ make restart 'to stop and start containers'
````

## Instalación sin Makefile
````shell
$ docker network create kaira-network
$ U_ID=$UID docker-compose up -d --build
$ U_ID=$UID docker exec --user $UID -it kaira-be composer install --no-scripts --no-interaction --optimize-autoloader 
$ U_ID=$UID docker exec --user $UID -it kaira-be php artisan test
$ U_ID=$UID docker exec -it --user $UID kaira-be bash
$ U_ID=$UID docker-compose stop
````

## Premisos carpetas en local
Puede ser necesario en local establecer los permisos de carpeta.
Desde la raiz del proyecto:
````shell
$ sudo chmod -R 777 storage
````

## Ruta de acceso
http://localhost:250/

## Stack:
- `NGINX 1.19` container
- `PHP 8.1 FPM` container
- `Laravel 10` framework
