Kaira - Backend Test

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
http://localhost:250/

## Stack:
- `NGINX 1.19` container
- `PHP 8.1 FPM` container
- `Laravel 10` framework
